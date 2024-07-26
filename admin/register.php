<?php

include '../components/connect.php';

if (isset($_COOKIE['admin_id'])) {
    $admin_id = $_COOKIE['admin_id'];
} else {
    $admin_id = '';
    header('Location:login.php');
}

if (isset($_POST['submit'])) {
    $id = create_unique_id();
    $email = $_POST['email'];
    $email = htmlspecialchars($email);
    $name = $_POST['name'];
    $name = htmlspecialchars($name);
    $pass = sha1($_POST['pass']);
    $pass = htmlspecialchars($pass);


    $c_pass = sha1($_POST['c_pass']);
    $c_pass = htmlspecialchars($c_pass);
    $select_admins1 = $conn->prepare("SELECT * FROM `admins` WHERE email = ?");
    $select_admins1->execute([$email]);
    $select_admins = $conn->prepare("SELECT * FROM `admins` WHERE name = ?");
    $select_admins->execute([$name]);


    if ($select_admins1->rowCount() > 0) {
        $error_msg[] = 'Email address already exists';
    } else {
        if ($select_admins->rowcount() > 0) {
            $error_msg[] = 'Username already exists';
        } else {

            if ($pass != $c_pass) {

                $warning_msg[] = 'Passwords do not match';
            } else {
                $insert_admin = $conn->prepare("INSERT INTO `admins` (id, email, name, password) VALUES(?,?,?,?)");
                $insert_admin->execute([$id, $email, $name, $c_pass]);
                $success_msg[] = 'Signed Up successfully please log in Now';
            }
        }
    }
}



?>













<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOK-BROKER - Admin-Dashboard - Register</title>
    <link rel="icon" type="image/jpg" href="../images/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin.css">
   
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>


<?php include '../components/admin_header.php'; ?>

<body>
    <section class="form_container">




        <form method="POST" id="validate-form">
            <a href="../admin/dashboard.php"><i class="bi bi-x-lg"></i></a>

            <h2>Admin Sign Up</h2>
            <p class="error" id="password-error"></p>
            <i class="bi bi-envelope-at-fill"></i>
            <input type="text" name="email" placeholder="Enter Email" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'') ">


            <i class="bi bi-person-circle"></i>
            <input type="text" name="name" placeholder="Enter Username" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')">


            <i class="bi bi-shield-lock"></i>
            <input type="password" name="pass" placeholder="Enter Password" id="password" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')">
            <img src="../images/eye-close.png" id="eyeicon" alt="">
          


            <i class="bi bi-shield-check"></i>
            <input type="password" name="c_pass" placeholder="Confirm Password" id="c_password" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')">
            <img src="../images/eye-close.png" id="icon" alt="">


            <div class="g-recaptcha" data-sitekey="6Ldrd1EpAAAAANYfHeEbSRN5gnMbrH65KWPwk_2O"></div>

            <input type="submit" name="submit" id="click-btn" value="Sign Up" class="btn">

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
    <script src="../js/admin.js"></script>

    <?php include '../components/message.php'; ?>
</body>

</html>