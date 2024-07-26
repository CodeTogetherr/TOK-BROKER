<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {

    $id = create_unique_id();
    $name = $_POST['name'];
    $name = htmlspecialchars($name);
    $number = $_POST['number'];
    $number = htmlspecialchars($number);
    $email = $_POST['email'];
    $email = htmlspecialchars($email);
    $pass = sha1($_POST['pass']);
    $pass = htmlspecialchars($pass);
    $c_pass = sha1($_POST['c_pass']);
    $c_pass = htmlspecialchars($c_pass);

    $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_users->execute([$email]);

    if ($select_users->rowCount() > 0) {
        $warning_msg[] = 'email already taken!';
    } else {
        if ($pass != $c_pass) {
            $warning_msg[] = 'Password not matched!';
        } else {
            $insert_user = $conn->prepare("INSERT INTO `users`(id, name, number, email, password) VALUES(?,?,?,?,?)");
            $insert_user->execute([$id, $name, $number, $email, $c_pass]);

            if ($insert_user) {
                $verify_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
                $verify_users->execute([$email, $pass]);
                $row = $verify_users->fetch(PDO::FETCH_ASSOC);

                if ($verify_users->rowCount() > 0) {
                    setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
                    header('location:index.php');
                } else {
                    $error_msg[] = 'something went wrong!';
                }
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
    <title>TOK-BROKER - Register</title>
    <link rel="icon" type="image/jpg" href="images/logo.jpg">
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




        <form method="POST" id="validate-form">
            <a href="index.php"><i class="bi bi-x-lg"></i></a>

            <h2>Create An account</h2>
            <p class="error" id="password-error"></p>
            <i class="bi bi-envelope-at-fill"></i>
            <input type="text" name="email" placeholder="Enter your Email-address" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'') ">


            <i class="bi bi-person-circle"></i>
            <input type="text" name="name" placeholder="Enter your Username" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')">

            <!-- 
            <input type="tel" name="number" id="phone" maxlength=10 placeholder="Enter Phone Number" class=box required oninput="this.value = this.value.replace(/\s/g,'')" > -->
            <i class="bi bi-phone-fill"></i>
                    <input  name="number" placeholder="Enter your Phone Number" maxlength=10 class=box required oninput="this.value = this.value.replace(/\s/g,'')">
                
           
           
            <i class="bi bi-shield-lock"></i>
            <input type="password" name="pass" placeholder="Enter your Password" id="password" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')">
            <img src="images/eye-close.png" id="eyeicon" alt="">



            <i class="bi bi-shield-check"></i>
            <input type="password" name="c_pass" placeholder="Confirm your Password" id="c_password" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')">
            <img src="images/eye-close.png" id="icon" alt="">
            

             
            <div class="g-recaptcha" data-sitekey="6Ldrd1EpAAAAANYfHeEbSRN5gnMbrH65KWPwk_2O"></div>

            <input type="submit" name="submit" id="click-btn" value="Sign Up" class="btn">

            <div class="extra-2">
                <p>already have an account? <a href="login.php">Sign In now</a></p>
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
    <?php include 'components/footer.php'; ?>
    <script src="js/script.js"></script>

    <?php include 'components/message.php'; ?>
</body>

</html>