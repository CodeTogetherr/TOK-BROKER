<?php

include '../components/connect.php';


if (isset($_POST['submit'])) {



    $name = $_POST['name'];
    $name = htmlspecialchars($name);
    $pass = sha1($_POST['pass']);
    $pass = htmlspecialchars($pass);


  
    $select_admins = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ? LIMIT 1");
    $select_admins->execute([$name, $pass]);
    $row = $select_admins->fetch(PDO::FETCH_ASSOC);

    if ($select_admins->rowcount() > 0) {
        setcookie('admin_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
        header('location:../admin/dashboard.php');
    } else {
        $warning_msg[] = 'Incorrect Username or Password!';
    }
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RE-BROKER | LOGIN</title>
    <link rel="icon" type="image/jpg" href="../images/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body style="padding-left: 0;">



    <section class="form_container" style="min-height: 100vh;">

    <form  method="POST">
        
        <a href="../index.php"> <i class="bi bi-x-lg"></i></a>
        
        <h2>Admin login</h2>
         <p>&#10069; default name = <span>admin</span> & password = <span>admin</span></p>
                <i class="bi bi-person-circle"></i>
                <input type="text" name="name" placeholder="Enter Username" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')">
          
                <i class="bi bi-shield-lock"></i>
                <input type="password" name="pass" placeholder="Enter Password" id="password" minlength="08" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')">
                <img src="../images/eye-close.png" id="eyeicon" alt="">

            <input type="submit" name="submit" value="Login Now" id="click-btn" class="btn">

            <div class="extra-1">
                <a href="#">forgot Password</a>
            </div>



        </form>
    </section>
    <script>
        let eyeicon = document.getElementById("eyeicon");
let password = document.getElementById("password");

eyeicon.onclick = function() {
   if (password.type == "password") {
      password.type = "text";
      eyeicon.src = "../images/eye-open.png";
      
   }else{
      password.type ="password";
      eyeicon.src = "../images/eye-close.png";
   }
}
    </script>

    <script src="../js/admin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?php include '../components/message.php'; ?>


</html>