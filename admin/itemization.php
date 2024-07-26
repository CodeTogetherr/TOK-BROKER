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

   $verify_delete = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
   $verify_delete->execute([$delete_id]);

   if ($verify_delete->rowCount() > 0) {
      $select_images = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
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
      $delete_itemization = $conn->prepare("DELETE FROM `property` WHERE id = ?");
      $delete_itemization->execute([$delete_id]);
      $success_msg[] = 'Listing deleted!';
   } else {
      $warning_msg[] = 'Listing deleted already!';
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
   <script>
    function myfunction() {
        var preloader = document.getElementById('preloder');
        preloader.style.display = 'none';
    }
</script>
</head>


<body onload="myfunction()">

    <div id="preloder">
        <div class="loader"></div>
    </div>

   <!-- header section starts  -->
   <?php include '../components/admin_header.php'; ?>
   <!-- header section ends -->

   <section class="itemization">

      <h1 class="heading">All Itemization</h1>

      <form action="" method="POST" class="search-form">
         <input type="text" name="search-box" placeholder="search Itemization..." maxlength="100" required>
         <button type="submit" class="fas fa-search" name="search-btn"></button>
      </form>

      <div class="box-container">

         <?php
         if (isset($_POST['search-box']) or isset($_POST['search-btn'])) {
            $search_box = $_POST['search-box'];
            $search_box = htmlspecialchars($search_box);
            $select_itemization = $conn->prepare("SELECT * FROM `property` WHERE property_name LIKE '%{$search_box}%' OR address LIKE '%{$search_box}%' ORDER BY date DESC");
            $select_itemization->execute();
         } else {
            $select_itemization = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC");
            $select_itemization->execute();
         }
         $total_images = 0;
         if ($select_itemization->rowCount() > 0) {
            while ($fetch_itemization = $select_itemization->fetch(PDO::FETCH_ASSOC)) {

               $itemization_id = $fetch_itemization['id'];

               $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
               $select_user->execute([$fetch_itemization['user_id']]);
               $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

               if (!empty($fetch_itemization['image_02'])) {
                  $image_coutn_02 = 1;
               } else {
                  $image_coutn_02 = 0;
               }
               if (!empty($fetch_itemization['image_03'])) {
                  $image_coutn_03 = 1;
               } else {
                  $image_coutn_03 = 0;
               }
               if (!empty($fetch_itemization['image_04'])) {
                  $image_coutn_04 = 1;
               } else {
                  $image_coutn_04 = 0;
               }
               if (!empty($fetch_itemization['image_05'])) {
                  $image_coutn_05 = 1;
               } else {
                  $image_coutn_05 = 0;
               }

               $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);
         ?>
               <div class="box">
                  <div class="thumbnail">
                     <p><i class="far fa-image"></i><span><?= $total_images; ?></span></p>
                     <img src="../uploaded_files/<?= $fetch_itemization['image_01']; ?>" alt="">
                  </div>
                  <p class="price"><i class="fas fa-indian-rupee-sign"></i><?= $fetch_itemization['price']; ?></p>
                  <h3 class="name"><?= $fetch_itemization['property_name']; ?></h3>
                  <p class="location"><i class="fas fa-map-marker-alt"></i><?= $fetch_itemization['address']; ?></p>
                  <form action="" method="POST">
                     <input type="hidden" name="delete_id" class=".delete_item_value" value="<?= $itemization_id; ?>">
                     <a href="view_itemization.php?get_id=<?= $itemization_id; ?>" class="btn">view itemization</a>
                     <input type="submit" value="delete item"  name="delete" class="delete-btn" onclick="return confirm('delete this itemization?');">
                  </form>
               </div>
         <?php
            }
         } elseif (isset($_POST['search-box']) or isset($_POST['search-btn'])) {
            echo '<p class="empty">no results found!</p>';
         } else {
            echo '<p class="empty">no property posted yet!</p>';
         }
         ?>

      </div>

   </section>









   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js file link  -->
   <script src="../js/admin.js"></script>

   <?php include '../components/message.php'; ?>


</body>

</html>