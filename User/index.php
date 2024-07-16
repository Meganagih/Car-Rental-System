<?php 
session_start();
include('include/config.php');
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "deen_car_rental";

$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Deen Car Rental</title>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<script src="js/package/dist/sweetalert2.all.js"></script>
		
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 

</head>
<body>

	<!--Header-->
<?php include('include/header.php');?>
<div class="container" style="width:100%; height:200%;">
<div id="myCarousel" class="carousel slide" data-ride="carousel">



<!--indicator-->
<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
   </ol>

   <!-- slides-->
   <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="assets/images/21.jpg" alt="china " >
      <div class="carousel-caption">
        <h3 style="font-size: 45px; color: white;" >Find the right car for you</h3>
      </div>
    </div>
    <div class="item">
    <img src="assets/images/black.jpg" alt="china">
    <div class="carousel-caption">
        <h3 style="font-size: 45px; color: white;" >We have more than a thousand cars for you to choose.</h3>
      </div>
    </div>
    <div class="item">
    <img src="assets/images/markus.jpg" alt="china">
   </div>
</div>
</div>
<!-- /Header --> 


      <!-- Recently Listed New Cars -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resentnewcar">

<?php $sql = "SELECT car.CarName,brands.BrandName,car.PricePerDay,car.Price_Pe_KM,car.FuelType,car.ModelYear,car.Car_id,car.SeatingCapacity,car.CarOverview,car.Pic1,car.car_availability from car join brands on brands.Brand_id=car.Brand_id order by Car_id desc limit 6";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >= 0)
{
foreach($results as $result)
{  
?>  

<div class="col-list-3">
<div class="recent-car-list block">
<div class="car-info-box"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->Car_id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Pic1);?>" class="img-responsive" alt="image" style="height: 260px;width: 400px;"></a>
<ul>
<li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> Model</li>
<li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
</ul>
</div>
<div class="car-title-m">
<h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->Car_id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->CarName);?></a></h6>

 
</div>
<div class="car-title-m2">

</div>
<?php
$status="yes";
$available=($result->car_availability);
?>
<div class="inventory_info_m">
<p><?php echo substr($result->CarOverview,0,50);?></p>
</div>
</div>
</div>
<?php }}?>
       
      </div>
    </div>
  </div>
</section>
<!-- /Resent Cat --> 


<!-- Car Brands Section -->

<section class="section-padding">
  <div class="container">
    <div class="section-header text-center">
      <h2>Our <span>Car Brands</span></h2>
      <p>We offer a variety of car brands for you to choose from.</p>
    </div>
    <div class="row">
  
<div class="col-lg-3 col-md-6 col-sm-6">
        <div class="brand-logo">
          <img src="assets\images/pngegg.png" class="img-responsive" alt="vezel">
        </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
        <div class="brand-logo">
          <img src="assets\images/toyota.png" class="img-responsive" alt="vezel">
        </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
        <div class="brand-logo">
          <img src="assets\images/nissan.png" class="img-responsive" alt="vezel">
        </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
        <div class="brand-logo">
          <img src="assets\images/suzuki.png" class="img-responsive" alt="vezel">
        </div>
    </div>
  </div>
</div>
</section>
<!-- /Car Brands Section -->

        	<!-- Fun Facts-->

          <section class="fun-facts-section">
  <div class="container div_zindex">
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-calendar" aria-hidden="true"></i>40+</h2>
            <p>Years In Business</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>10+</h2>
            <p>New Cars For Rent</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>10+</h2>
            <p>Used Cars For Rent</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>600+</h2>
            <p>Satisfied Customers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>


<!--Footer -->
<?php include('include/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 


<!--Login-Form -->
<?php include('include/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('include/registration.php');?>
<!--/Register-Form --> 


<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>