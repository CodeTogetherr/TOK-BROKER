


<?php 
include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
if (isset($_POST['forgot_password'])) {

    $email = $_POST['email'];
    $email = htmlspecialchars($email);


    $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? LIMIT 1");
    $select_users->execute([$email] );
    $row = $select_users->fetch(PDO::FETCH_ASSOC);

    if ($select_users->rowCount() > 0) {
         // Generate a unique token
    $token = bin2hex(random_bytes(16));

    // Store the token in the database along with the user's email address and the current timestamp
    date_default_timezone_set('Asia/Kolkata');
    $Date =date('Y-m-d');
    $update_token = $conn->prepare("UPDATE `users` SET `token` = ?, `tokenexpire`=? WHERE `email` = ?");
    $update_token->execute([$token, $Date, $email]);
    if ($update_token->rowCount() > 0) {
    
        
        
        // Send the email
        $to = $email;
        $subject = "Reset your password";
        $message = "
            Please click the link below to reset your password
            http://localhost/TOK-BROKER/reset-password.php?email=$email&token=$token
        ";
        $headers = "From: no-reply@tok-broker.com\r\n";
        $headers.= "X-Mailer: PHP/". phpversion();
        $headers.= "Content-type: text/html charset=UTF-8\r\n";
        mail($to, $subject, $message, $headers);
        $success_msg[]= 'Link sent successfully!';
        header('Refresh:2;url=index.php'); 
        
        
    } else {
        $warning_msg[] = 'Something went wrong! Try Again later';
    }
    } else {
        $error_msg[] =  'This Email-address is not Found!';
    }
}





  
 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TWelcome to TOK-BROKER - get your best choice!- Forgot Password</title>
    <link el="icon" type="image/jpg" href="images/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/user.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</head>
    <?php include 'components/user_header.php'; ?>

<body>
    <section class="form_container">
        <form method="POST" id="forgot-form">
            <a href="login.php"><i class="bi bi-x-lg"></i></a>

            <h2>Forgot Password</h2>
            <p class="error" id="password-error"></p>
            <i class="bi bi-envelope-at-fill"></i>
            <input type="text" name="email" placeholder="Enter your Email-address" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'') ">

            <input type="submit" name="forgot_password" value="Continue" id="click-btn" class="btn">

        </form>

    </section>


    



    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php include 'components/footer.php'; ?>
    <script src="js/script.js"></script>

    <?php include 'components/message.php'; ?>
</body>

</html>