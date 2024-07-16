<header>
<div class="back" style="margin-bottom: -20px;">
  <div class="default-header">
    <div class="container">
      <div class="row align-items-center" style="height: 20px;">
        <div class=" col-sm-1 col-md-1">
          <div class="logo"> <a href="index.php"><img src="assets/images/321.png" alt="image"
           style="height: 80px; width: 110px;  position: static; " /></a> </div>
        </div>
       
        <div class="col-sm-8 col-md-10">
          
        <style>
    .header_search .form-control {
      width: 300px;
      height: 40px;
      border: 2px solid #00008b;
      border-radius: 20px;
      padding: 5px 15px;
      font-size: 16px;
    }

    .header_search button {
      height: 40px;
      border: none;
      background-color: #00008b;
      color: white;
      border-radius: 0 20px 20px 0;
      padding: 5px 15px;
  
    }

    .header_search button i {
      font-size: 20px;
    }
  </style>
          <div class="header_info">
         

     <!--the user is not login registration button display / if they also logged welcome text display -->    
   <?php   if(strlen($_SESSION['login'])==0)
	{
?>
 <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
<?php }
else{
echo "Welcome To Deen Car rental ";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>

<!-- query fetches the user's first and last names based on their email address stored in the session-->
<!--If the user is not logged in, these options redirect to the login form-->

<?php
$email=$_SESSION['login'];
$sql ="SELECT FName,LName FROM user WHERE Email=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FName);  echo htmlentities("  ");  echo htmlentities($result->LName);}}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php">Profile Settings</a></li>
            <li><a href="my-booking.php">My Booking</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Booking</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
        
       
      <div class="collapse navbar-collapse" id="navigation">

        <!--search bar-->
      <div class="header_search">
            <div id="search_toggle">
              <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <form action="search-carresult.php" method="get" id="header-search-form">
              <input type="search" placeholder="Search..." class="form-control">
              <button type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
          <!--end search-->

        </div>
      </div>
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a>    </li>
          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="car-listing.php">Car Listing</a>
          <li><a href="page.php?type=faqs">FAQs</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>

        </ul>
        
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>