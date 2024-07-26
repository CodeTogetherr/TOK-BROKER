<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

include 'components/bookmark_send.php';

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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/swiper-bundle.min.css">
   <!-- *******  Owl Carousel Links  ******* -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
   <link rel="stylesheet" href="css/styles.css">
   


   <script>
      function myfunction() {
         var preloader = document.getElementById('preloder');
         preloader.style.display = 'none';
      }
   </script>
   <title>Welcome to TOK-BROKER - get your best choice!</title> 
</head>


<body onload="myfunction()">
   <div id="preloder">
      <div class="loader"></div>
   </div>
   <?php include 'components/user_header.php'; ?>




   <div class="home">

      <section class="center">

         <form action="search.php" method="post">
            <h3>find your perfect home</h3>
            <div class="box">
               <p>enter location <span>*</span></p>
               <input type="text" name="h_location" required maxlength="100" placeholder="enter city name" class="input">
            </div>
            <div class="flex">
               <div class="box">
                  <p>property type <span>*</span></p>
                  <select name="h_type" class="input" required>
                     <option value="flat">flat</option>
                     <option value="house">house</option>
                     <option value="shop">shop</option>
                  </select>
               </div>
               <div class="box">
                  <p>offer type <span>*</span></p>
                  <select name="h_offer" class="input" required>
                     <option value="sale">sale</option>
                     <option value="resale">resale</option>
                     <option value="rent">rent</option>
                  </select>
               </div>
               <!-- <div class="box">
                  <p>maximum budget <span>*</span></p>
                  <select name="h_min" class="input" required>
                     <option value="5000">5k</option>
                     <option value="10000">10k</option>
                     <option value="15000">15k</option>
                     <option value="20000">20k</option>
                     <option value="30000">30k</option>
                     <option value="40000">40k</option>
                     <option value="40000">40k</option>
                     <option value="50000">50k</option>
                     <option value="100000">1 lac</option>
                     <option value="500000">5 lac</option>
                     <option value="1000000">10 lac</option>
                     <option value="2000000">20 lac</option>
                     <option value="3000000">30 lac</option>
                     <option value="4000000">40 lac</option>
                     <option value="4000000">40 lac</option>
                     <option value="5000000">50 lac</option>
                     <option value="6000000">60 lac</option>
                     <option value="7000000">70 lac</option>
                     <option value="8000000">80 lac</option>
                     <option value="9000000">90 lac</option>
                     <option value="10000000">1 Cr</option>
                     <option value="20000000">2 Cr</option>
                     <option value="30000000">3 Cr</option>
                     <option value="40000000">4 Cr</option>
                     <option value="50000000">5 Cr</option>
                     <option value="60000000">6 Cr</option>
                     <option value="70000000">7 Cr</option>
                     <option value="80000000">8 Cr</option>
                     <option value="90000000">9 Cr</option>
                     <option value="100000000">10 Cr</option>
                     <option value="150000000">15 Cr</option>
                     <option value="200000000">20 Cr</option>
                  </select>
               </div>
               <div class="box">
                  <p>maximum budget <span>*</span></p>
                  <select name="h_max" class="input" required>
                     <option value="5000">5k</option>
                     <option value="10000">10k</option>
                     <option value="15000">15k</option>
                     <option value="20000">20k</option>
                     <option value="30000">30k</option>
                     <option value="40000">40k</option>
                     <option value="40000">40k</option>
                     <option value="50000">50k</option>
                     <option value="100000">1 lac</option>
                     <option value="500000">5 lac</option>
                     <option value="1000000">10 lac</option>
                     <option value="2000000">20 lac</option>
                     <option value="3000000">30 lac</option>
                     <option value="4000000">40 lac</option>
                     <option value="4000000">40 lac</option>
                     <option value="5000000">50 lac</option>
                     <option value="6000000">60 lac</option>
                     <option value="7000000">70 lac</option>
                     <option value="8000000">80 lac</option>
                     <option value="9000000">90 lac</option>
                     <option value="10000000">1 Cr</option>
                     <option value="20000000">2 Cr</option>
                     <option value="30000000">3 Cr</option>
                     <option value="40000000">4 Cr</option>
                     <option value="50000000">5 Cr</option>
                     <option value="60000000">6 Cr</option>
                     <option value="70000000">7 Cr</option>
                     <option value="80000000">8 Cr</option>
                     <option value="90000000">9 Cr</option>
                     <option value="100000000">10 Cr</option>
                     <option value="150000000">15 Cr</option>
                     <option value="200000000">20 Cr</option>
                  </select>
               </div>-->
               <!-- <div class="box">
                  <p>maximum budget <span>*</span></p>
                  <div class="custom-select" style="width:200px;">
                     <select name="h_max" required>

                        <option value="5000">5k</option>
                        <option value="10000">10k</option>
                        <option value="15000">15k</option>
                        <option value="20000">20k</option>
                        <option value="30000">30k</option>
                        <option value="40000">40k</option>
                        <option value="40000">40k</option>
                        <option value="50000">50k</option>
                        <option value="100000">1 lac</option>
                        <option value="500000">5 lac</option>
                        <option value="1000000">10 lac</option>
                        <option value="2000000">20 lac</option>
                        <option value="3000000">30 lac</option>
                        <option value="4000000">40 lac</option>
                        <option value="4000000">40 lac</option>
                        <option value="5000000">50 lac</option>
                        <option value="6000000">60 lac</option>
                        <option value="7000000">70 lac</option>
                        <option value="8000000">80 lac</option>
                        <option value="9000000">90 lac</option>
                        <option value="10000000">1 Cr</option>
                        <option value="20000000">2 Cr</option>
                        <option value="30000000">3 Cr</option>
                        <option value="40000000">4 Cr</option>
                        <option value="50000000">5 Cr</option>
                        <option value="60000000">6 Cr</option>
                        <option value="70000000">7 Cr</option>
                        <option value="80000000">8 Cr</option>
                        <option value="90000000">9 Cr</option>
                        <option value="100000000">10 Cr</option>
                        <option value="150000000">15 Cr</option>
                        <option value="200000000">20 Cr</option>
                     </select>

                  </div>
                  <script>
                     var x, i, j, l, ll, selElmnt, a, b, c;
                     /*look for any elements with the class "custom-select":*/
                     x = document.getElementsByClassName("custom-select");
                     l = x.length;
                     for (i = 0; i < l; i++) {
                        selElmnt = x[i].getElementsByTagName("select")[0];
                        ll = selElmnt.length;
                        /*for each element, create a new DIV that will act as the selected item:*/
                        a = document.createElement("DIV");
                        a.setAttribute("class", "select-selected select-selected-bottom-rounded");
                        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
                        x[i].appendChild(a);
                        /*for each element, create a new DIV that will contain the option list:*/
                        b = document.createElement("DIV");
                        b.setAttribute("class", "select-items select-hide");
                        for (j = 1; j < ll; j++) {
                           /*for each option in the original select element,
                           create a new DIV that will act as an option item:*/
                           c = document.createElement("DIV");
                           c.innerHTML = selElmnt.options[j].innerHTML;
                           c.addEventListener("click", function(e) {
                              /*when an item is clicked, update the original select box,
                              and the selected item:*/
                              var y, i, k, s, h, sl, yl;
                              s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                              sl = s.length;
                              h = this.parentNode.previousSibling;
                              for (i = 0; i < sl; i++) {
                                 if (s.options[i].innerHTML == this.innerHTML) {
                                    s.selectedIndex = i;
                                    h.innerHTML = this.innerHTML;
                                    y = this.parentNode.getElementsByClassName("same-as-selected");
                                    yl = y.length;
                                    for (k = 0; k < yl; k++) {
                                       y[k].removeAttribute("class");
                                    }
                                    this.setAttribute("class", "same-as-selected");
                                    break;
                                 }
                              }
                              h.click();
                           });
                           b.appendChild(c);
                        }
                        x[i].appendChild(b);
                        a.addEventListener("click", function(e) {
                           /*when the select box is clicked, close any other select boxes,
                           and open/close the current select box:*/
                           e.stopPropagation();
                           closeAllSelect(this);
                           this.nextSibling.classList.toggle("select-hide");
                           this.classList.toggle("select-arrow-active");
                           this.classList.toggle("select-selected-bottom-square");
                        });
                     }

                     function closeAllSelect(elmnt) {
                        /*a function that will close all select boxes in the document,
                        except the current select box:*/
                        var x, y, i, xl, yl, arrNo = [];
                        x = document.getElementsByClassName("select-items");
                        y = document.getElementsByClassName("select-selected");
                        xl = x.length;
                        yl = y.length;
                        for (i = 0; i < yl; i++) {
                           if (elmnt == y[i]) {
                              arrNo.push(i)
                           } else {
                              y[i].classList.remove("select-arrow-active");
                              y[i].classList.remove("select-selected-bottom-square");
                           }
                        }
                        for (i = 0; i < xl; i++) {
                           if (arrNo.indexOf(i)) {
                              x[i].classList.add("select-hide");
                           }
                        }
                     }
                     /*if the user clicks anywhere outside the select box,
                     then close all select boxes:*/
                     document.addEventListener("click", closeAllSelect);
                  </script>
               </div> -->
               <input type="submit" value="search property" name="h_search" class="btn">
         </form>

      </section>

   </div>








   <section class="service">
      <h1 class="heading">Our services</h1>
      <div class="box-container">
         <div class="box">
            <a href="all_itemization.php" target="_blank" style="text-decoration: none;">
               <img src="images/buy.png" alt="">
               <h3>Buy houses</h3>
            </a>
         </div>
         <div class="box">
            <a href="all_itemization.php" target="_blank" style="text-decoration: none;">
               <img src="images/icons8-rent-house-96.png" alt="">
               <h3>rent houses</h3>
            </a>
         </div>
         <div class=" box">
            <a href="post_property.php" target="_blank" style="text-decoration: none;">
               <img src="images/sell.png" alt="">
               <h3>sell houses</h3>
            </a>
         </div>
         <div class=" box">
            <a href="all_itemization.php" target="_blank" style="text-decoration: none;">
               <img src="images/icons8-city-buildings-64.png" alt="">
               <h3>flats and appartments</h3>
            </a>
         </div>
         <div class=" box">
            <a href="all_itemization.php" target="_blank" style="text-decoration: none;">
               <img src="images/shop.png" alt="">
               <h3>shops and malls</h3>
            </a>
         </div>
         <div class=" box">
            <a href="contact.php" target="_blank" style="text-decoration: none;">
               <img src="images/icons8-support-96.png" alt="">
               <h3>24/7 support</h3>
            </a>
         </div>
      </div>
      </div>
      </div>

   </section>


      

      <section class="all_itemization">

      <h1 class="heading">latest itemization</h1>

