<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="images/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <script>
        function myfunction() {
            var preloader = document.getElementById('preloder');
            preloader.style.display = 'none';
        }
    </script>
    <title>Welcome to TOK-BROKER - get your best choice! - Dashboard</title>
</head>


<body onload="myfunction()">
<div id="preloder">
        <div class="loader"></div>
    </div>

<?php include 'components/user_header.php'; ?>

<section class="dashboard">

   <h1 class="heading">Dashboard</h1>

   <div class="box-container">

      <div class="box">
      <?php
         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
         $select_profile->execute([$user_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
      <h3>welcome!</h3>
      <p><?= $fetch_profile['name']; ?></p>
      <a href="update.php" class="btn">update profile</a>
      </div>

      <div class="box">
         <h3>filter search</h3>
         <p>search your dream property</p>
         <a href="search.php" class="btn">search now</a>
      </div>

      <div class="box">
      <?php
        $count_properties = $conn->prepare("SELECT * FROM `property` WHERE user_id = ?");
        $count_properties->execute([$user_id]);
        $total_properties = $count_properties->rowCount();
      ?>
      <h3><?= $total_properties; ?></h3>
      <p>Properties Listed</p>
      <a href="my_listings.php" class="btn"> All Itemization</a>
      </div>

      <div class="box">
      <?php
        $count_requests_received = $conn->prepare("SELECT * FROM `requests` WHERE receiver = ?");
        $count_requests_received->execute([$user_id]);
        $total_requests_received = $count_requests_received->rowCount();
      ?>
      <h3><?= $total_requests_received; ?></h3>
      <p>requests received</p>
      <a href="requests.php" class="btn"> All Requests</a>
      </div>

      <div class="box">
      <?php
        $count_requests_sent = $conn->prepare("SELECT * FROM `requests` WHERE sender = ?");
        $count_requests_sent->execute([$user_id]);
        $total_requests_sent = $count_requests_sent->rowCount();
      ?>
      <h3><?= $total_requests_sent; ?></h3>
      <p>requests sent</p>
      <a href="saved.php" class="btn">Saved properties</a>
      </div>

      <div class="box">
      <?php
        $count_saved_properties = $conn->prepare("SELECT * FROM `saved` WHERE user_id = ?");
        $count_saved_properties->execute([$user_id]);
        $total_saved_properties = $count_saved_properties->rowCount();
      ?>
      <h3><?= $total_saved_properties; ?></h3>
      <p>properties saved</p>
      <a href="saved.php" class="btn">view saved properties</a>
      </div>

   </div>

</section>






















<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>