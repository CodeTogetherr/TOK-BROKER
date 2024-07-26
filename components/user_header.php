<!-- <header class="header">


   <nav class="navbar nav-2">

      <a href="index.php"><img src="images/logo.jpg" alt=""></a>
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>

         <div class="menu">
            <ul>

               <li><a href="index.php"><i class="fas fa-house"></i> MY Home</a>

               <li><a href="#">My itemization<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="dashboard.php">dashboard</a></li>

                     <li><a href="my_itemization.php">my itemization</a></li>
                  </ul>
               </li>
               <li><a href="#">All Filters<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="search.php">filter search</a></li>
                     <li><a href="all_itemization.php">all itemization</a></li>
                  </ul>
               </li>

               <li><a href="contact.php">contact us</a></i></li>

               </li>
            </ul>
         </div>
        
  
  

         <ul class="user" >
            <li><a href="post_property.php">post property<i class="fas fa-paper-plane"></i></a></li>
            <li><a href="bookmark.php"><i class="far fa-bookmark"></i></a></li>
            <li><a href="#"><i class="fas fa-user"></i></a>
               <ul>




                  <?php if ($user_id != '') { ?>
                     <li><a href="post_property.php">post property<i class="fas fa-paper-plane"></i></a></li>
                     <li><a href="update.php">update profile<i class="fas fa-user-gear"></i></a></li>
                     <li><a href="components/user_logout.php" onclick="confirmation(event)" class="delete-btn">logout <i class="fas fa-right-from-bracket"></i></a>
                     </li> <?php } else { ?>
                     <li><a href="login.php">login now</a></li>
                     <li><a href="register.php">register new</a>
                     </li>
                  <?php } ?>
               </ul>
            </li>
         </ul>
      </section>
   </nav>


</header> -->



<nav>
   <div class="wrapper">
      <div class="logo"><a href="index.php"><img src="images/logo.jpg" alt=""></a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">


      <ul class="nav-links">
         <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
         <li><a href="post_property.php">post property <i class="fas fa-paper-plane"></i></a></li>
         <li><a href="index.php"><i class="fas fa-house"></i> MY Home</a></li>
         <li>
            <a href="#" class="desktop-item">Browse <i class="fas fa-angle-down"></i></a>
            <input type="checkbox" id="showMega" />
            <label for="showMega" class="mobile-item"> <i class="fas fa-angle-down"></i> Browse</label>
            <div class="mega-box">
               <div class="content">
                  <!-- <div class="row">
                     <img src="https://fadzrinmadu.github.io/hosted-assets/responsive-mega-menu-and-dropdown-menu-using-only-html-and-css/img.jpg" alt="" />
                  </div> -->
                  <div class="row">
                     <header>My itemization</header>
                     <ul class="mega-links">
                        <li><a href="dashboard.php">dashboard</a></li>

                        <li><a href="my_itemization.php">my itemization</a></li>
                     </ul>
                  </div>
                  <div class="row">
                     <header>All Filters</header>
                     <ul class="mega-links">
                        <li><a href="search.php">filter search</a></li>
                        <li><a href="all_itemization.php">all itemization</a></li>
                     </ul>
                  </div>
                  <div class="row">
                     <header>Help and support</header>
                     <ul class="mega-links">
                        <li><a href="contact.php">contact us</a></i></li>
                        <li><a href="about.php">about us</a></i></li>
                     </ul>
                  </div>
               </div>
            </div>
         </li>



         <li><a href="bookmark.php"> <i class="far fa-bookmark"></i> bookmark</a></li>
         <li>
            <a href="#" class="desktop-item"> <i class="fas fa-user"></i> my account</a>
            <input type="checkbox" id="showDrop">
            <label for="showDrop" class="mobile-item"><i class="fas fa-user"></i> My Account</label>
            <ul class="drop-menu">
               <?php if ($user_id != '') { ?>
                  <li><a href="post_property.php">post property <i class="fas fa-paper-plane"></i></a></li>
                  <li><a href="update.php">update profile <i class="fas fa-user-gear"></i></a></li>
                  <li><a href="components/user_logout.php" onclick="confirmation(event)" class="delete-btn">logout <i class="fas fa-right-from-bracket"></i></a>
                  </li> <?php } else { ?>
                  <li><a href="login.php">login now</a></li>
                  <li><a href="register.php">register new</a>
                  </li>
               <?php } ?>
            </ul>
         </li>



      </ul>


      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
   </div>
</nav>



<script>
   function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
      console.log(urlToRedirect); // verify if this is the right URL
      swal({
            title: "Are you sure you want to Logout from this website?",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((isconfirm) => {
            if (isconfirm) {
               // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
               window.location.href = urlToRedirect;
            } else {
               swal("Cancelled", "You are still Logged-in", "error");
            }
         });
   }
</script>