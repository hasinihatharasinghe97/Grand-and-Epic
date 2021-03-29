<?php
include("../../public/includes/session.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
    header('Location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand & Epic Hotel</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header-container" id="header-container">
        <?php include("../../public/includes/sticky-nav-login.php"); ?>

        <?php include("../../public/includes/side-nav-login.php"); ?>

        <span class="fa fa-user" style="position:absolute;top:20px;right:40px;font-size:60px;color:white"><span class="far fa-caret-square-down" style="font-size:20px;margin-left:10px;" onclick="funcUserDetails()"></span></span>
        <!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
        <div id="user-detail-container">
            <span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
            <p style="margin-bottom: 10px;"><?php echo "Logged in as " . $_SESSION['First_Name']; ?></P>
            <hr style="color:teal">

            <a href="logout.php"> <input type="submit" value="Log-out" name="logout-btn" style="margin-top:5px;margin-left:85px;padding:5px;background-color:black;color:white;border-radius:5px;"></a>


        </div>
        <div class="text-container">
            <span class="text1">Grand &</span>
            <span class="text2">Epic
            </span>
        </div>



    </div>
    <div class="body-container">
    <h3>Bookings</h3><br />
        <div class="booking-container">
            <div class="card">
    <?php include("../../config/connection.php");

$query = "SELECT Heading,Content,Img_url FROM content WHERE Content_ID='1' ";
$query_run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($query_run)) {

?>
        
                <div class="card-img" ><?php echo '<img src="data:image;base64, ' . base64_encode($row["Img_url"]) . '" alt="Image" style="width: 200px; height: 150px"' ?></div>
                <div class="card-content">
   
                 
<tr>
<h1 class="card-header"><?php echo $row["Heading"]; ?></h>
<p class="card-para"><?php echo $row["Content"]; ?></p>
<a href="staying-in-login.php" class="card-link">Read more</a>
			</tr>
		<?php
		}
    
		?>
                </div>
            </div>

            <div class="card">
            <?php include("../../config/connection.php");

$query = "SELECT Heading,Content,Img_url FROM content WHERE Content_ID='2'";
$query_run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($query_run)) {

?>
        
                <div class="card-img" ><?php echo '<img src="data:image;base64, ' . base64_encode($row["Img_url"]) . '" alt="Image" style="width: 200px; height: 150px"' ?></div>
                <div class="card-content" style="width: 200px; height: 150px">
   
                 
<tr>
<h1 class="card-header"><?php echo $row["Heading"]; ?></h>
<p class="card-para"><?php echo $row["Content"]; ?></p>
<a href="staying-in-login.php" class="card-link">Read more</a>
			</tr>
		<?php
		}
    
		?>
                        <a href="dinein-login.php" class="card-link">Read more</a>
                </div>
            </div>
        </div>
        <?php include("../../config/connection.php");

$query = "SELECT * FROM employee WHERE User_Role='Hotel Manager' ";
$query_run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($query_run)) {

?>

    </div>
    <h3>Offers</h2>
        <div class="offers-container">
            <div class="box">
                <span class="fas fa-user" id="customer-icon"></span>
                <div class="box-heading">Loyalty Offer</div>
                <div class="box-content">       
                 <?php include("../../config/connection.php");

$query = "SELECT Context,Policies FROM promotions WHERE Promotion_Type='Loyalty' ";
$query_run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($query_run)) {

?>
<tr>
				<?php echo $row["Context"]; ?>
				<?php echo $row["Policies"]; ?>
			</tr>
		<?php
		}
    }
		?>
 </div>
            </div>
            <div class="box">
                <span class="fas fa-gifts" id="creditcard-icon"></span>
                <div class="box-heading" style="margin-top: 65px;">Seasonal Offer</div>
                <div class="box-content" style="margin-top: 5px;">
                <?php include("../../config/connection.php");

$query = "SELECT Context,Policies FROM promotions WHERE Promotion_Type='Last' ";
$query_run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($query_run)) {

?>
<tr>
				<?php echo $row["Context"]; ?>
				<?php echo $row["Policies"]; ?>
			</tr>
		<?php
		}
		?> 
        </div>
                <div style="margin-left:-130px;font-size:15px;margin-top:-10px"><b>20% Off - Available Only For Suit Rooms</b></div>
                <div class="box-specials"><b>*Valid Until 25th Of December</b></div>
                <a href="apply-promotions-suite.php" target="_blank"><input type="button" value="Apply Now" style="padding: 5px 5px;border:none;border-radius:5px;background-color:white;cursor:pointer;font-weight:bolder;position:absolute;top:84%;right:10%"></a>
            </div>
            <div class="box">
                <span class="fas fa-hourglass-end" id="lastmin-icon"></span>
                <div class="box-heading">Last-Minute Offer</div>
                <div class="box-content"> <?php include("../../config/connection.php");

$query = "SELECT Context,Policies FROM promotions WHERE Promotion_Type='Seasonal' ";
$query_run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($query_run)) {

?>
<tr>
				<?php echo $row["Context"]; ?>
				<?php echo $row["Policies"]; ?>
			</tr>
		<?php
		}
		?> 
         </div>
            </div>
        </div>
        </div>
        <?php include("../../public/includes/footer-footer.php"); ?>
        <script src="../../public/Javascript/script.js"></script>
        <script src="../../public/Javascript/sticky-nav.js"></script>
        <script>
            function funcUserDetails() {
                document.getElementById('user-detail-container').style.display = "block";
            }

            function funcCloseUserDetails() {
                document.getElementById('user-detail-container').style.display = "none";
            }
        </script>
</body>

</html>