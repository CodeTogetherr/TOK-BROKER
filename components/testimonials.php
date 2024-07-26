<!DOCTYPE html>
<html>
<head>
    <style>
        *{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
    font-family:'Open Sans', sans-serif;

	/* Variables for storing colors */
	--card-clr:hsl(230, 100%, 97%);
	--body-clr: #191d28;
	--primary-clr: hsl(230, 100%, 98%);
	--heading-clr: #215e5f;
	--text-clr: #4e4d4d;
}

.testimonials-section{
	width: 100%;
	padding: 0px 8%;
}
.testimonials-section .section-header{
	max-width: 700px;
	text-align: center;
	margin: 30px auto 40px;
}
.section-header h1{
	position: relative;
	font-size: 36px;
	color: var(--primary-clr);
}
.testimonials-container{
	position: relative;
}
.testimonials-container .testimonial-card{
	padding: 20px;
}
.testimonial-card .test-card-body{
	background-color: var(--card-clr);
	box-shadow: 2px 2px 20px rgba(0,0,0,0.12);
	padding: 20px;
}
.test-card-body .quote{
	display: flex;
	align-items: center;
}
.test-card-body .quote i{
	font-size: 45px;
	color: var(--heading-clr);
	margin-right: 20px;
}
.test-card-body .quote h2{
	color: var(--heading-clr);
}
.test-card-body p{
	margin: 10px 0px 15px;
	font-size: 14px;
	line-height: 1.5;
	color: var(--text-clr);
}
.test-card-body .ratings{
	margin-top: 20px;
}
.test-card-body .ratings i{
	font-size: 17px;
	color: #f0bf6a;
	cursor: pointer;
}
.testimonial-card .profile{
	display: flex;
	align-items: center;
	margin-top: 25px;
}
.profile .profile-image{
	width: 55px;
	height: 55px;
	border-radius: 50%;
	overflow: hidden;
	margin-right: 15px;
}
.profile .profile-image img{
	width: 100%;
	height: 100%;
	border-radius: 50%;
	object-fit: cover;
}
.profile .profile-desc{
	display: flex;
	flex-direction: column;
}
.profile-desc span:nth-child(1){
	font-size: 24px;
	font-weight: bold;
	color: var(--primary-clr);
}
.profile-desc span:nth-child(2){
	font-size: 15px;
	color: hsl(230, 100%, 97%);
}
.owl-nav{
	position: absolute;
	right: 20px;
	bottom: -10px;
}
.owl-nav button{
	border-radius: 50% !important;
}
.owl-nav .owl-prev i,
.owl-nav .owl-next i{
	padding: 10px !important;
	border-radius: 50%;
	font-size: 18px !important;
	background-color: var(--card-clr) !important;
	color: #215e5f;
	cursor: pointer;
	transition: 0.4s;
}
.owl-nav .owl-prev i:hover,
.owl-nav .owl-next i:hover{
	background-color: var(--primary-clr) !important;
	color: #e9e9e9;
}
.owl-dots{
	margin-top: 15px;
}
.owl-dots .owl-dot span{
	background-color: #d0d0d0  !important;
	padding: 6px !important;
}
.owl-dot.active span{
	background-color: var(--primary-clr) !important;
}
.text{

    text-align: center;
    text-decoration: none;
    cursor: pointer;
    font-size: 1.7rem;
    
   
    padding: 30px;
}
.text a{
    color: #f0bf6a;
}
.text a:hover{
    color: #cb9f51;
}
    </style>
  <!-- *******  Link To Custom CSS Style Sheet  ******* -->
  <link rel="stylesheet" type="text/css" href="style.css">

  <!-- *******  Font Awesome Icons Link  ******* -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

  <!-- *******  Owl Carousel Links  ******* -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">

</head>
<body>
<div class="testimonials-section">
	
	<!-- Section Header Starts -->
	<header class="section-header">
		<h3 class="heading" >What Our Clients Say</h3>
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
    			<p>"It was a nice experience with TOK-BROKER. They helped me to find a new home to stay as it was difficult for me,as an individual,to find a home with friendly roommates.Thankfully Nobroker helped me to get one with all kind of facilities."</p>
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
    			<p>"This platform really helps us to find good properties in the least amount of time without any headache of brokerage. I was so scared in Pune due to the issues of high deposit as well as brokerage. I was new and had no time. But then I found TOK-BROKER."</p>
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
    			<p>Just want to say that your service is great and response time from the tenants is fantastic! Renting my property through NoBroker was a matter of less than a day</p>
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

    </div>
	<!-- Owl Carousel Slider Ends -->
<div class="text"><a href="about.php#testimonials">More Testimonials</a></div>
</div>

<!--   *****   JQuery Link   *****   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!--   *****   Owl Carousel js Link  *****  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!--   *****   Link To Custom Script File   *****   -->
<script type="text/javascript">
    // This is script file

$('.testimonials-container').owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:6000,
    margin:10,
    nav:true,
    navText:["<i class='fa-solid fa-arrow-left'></i>",
             "<i class='fa-solid fa-arrow-right'></i>"],
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:1,
            nav:true
        },
        768:{
            items:2
        },
    }
})


</script>
</body>
</html>