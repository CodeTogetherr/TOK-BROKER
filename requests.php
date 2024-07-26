<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}

if(isset($_POST['delete'])){

   $delete_id = $_POST['request_id'];
   $delete_id = htmlspecialchars($delete_id);

   $verify_delete = $conn->prepare("SELECT * FROM `requests` WHERE id = ?");
   $verify_delete->execute([$delete_id]);

   if($verify_delete->rowCount() > 0){
      $delete_request = $conn->prepare("DELETE FROM `requests` WHERE id = ?");
      $delete_request->execute([$delete_id]);
      $success_msg[] = 'request deleted successfully!';
   }else{
      $warning_msg[] = 'request deleted already!';
   }

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
<title>Welcome to TOK-BROKER - get your best choice! - Requests</title>
</head>

<body onload="myfunction()">

    <div id="preloder">
        <div class="loader"></div>
    </div>
    <?php include 'components/user_header.php'; ?>

<section class="requests">

   <h1 class="heading">all requests</h1>

   <div class="box-container">

   <?php
      $select_requests = $conn->prepare("SELECT * FROM `requests` WHERE receiver = ?");
      $select_requests->execute([$user_id]);
      if($select_requests->rowCount() > 0){
         while($fetch_request = $select_requests->fetch(PDO::FETCH_ASSOC)){

        $select_sender = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
        $select_sender->execute([$fetch_request['sender']]);
        $fetch_sender = $select_sender->fetch(PDO::FETCH_ASSOC);

        $select_property = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
        $select_property->execute([$fetch_request['property_id']]);
        $fetch_property = $select_property->fetch(PDO::FETCH_ASSOC);
   ?>
   <div class="box">
      <p>name : <span><?= $fetch_sender['name']; ?></span></p>
      <p>number : <a href="tel:<?= $fetch_sender['number']; ?>"><?= $fetch_sender['number']; ?></a></p>
      <p>email : <a href="mailto:<?= $fetch_sender['email']; ?>"><?= $fetch_sender['email']; ?></a></p>
      <p>enquiry for : <span><?= $fetch_property['property_name']; ?></span></p>
      <form action="" method="POST">
         <input type="hidden" name="request_id" value="<?= $fetch_request['id']; ?>">
         <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">view property</a>
         <input type="submit" value="delete request" class="del-btn" onclick="return confirm('Delete this request?');" name="delete">
      </form>
   </div>
   <?php
    }
   }else{
      echo '<p class="empty">you have no requests!</p>';
   }
   ?>

   </div>

</section>






















<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>