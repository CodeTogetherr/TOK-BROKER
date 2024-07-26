<?php

include '../components/connect.php';

if (isset($_COOKIE['admin_id'])) {
    $admin_id = $_COOKIE['admin_id'];
} else {
    $admin_id = '';
    header('location:login.php');
}

if (isset($_POST['delete'])) {

    $delete_id = $_POST['delete_id'];
    $delete_id = htmlspecialchars($delete_id);

    $verify_delete = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
    $verify_delete->execute([$delete_id]);
    if ($verify_delete->rowCount() > 0) {
        $select_images = $conn->prepare("SELECT * FROM `property` WHERE user_id = ?");
        $select_images->execute([$delete_id]);
        while ($fetch_images = $select_images->fetch(PDO::FETCH_ASSOC)) {
            $image_01 = $fetch_images['image_01'];
            $image_02 = $fetch_images['image_02'];
            $image_03 = $fetch_images['image_03'];
            $image_04 = $fetch_images['image_04'];
            $image_05 = $fetch_images['image_05'];
            unlink('../uploaded_files/' . $image_01);
            if (!empty($image_02)) {
                unlink('../uploaded_files/' . $image_02);
            }
            if (!empty($image_03)) {
                unlink('../uploaded_files/' . $image_03);
            }
            if (!empty($image_04)) {
                unlink('../uploaded_files/' . $image_04);
            }
            if (!empty($image_05)) {
                unlink('../uploaded_files/' . $image_05);
            }
        }
        $delete_listings = $conn->prepare("DELETE FROM `property` WHERE user_id = ?");
        $delete_listings->execute([$delete_id]);
        $delete_requests = $conn->prepare("DELETE FROM `requests` WHERE sender = ? OR receiver = ?");
        $delete_requests->execute([$delete_id, $delete_id]);
        $delete_saved = $conn->prepare("DELETE FROM `saved` WHERE user_id = ?");
        $delete_saved->execute([$delete_id]);
        $delete_user = $conn->prepare("DELETE FROM `users` WHERE id = ?");
        $delete_user->execute([$delete_id]);
        $success_msg[] = 'user  is deleted!';
    } else {
        $warning_msg[] = 'User is deleted already!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> TOK-BROKER - Admin-Dashboard - Users</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="icon" type="image/jpg" href="../images/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
<div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- header section starts  -->
    <?php include '../components/admin_header.php'; ?>
    <!-- header section ends -->

    <!-- admins section starts  -->

    <section class="grid">

        <h1 class="heading">Users</h1>

        <form action="" method="POST" class="search-form">
            <input type="text" name="search-box" placeholder="search users..." maxlength="100" required>
            <button type="submit" class="fas fa-search" name="search-btn"></button>
        </form>

        <div class="box-container" id="t-1">

            <?php
            if (isset($_POST['search-box']) or isset($_POST['search-btn'])) {
                $search_box = $_POST['search-box'];
                $search_box = htmlspecialchars($search_box);
                $select_users = $conn->prepare("SELECT * FROM `users` WHERE name LIKE '%{$search_box}%' OR number LIKE '%{$search_box}%'  OR  email LIKE '%{$search_box}%'");
                $select_users->execute();
            } else {
                $select_users = $conn->prepare("SELECT * FROM `users`");
                $select_users->execute();
            }
            if ($select_users->rowCount() > 0) {
                while ($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)) {


                    $count_property = $conn->prepare("SELECT * FROM `property` WHERE user_id = ?");
                    $count_property->execute([$fetch_users['id']]);
                    $total_properties = $count_property->rowCount();
            ?>
                    <div class="box">
                        <p>name : <span><?= $fetch_users['name']; ?></span></p>
                        <p>number : <a href="tel:<?= $fetch_users['number']; ?>"><?= $fetch_users['number']; ?></a></p>
                        <p>email : <a href="mailto:<?= $fetch_users['email']; ?>"><?= $fetch_users['email']; ?></a></p>
                        <p>properties listed : <span><?= $total_properties; ?></span></p>
                        <form action="" method="POST">
                            <input type="hidden" name="delete_id" value="<?= $fetch_users['id']; ?>">
                            <input type="submit" value="delete user" id="delete"   name="delete" class="delete-btn" onclick="return confirm('delete this user?');">
                        </form>
                    </div>
            <?php
                }
            } elseif (isset($_POST['search-box']) or isset($_POST['search-btn'])) {
                echo '<p class="empty">results not found!</p>';
            } else {
                echo '<p class="empty">no users accounts added yet!</p>';
            }
            ?>

        </div>

    </section>

    <!-- admins section ends -->





    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



   




    <!-- custom js file link  -->
    <script src="../js/admin.js"></script>

    <?php include '../components/message.php'; ?>

</body>

</html>