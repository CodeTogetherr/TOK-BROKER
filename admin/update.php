<?php

include '../components/connect.php';

if(isset($_COOKIE['admin_id'])){
   $admin_id = $_COOKIE['admin_id'];
}else{
   $admin_id = '';
   header('location:login.php');
}

$select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ? LIMIT 1");
$select_profile->execute([$admin_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = htmlspecialchars($name); 

   if(!empty($name)){
    
         $update_name = $conn->prepare("UPDATE `admins` SET name = ? WHERE id = ?");
         $update_name->execute([$name, $admin_id]);
         $success_msg[] = 'Username updated!';
      
   }

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $prev_pass = $fetch_profile['password'];
   $crnt_pass = sha1($_POST['crnt_pass']);
   $crnt_pass = htmlspecialchars($crnt_pass);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = htmlspecialchars($new_pass);
   $c_pass = sha1($_POST['c_pass']);
   $c_pass = htmlspecialchars($c_pass);
  
   if($crnt_pass != $empty_pass){
      if($crnt_pass != $prev_pass){
         $warning_msg[] = 'Current password is not matched!';
      }elseif($c_pass != $new_pass){
         $warning_msg[] = 'New password  is not matched!';
      }else{
         if($new_pass != $empty_pass){
            $update_password = $conn->prepare("UPDATE `admins` SET password = ? WHERE id = ?");
            $update_password->execute([$c_pass, $admin_id]);
            $success_msg[] = 'your Password is updated!';
         }else{
            $warning_msg[] = 'Please enter new password!';
         }
      }
   }

}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> TOK-BROKER - Admin-Dashboard - Account Update</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="icon" type="image/jpg" href="../images/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
</head>
<body>
<div id="preloder">
        <div class="loader"></div>
    </div>
   
<!-- header section starts  -->
<?php include '../components/admin_header.php'; ?>
<!-- header section ends -->

<!-- update section starts  -->

<section class="form_container">

  
   <form  method="POST">
                <a href="../admin/dashboard.php"><i class="bi bi-x-lg"></i></a>
        
                <h2>Update Profile</h2>
                
                    <i class="bi bi-envelope-at-fill"></i>
                    <input type="text" name="email" placeholder="<?= $fetch_profile['email']; ?>"  maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')"autocomplete="off">
               
                
                    <i class="bi bi-person-circle"></i>
                    <input type="text" name="name" placeholder="<?= $fetch_profile['name']; ?>"  maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')" autocomplete="off">
          
               
                    <i class="bi bi-shield-lock"></i>
                    <input type="password" name="crnt_pass" placeholder="Enter Current Password" minlength="08" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')" autocomplete="off">
             
                    <i class="bi bi-shield-lock"></i>
                    <input type="password" name="new_pass" placeholder="Enter New Password" minlength="08" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')" autocomplete="off">
             
            
                    <i class="bi bi-shield-check"></i>
                    <input type="password" name="c_pass" placeholder="Confirm New Password" minlength="08" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')" autocomplete="off">
              
                <div class="g-recaptcha" data-sitekey="6Ldrd1EpAAAAANYfHeEbSRN5gnMbrH65KWPwk_2O"></div>
    
                <input type="submit" name="submit" id="click-btn" value="Update" class="btn">
    
            </form>
</section>
















<script>
$(document).on("click", "#click-btn", function () {
  var response = grecaptcha.getResponse();
  if (response.length == 0) {
    swal("", "Please verify you are not a robort", "warning");
    return false;
  }
});</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- custom js file link  -->
<script src="../js/admin.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>