<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
   header('location:login.php');
}

$select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
$select_user->execute([$user_id]);
$fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $name = htmlspecialchars($name);
   $number = $_POST['number'];
   $number = htmlspecialchars($number);
   $email = $_POST['email'];
   $email = htmlspecialchars($email);

   if (!empty($name)) {
      $update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE id = ?");
      $update_name->execute([$name, $user_id]);
      $success_msg[] = 'name updated!';
   }

   if (!empty($email)) {
   
         $update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE id = ?");
         $update_email->execute([$email, $user_id]);
         $success_msg[] = 'email updated!';
      
   }

   if (!empty($number)) {
   
         $update_number = $conn->prepare("UPDATE `users` SET number = ? WHERE id = ?");
         $update_number->execute([$number, $user_id]);
         $success_msg[] = 'number updated!';
      
   }

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $prev_pass = $fetch_user['password'];
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = htmlspecialchars($old_pass);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = htmlspecialchars($new_pass);
   $c_pass = sha1($_POST['c_pass']);
   $c_pass = htmlspecialchars($c_pass);
  
   if($old_pass != $empty_pass){
      if($old_pass != $prev_pass){
         $warning_msg[] = 'old password not matched!';
      }elseif($new_pass != $c_pass){
         $warning_msg[] = 'confirm passowrd not matched!';
      }else{
         if($new_pass != $empty_pass){
            $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
            $update_pass->execute([$c_pass, $user_id]);
            $success_msg[] = 'password updated successfully!';
         }else{
            $warning_msg[] = 'please enter new password!';
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
   <title> Welcome to TOK-BROKER - get your best choice! - Account Update</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="icon" type="image/jpg" href="images/logo.jpg">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/user.css">

   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>


   <!-- header section starts  -->
   <?php include 'components/user_header.php'; ?>
   <!-- header section ends -->

   <!-- update section starts  -->

   <section class="form_container">


      <form method="POST" id="validate-form">
         <a href="index.php"><i class="bi bi-x-lg"></i></a>

         <h2>Update your Profile</h2>
         <p class="error" id="password-error"></p>
         <i class="bi bi-envelope-at-fill"></i>
         <input type="text" name="email" placeholder="<?= $fetch_user['email']; ?>" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')" autocomplete="off">


         <i class="bi bi-person-circle"></i>
         <input type="text" name="name" placeholder="<?= $fetch_user['name']; ?>" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')" autocomplete="off">

         <i class="bi bi-phone-fill"></i>
         <input name="number" placeholder="<?= $fetch_user['number']; ?>" maxlength=10 class=box required oninput="this.value = this.value.replace(/\s/g,'')">

         <i class="bi bi-shield-lock"></i>
         <input type="password" name="old_pass" placeholder="Enter Current Password" minlength="08" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')" autocomplete="off">

         <i class="bi bi-shield-lock"></i>
         <input type="password" name="new_pass" placeholder="Enter New Password" id="password" minlength="08" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')" autocomplete="off">
         <img src="images/eye-close.png" id="eyeicon" alt="">

         <i class="bi bi-shield-check"></i>
         <input type="password" name="c_pass" placeholder="Confirm your Password" id="c_password" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')">
         <img src="images/eye-close.png" id="icon" alt="">
         <div class="g-recaptcha" data-sitekey="6Ldrd1EpAAAAANYfHeEbSRN5gnMbrH65KWPwk_2O"></div>

         <input type="submit" name="submit" id="click-btn" value="Update" class="btn">
          
         <div class="forgot">
            <a href="forgot-password.php">forgot Password?</a>
            </div>

      </form>
   </section>











   <script>
      const passwordInput = document.getElementById("password");
      const passwordError = document.getElementById("password-error");

      passwordInput.addEventListener("input", () => {
         const password = passwordInput.value;

         if (password.length < 8) {
            passwordError.textContent = "ℹ Password must be at least 8 characters long.";
            passwordInput.setCustomValidity("ℹ Password must be at least 8 characters long.");
         } else if (!/[!@#$%^&*]/.test(password)) {
            passwordError.textContent = "ℹ  Password must include at least one special character.";
            passwordInput.setCustomValidity(" ℹ Password must include at least one special character.");
         } else {
            passwordInput.setCustomValidity("");
            passwordError.textContent = "";
         }
      });

      const form = document.getElementById("validate-form");
      form.addEventListener("submit", (e) => {
         const password = passwordInput.value;

         if (password.length < 8) {
            e.preventDefault();
            passwordInput.setCustomValidity("ℹ  Password must be at least 8 characters long.");
         } else if (!/[!@#$%^&*]/.test(password)) {
            e.preventDefault();
            passwordInput.setCustomValidity("ℹ  Password must include at least one special character.");
         } else {
            passwordInput.setCustomValidity("");
         }
      });
   </script>






   <script>
      $(document).on("click", "#click-btn", function() {
         var response = grecaptcha.getResponse();
         if (response.length == 0) {
            swal("", "Please verify you are not a robort", "warning");
            return false;
         }
      });
   </script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

   <?php include 'components/message.php'; ?>
   <?php include 'components/footer.php'; ?>

</body>

</html>