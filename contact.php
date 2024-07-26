<?php
include 'components/connect.php';


if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
}

if (isset($_POST["send"])) {
    $message_id = create_unique_id();
    $name = $_POST['name'];
    $name = htmlspecialchars($name);
    $email = $_POST['email'];
    $email = htmlspecialchars($email);
    $number = $_POST['number'];
    $number = htmlspecialchars($number);
    $message = $_POST['message'];
    $message = htmlspecialchars($message);


    $verify_contact = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
    $verify_contact->execute([$name, $email, $number, $message]);


    if ($verify_contact->rowCount() > 0) {
        $warning_msg[] = 'Message sent already!';
    } else {
        $send_message = $conn->prepare("INSERT INTO `messages` (id, name, email, number, message) VALUES(?,?,?,?,?)");
        $send_message->execute([$message_id, $name, $email, $number, $message]);
        $success_msg[] = 'Message sent successfully!';
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
    <title>Welcome to TOK-BROKER - get your best choice! - Contact us</title>
</head>


<body onload="myfunction()">

    <div id="preloder">
        <div class="loader"></div>
    </div>
    <?php include 'components/user_header.php'; ?>

    <section class="contact">
        <div class="row">
            <div class="image">
                <img src="images/contact-img.svg" alt="">
            </div>
            <form action="" method="post">
                <h3>Write to us</h3>
                <p>Please Enter your Email-address <span>*</span></p>
                <input type="text" name="email" placeholder="Enter your Email-address" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'') ">

                <p>Please enter your Username <span>*</span></p>

                <input type="text" name="name" placeholder="Enter your Username" maxlength=50 class=box required oninput="this.value = this.value.replace(/\s/g,'')">

                <p>Please enter your Phone Number <span>*</span></p>

                <input name="number" placeholder="Enter your Phone Number" maxlength=10 class=box required oninput="this.value = this.value.replace(/\s/g,'')">

                <p>Please enter your message <span>*</span></p>
                <textarea name="message" placeholder="Enter your message" rows="8" maxlength="1000" class="box" spellcheck="false" required></textarea>

                <input type="submit" name="send" class="btn">

            </form>
        </div>
    </section>


    <section class="faq" id="faq">

        <h1 class="heading">FAQs</h1>

        <div class="box-container">

            <div class="box active">
                <h3><span>Can I view properties until my account is verified?</span><i class="fas fa-angle-down"></i></h3>
                <p>Yes, you can search and shortlist the properties with an un-verified account. But to receive owner's email & phone number you will have to wait for the account verification to complete.</p>
            </div>

            <div class="box active">
                <h3><span>I am new to city, how can I use TOK-BROKER to find a suitable house for me?</span><i class="fas fa-angle-down"></i></h3>
                <p>To help new migrants to the city, we have a Filter search feature which provides the exact details of the property. You can also look for details such as nearby schools, hospital etc. on the detailed page of the property</p>
            </div>

            <div class="box">
                <h3><span>Any recommendations for property owners while listing a property?</span><i class="fas fa-angle-down"></i></h3>
                <p>Provide accurate details while listing your property
                    1. Provide exact location of your property on the map
                    2. Please do not include your phone/email number in description of property
                    3. Add at least one photos of each room, kitchen, hall etc. to make your listing more attractive
                    4. We have kept the listing process simple. A novice user can complete a listing in less than 5 minutes</p>
            </div>

            <div class="box">
                <h3><span>how to contact with the Tenants?</span><i class="fas fa-angle-down"></i></h3>
                <p>If Tenant like a property he can request for owner’s contact details. Both parties will receive contact information and then arrange for a visit.</p>
            </div>

            <div class="box">
                <h3><span>why my itemization is not showing up?</span><i class="fas fa-angle-down"></i></h3>
                <p>Every itemization on TOK-BROKER is verified for its content, photo, location and genuine broker free ownership. Property is made active (visible for all) after these verifications.</p>
            </div>

            <div class="box">
                <h3><span>Why do I need wait for my account to be validated to see owner details?</span><i class="fas fa-angle-down"></i></h3>
                <p>After your registration on TOK-BROKER your details such as name, email address & mobile number are used to verify that it is not associated with a broker. After successful verification, you can contact owners directly. This extra step has been added to eliminate the brokers completely.</p>
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