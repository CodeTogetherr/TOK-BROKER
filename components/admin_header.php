<header class="header">

  <div id="close-btn"><i class="fas fa-times"></i></div>

  <a href="dashboard.php" class="logo"><img src="../images/logo.jpg" alt="logo-admin"></a>

  <nav class="navbar">
    <a href="dashboard.php"><i class="fas fa-home"></i><span>Home</span></a>
    <a href="itemization.php"><i class="fas fa-building"></i><span>My Itemization</span></a>
    <a href="users.php"><i class="fas fa-user"></i><span>users</span></a>
    <a href="admins.php"><i class="fas fa-user-gear"></i><span>Admins</span></a>
    <a href="messages.php"><i class="fas fa-message"></i><span>Messages</span></a>
  </nav>

  <a href="update.php" class="btn">update account</a>
  <div class="flex-btn">
    <a href="login.php" class="option-btn">login</a>
    <a href="register.php" class="option-btn">register</a>
  </div>
  <a href="../components/admin_logout.php" onclick="confirmation(event)" class="delete-btn"><i class="fas fa-right-from-bracket"></i><span>logout</span></a>

</header>

<div id="menu-btn" class="fas fa-bars"></div>
<script>
  function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
    console.log(urlToRedirect); // verify if this is the right URL
    swal({
        title: "Are you sure you want to Logout?",
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>