<div class="box-container">
   <?php
      $total_images = 0;
      $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC");
      $select_properties->execute();
      if($select_properties->rowCount() > 0){
         while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){

         $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_user->execute([$fetch_property['user_id']]);
         $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

         if(!empty($fetch_property['image_02'])){
            $image_coutn_02 = 1;
         }else{
            $image_coutn_02 = 0;
         }
         if(!empty($fetch_property['image_03'])){
            $image_coutn_03 = 1;
         }else{
            $image_coutn_03 = 0;
         }
         if(!empty($fetch_property['image_04'])){
            $image_coutn_04 = 1;
         }else{
            $image_coutn_04 = 0;
         }
         if(!empty($fetch_property['image_05'])){
            $image_coutn_05 = 1;
         }else{
            $image_coutn_05 = 0;
         }

         $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

         $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
         $select_saved->execute([$fetch_property['id'], $user_id]);

   ?>
   <form action="" method="POST">
      <div class="box">
         <input type="hidden" name="property_id" value="<?= $fetch_property['id']; ?>">
         <?php
            if($select_saved->rowCount() > 0){
         ?>
         <button type="submit" name="save" class="save"><i class="fas fa-bookmark"></i><span>saved</span></button>
         <?php
            }else{ 
         ?>
         <button type="submit" name="save" class="save"><i class="far fa-bookmark"></i><span>save</span></button>
         <?php
            }
         ?>
         <div class="thumb">
            <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p>
            
            <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
         </div>
         <div class="admin">
            <h3><?= substr($fetch_user['name'], 0, 1); ?></h3>
            <div>
               <p><?= $fetch_user['name']; ?></p>
               <span><?= $fetch_property['date']; ?></span>
            </div>
         </div>
      </div>
      <div class="box">
         <div class="price"><i class="fas fa-indian-rupee-sign"></i><span><?= $fetch_property['price']; ?></span></div>
         <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
         <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
         <div class="flex">
            <p><i class="fas fa-house"></i><span><?= $fetch_property['type']; ?></span></p>
            <p><i class="fas fa-tag"></i><span><?= $fetch_property['offer']; ?></span></p>
            <p><i class="fas fa-bed"></i><span><?= $fetch_property['bhk']; ?> BHK</span></p>
            <p><i class="fas fa-trowel"></i><span><?= $fetch_property['status']; ?></span></p>
            <p><i class="fas fa-couch"></i><span><?= $fetch_property['furnished']; ?></span></p>
            <p><i class="fas fa-maximize"></i><span><?= $fetch_property['carpet']; ?>sqft</span></p>
         </div>
         <div class="flex-btn">
            <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">view property</a>
            <input type="submit" value="send enquiry" name="send" class="btn">
         </div>
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no properties added yet! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
   }
   ?>
   
</div>



      <div style="margin-top: 2rem; text-align:center;">
         <a href="all_itemization.php" class="inline-btn">view all</a>
      </div>

   </section>



   <?php include 'components/testimonials.php' ?>






   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <?php include 'components/footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/swiper-bundle.min.js"></script>
   <script src="js/script.js"></script>
   <script>
      let swiperCards = new Swiper(".card__content", {
         loop: true,
         spaceBetween: 32,
         grabCursor: true,

         pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
         },

         navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
         },

         breakpoints: {
            600: {
               slidesPerView: 2,
            },
            968: {
               slidesPerView: 3,
            },
         },
      });
   </script>

   <?php include 'components/message.php'; ?>
   <script>
      let range = document.querySelector("#range");
      range.oninput = () => {
         document.querySelector('#output').innerHTML = range.value;
      }
   </script>

</body>

</html>