<?php
include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
// if (isset($_GET['email']) && isset($_GET['token'])) {
//     $token = $_GET['token'];
//     $email = $_GET['email'];

//    date_default_timezone_set('Asia/Kolkata');
//     $Date =date('Y-m-d');

//     $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND token = ?");
//     $select_users->execute([$email, $token]);
// //     $token_found = $select_users->fetch(PDO::FETCH_ASSOC);

// //     if ($select_users->rowCount() == 1) {
// //         if ($token_found) {
// //             // Display the form
// //             echo '<form><h3>Hello</h3></form>';
// //         } else {
// //             echo "Invalid or expired token";
// //         }
// //     } else {
// //         $warning_msg[] = 'Something went wrong! Try Again later';
// //     }
//  }

if (isset($_GET['email']) && isset($_GET['token'])) {
    $token = $_GET['token'];
    $email = $_GET['email'];

    date_default_timezone_set('Asia/Kolkata');
    $Date = date('Y-m-d');

    $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND token = ?");
    $select_users->execute([$email, $token]);

    // Check if a user was found
    if ($select_users->rowCount() == 1) {
        // User was found, continue with the password reset process
        $user = $select_users->fetch(PDO::FETCH_ASSOC);

        // Check if the token is still valid
        if ($user['tokenexpire'] < $Date) {
            // Token is expired, show an error message

            $error_msg[] =  'The token is expired. Please try again.';
        } else {
            // Token is valid, show the password reset form
            echo '<section class="form_container">';

         


            echo '  <form method="POST" id="validate-form">';


            echo '<h2>Reset Password</h2>';
            echo '  <p class="error" id="password-error"></p>';

            echo '  <i class="bi bi-shield-lock"></i>';
            echo ' <input type="password" name="pass" placeholder="Enter your New Password" id="password" maxlength=50 class=box )">';
            echo '  <img src="images/eye-close.png" id="eyeicon" alt="">';
            echo '<input type="hidden" name="email" value="' . htmlspecialchars($email) . '">';
            echo '<input type="hidden" name="token" value="' . htmlspecialchars($token) . '">';
            echo '<input type="submit" name="reset" id="click-btn" value="Reset" class="btn">';


            echo '</form>';

            echo ' </section>';
        }
    } else {
        // User was not found, show an error message
        $error_msg[] = 'The email and token combination is not valid.';
    }
}




if (isset($_POST['reset'])) {
    $new_pass = sha1($_POST['pass']);
    // $reset = "UPDATE `users` SET `password`='$new_pass',`token`=NULL,`tokenexpire`=NULL WHERE `email` = $email ";
    $reset = $conn->prepare("UPDATE `users` SET `password`='$new_pass', `token` = NULL, `tokenexpire`=NULL WHERE `email` = ?");
    $reset->execute([$email]);
    if ($reset->rowCount() > 0) {

        $success_msg[]= 'Password has been Reset successfully!';
       
        header('Refresh:6;url=login.php'); 
    } else {
        $warning_msg[] = 'Something went wrong! Try Again later';
    }
} 


?>













<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to TOK-BROKER - get your best choice! - Reset your Password</title>
    <link rel="icon" type="image/jpg" href="images/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/user.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



    <?php include 'components/user_header.php'; ?>

<body>


    
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






    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php include 'components/footer.php'; ?>
    <script src="js/script.js"></script>

    <?php include 'components/message.php'; ?>
</body>

</html>