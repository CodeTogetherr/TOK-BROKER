<?php
include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
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
    <link rel="stylesheet" href="css/testimonials.css">
    <link rel="stylesheet" href="css/style.css">
    <script>
        function myfunction() {
            var preloader = document.getElementById('preloder');
            preloader.style.display = 'none';
        }
    </script>
    <title>Welcome to TOK-BROKER - get your best choice! - About us</title>
</head>


<body onload="myfunction()">

    <div id="preloder">
        <div class="loader"></div>
    </div>
    <?php include 'components/user_header.php'; ?>

    <section class="about">
        <div class="row">
            <div class="image">
                <img src="images/about-img.svg" alt="">
            </div>
            <div class="content">
                <h3>Why choose us?</h3>
                <p>Our platform offers a seamless and efficient process for real estate transactions, from posting a property to finalizing the purchase. Our platform facilitates the negotiation process, allowing buyers and sellers to communicate and reach mutually beneficial agreements. By using our platform, users can save time, effort, and money throughout the entire real estate transaction process.
                </p>
                <a href="contact.php" class="inline-btn">contact us</a>
            </div>
        </div>

    </section>



    <section class="h-i-w">
        <h1 class="heading"> How it works</h1>
        <div class="box-container">
            <div class="box">
                <img src="images/step-01.avif" alt="">
                <h3>search property</h3>
                <p>As an tenant you can easily filter search based on location, price range, property type, and other criteria to find the perfect property.
                </p>
            </div>

            <div class="box">
                <img src="images/step-02.avif" alt="">
                <h3>contact seller</h3>
                <p>If you like a property you can request for owner’s contact details. Both parties will receive contact information and then arrange for a visit.
                </p>
            </div>

            <div class="box">
                <img src="images/step-03.jpg" alt="">
                <h3>disclose the deal</h3>
                <p>Owner and tenant meet to close the deal directly. TOK-BROKER can help create a rental agreement and deliver it to your doorstep.
                </p>
            </div>
        </div>
    </section>

    <div class="testimonials-section" id="testimonials">

        <!-- Section Header Starts -->
        <header class="section-header">
            <h3 class="heading"> Client's review - See What Our Valuable Customers Says</h3>
        </header>
        <!-- Section Header Ends -->

        <!-- Owl Carousel Slider Starts -->
        <div class="owl-carousel owl-theme testimonials-container">
            <!-- Item1 Starts -->

            <div class="item testimonial-card">
                <div class="profile">
                    <div class="profile-image">
                        <img src="images/image1.jpg">
                    </div>
                    <div class="profile-desc">
                        <span>Alex</span>
                        <span>Description</span>
                    </div>
                </div>
                <main class="test-card-body">
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <h2>It's a nice experience</h2>
                    </div>
                    <p>"It was a nice experience with TOK-BROKER. They helped me to find a new home to stay as it was difficult for me to find a home with friendly roommates."</p>
                    <div class="ratings">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </main>

            </div>
            <!-- Item1 Ends -->

            <!-- Item2 Starts -->
            <div class="item testimonial-card">
                <div class="profile">
                    <div class="profile-image">
                        <img src="images/image2.jpg">
                    </div>
                    <div class="profile-desc">
                        <span>ava</span>
                        <span>Description</span>
                    </div>
                </div>
                <main class="test-card-body">
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <h2>Found Great Place to Stay via TOK-BROKER</h2>
                    </div>
                    <p>"TOK-BROKER provides a great place to stay with safe environment. if they show you something about property that is always same as it. No fake pictures."</p>
                    <div class="ratings">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </main>

            </div>
            <!-- Item2 Ends -->

            <!-- Item3 Starts -->
            <div class="item testimonial-card">
                <div class="profile">
                    <div class="profile-image">
                        <img src="images/image3.jpg">
                    </div>
                    <div class="profile-desc">
                        <span>Professor</span>
                        <span>Description</span>
                    </div>
                </div>
                <main class="test-card-body">
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <h2>Helps us to find good properties</h2>
                    </div>
                    <p>"This platform really helps us to find good properties in the least amount of time without any headache of brokerage."</p>
                    <div class="ratings">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </main>

            </div>
            <!-- Item3 Ends -->

            <!-- Item4 Starts -->
            <div class="item testimonial-card">
                <div class="profile">
                    <div class="profile-image">
                        <img src="images/image4.jpg">
                    </div>
                    <div class="profile-desc">
                        <span>Tokyo</span>
                        <span>Description</span>
                    </div>
                </div>
                <main class="test-card-body">
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <h2>excellent service</h2>
                    </div>
                    <p>Unique concept excellent service. TOK-BROKER helped me get a tenant in less than 24hours. If that's not fast i dont know what is.</p>
                    <div class="ratings">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </main>

            </div>
            <!-- Item4 Ends -->

            <!-- Item5 Starts -->
            <div class="item testimonial-card">
                <div class="profile">
                    <div class="profile-image">
                        <img src="images/image5.jpg">
                    </div>
                    <div class="profile-desc">
                        <span>naiomi</span>
                        <span>Description</span>
                    </div>
                </div>
                <main class="test-card-body">
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <h2>Awesome response time</h2>
                    </div>
                    <p>"Just want to say that your service is great and response time from the tenants is fantastic! Renting my property through TOK-BROKER was a matter of less than a day"</p>
                    <div class="ratings">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </main>

            </div>
            <!-- Item5 Ends -->

            <!-- Item6 Starts -->
            <div class="item testimonial-card">
                <div class="profile">
                    <div class="profile-image">
                        <img src="images/image6.jpg">
                    </div>
                    <div class="profile-desc">
                        <span>Berlin</span>
                        <span>Description</span>
                    </div>
                </div>
                <main class="test-card-body">
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <h2>Absolutely the Best..!!</h2>
                    </div>
                    <p>"Absolutely the Best..!! I was looking for a Flatmate & found one through TOK-BROKER in no time. The site speaks for itself."</p>
                    <div class="ratings">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </main>

            </div>
            <!-- Item6 Ends -->

            <!-- Item7 Starts -->
            <div class="item testimonial-card">
                <div class="profile">
                    <div class="profile-image">
                        <img src="images/image6.jpg">
                    </div>
                    <div class="profile-desc">
                        <span>Bishnoi</span>
                        <span>Description</span>
                    </div>
                </div>
                <main class="test-card-body">
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <h2>It is an amazing platform</h2>
                    </div>
                    <p>"I am extremely happy with the service NoBroker has provided, It is an amazing platform for renting one's property."</p>
                    <div class="ratings">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </main>

            </div>
            <!-- Item7 Ends -->

            <!-- Item8 Starts -->
            <div class="item testimonial-card">
                <div class="profile">
                    <div class="profile-image">
                        <img src="images/image6.jpg">
                    </div>
                    <div class="profile-desc">
                        <span>Abrar</span>
                        <span>Description</span>
                    </div>
                </div>
                <main class="test-card-body">
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <h2>Your customer support rocks!</h2>
                    </div>
                    <p>"Your customer support rocks! you just saved me from huge brokerage and from broker calls.I wanted to take this opportunity."</p>
                    <div class="ratings">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </main>

            </div>
            <!-- Item8 Ends -->

            <!-- Item9 Starts -->
            <div class="item testimonial-card">
                <div class="profile">
                    <div class="profile-image">
                        <img src="images/image6.jpg">
                    </div>
                    <div class="profile-desc">
                        <span>Abbas</span>
                        <span>Description</span>
                    </div>
                </div>
                <main class="test-card-body">
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <h2>Best Option</h2>
                    </div>
                    <p>"The service was great and very professional. I went with the Relax plan. I shortlisted one from them and in just one visit, I was able to finalize ... "</p>
                    <div class="ratings">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </main>

            </div>
            <!-- Item9 Ends -->

        </div>
        
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <?php include 'components/footer.php' ?>
        <script src="js/script.js"></script>
        <?php include 'components/message.php'; ?>
</body>

</html>