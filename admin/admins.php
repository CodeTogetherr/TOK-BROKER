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

    $verify_delete = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
    $verify_delete->execute([$delete_id]);

    if ($verify_delete->rowCount() > 0) {
        $delete_admin = $conn->prepare("DELETE FROM `admins` WHERE id = ?");
        $delete_admin->execute([$delete_id]);
        $success_msg[] = 'Admin is deleted!';
    } else {
        $warning_msg[] = 'Admin was already Deleted!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> TOK-BROKER - Admin-Dashboard - All Itemization</title>

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

        <h1 class="heading">admins</h1>

        <form action="" method="POST" class="search-form">
            <input type="text" name="search-box" placeholder="search admins..." maxlength="100" required>
            <button type="submit" class="fas fa-search" name="search-btn"></button>
        </form>

        <div class="box-container" id="t-1">

            <?php
            if (isset($_POST['search-box']) or isset($_POST['search-btn'])) {
                $search_box = $_POST['search-box'];
                $search_box = htmlspecialchars($search_box);
                $select_admins = $conn->prepare("SELECT * FROM `admins` WHERE name LIKE '%{$search_box}%'");
                $select_admins->execute();
            } else {
                $select_admins = $conn->prepare("SELECT * FROM `admins`");
                $select_admins->execute();
            }
            if ($select_admins->rowCount() > 0) {
                while ($fetch_admins = $select_admins->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <?php if ($fetch_admins['id'] == $admin_id) { ?>
                        <div class="box" style="order: -1;">
                            <p>name : <span><?= $fetch_admins['name']; ?></p>
                            <a href="update.php" class="option-btn">update account</a>
                            <a href="register.php" class="btn">register new</a>
                        </div>
                    <?php } else { ?>
                        <div class="box">
                            <p>name : <span><?= $fetch_admins['name']; ?></p>
                            <form action="" method="POST">
                                <input type="hidden" class="delete_id_value" name="delete_id" value="<?= $fetch_admins['id']; ?>">
                                <input type="submit" id="delete" value="delete admin" name="delete" class="delete-btn" onclick="return confirm('delete this admin?');">
                            </form>
                        </div>
                    <?php } ?>
                <?php
                }
            } elseif (isset($_POST['search-box']) or isset($_POST['search-btn'])) {
                echo '<p class="empty">no results found!</p>';
            } else {
                ?>
                <p class="empty">no admins added yet!</p>
                <div class="box" style="text-align: center;">
                    <p>create a new admin</p>
                    <a href="register.php" class="btn">register now</a>
                </div>
            <?php
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