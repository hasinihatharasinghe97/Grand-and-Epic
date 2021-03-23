<?php

include("../../public/includes/session.php");

checkSession();
	if(!isset($_SESSION['First_Name'])){
		header('Location:../Hotel_Website/HomePage-login.php');
	}

?>
<html>
	<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
		<title>
		Receptionist Dashboard
		</title>
		<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
	</head>	
	<body bgcolor = "black">

	<center>
	<img src="../../public/images/Logo.png" width="20%">

	<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:0px;top:20px;" onclick="funcUserDetails()"></span>
		<!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black">
			<?php 
				echo "Logged in as " . $_SESSION['First_Name'] ."(Staff)</P>";
			?>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
		<div class="sidenav">	
			<button class="dropdown-btn">Dashboard
			<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
				<a href="ReceptionistReservations.php">Reservations</a>
				<a href="ReceptionistRoomDetails.php">Room Details</a>
				<a href="ReceptionistRequestLeave.php">Request a Leave</a>
				<a href="ReceptionistAcceptPayments.php">Accept Payments</a>
				</div>
		</div>
		<div class = "top-right">
		<table width = "100%">
		<tr>
		<td>
		</td>
		<td>
			<img src = "../../public/images/ayomal.png" height = "80px" >
		</td>
		</tr>
	</table>
	</div>
	<script>
	/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
	  dropdown[i].addEventListener("click", function() {
	  this.classList.toggle("active");
	  var dropdownContent = this.nextElementSibling;
	  if (dropdownContent.style.display === "block") {
	  dropdownContent.style.display = "none";
	  } else {
	  dropdownContent.style.display = "block";
	  }
	  });
	}
	</script>
	
	<table style ="position:absolute; top : 240px; width:350px;" >
		<tr>
		<td>
			<img src = "../../public/images/Employee.png" height = 80px >
		</td>
		<td>
			<p style = "font-family :Lato; font-size:20px; color :white;">Receptionist Dashboard</p>		
		</td>
		</tr>
	</table>
	

	<table style ="position:absolute; left:20px; top:350px; width:97%;border: 1px solid white;" >
		<tr>
		<th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;"><a href="ReceptionistReservations.php">Reservations</a></p>		
		</th>
		<th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;"><a href="ReceptionistRoomDetails.php">Room Details</a></p>		
		</th>
		<th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;"><a href="ReceptionistRequestLeave.php">Request a Leave</a></p>		
		</th>
		<th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;"><a href="ReceptionistAcceptPayments.php">Accept Payments</a></p>		
		</th>
		</tr>
		<tr>
		<td style ="border: 1px solid white;">
		
			<table width= "100%">
				<tr>
				<td align ="center">
					<img src = "../../public/images/Reservation.png" height = "80px" >
				</td>
				<td align ="center">
					<img src = "../../public/images/sheets.png" height = "80px" >
				</td>
                </tr>
                <tr>
                    <td align ="center">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Reservation Type</p>		
                    </td>    
                </tr>
			</table>
			
		</td>
		<td style ="border: 1px solid white;">
		
			<table width="100%">
				<tr>
				<td align ="center">
					<img src = "../../public/images/bed.png" height = "80px">
				</td>
				<td align="center">
                    <img src = "../../public/images/room.png" height = "80px">
				</td>
				</tr>
				<tr>
                    <td align ="center">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Room Type</p>		
                    </td>
                    <td align ="center">
                        <p style = "font-family :Lato; font-size:20px; color :white;">No: of People</p>		
                    </td>    
                </tr>
             </table>
			
		</td>
		<td style ="border: 1px solid white;">
		
		<table width="100%">
			<tr>
			<td align ="center">
				<img src = "../../public/images/Calendar.png" height = "80px">
			</td>
			<td align="center">
				<img src = "../../public/images/bigCal.png" height = "80px">
			</td>
			</tr>
			
		 </table>
		
	</td>
	<td style ="border: 1px solid white;">
		
		<table width="100%">
			<tr>
			<td align ="center">
					<img src = "../../public/images/Payment.png" height = "80px" >
			</td>
			<td align ="center">
					<img src = "../../public/images/sheets.png" height = "80px" >
				</td>
			</tr>
			<tr>
				<td align ="center">
					<p style = "font-family :Lato; font-size:20px; color :white;">Payment Type</p>		
				</td>
			</tr>
		 </table>
		
	</td>
		</tr>
		
	</table>


<!-- User Profie -->
	<form action="" method="POST">
		<fieldset style=" position:absolute; top:680px; width: 75%; left:160px">
			<table align="center" style="color:white; font-size: 20px; width:88%;">

			<?php
				include("../../config/connection.php");

					$query = "SELECT * FROM employee where First_Name='$_SESSION[First_Name]' ; ";
					$query_run = mysqli_query($con,$query);


					
					// Update Profile
					if (isset($_POST['update'])) {

						$id = $_POST['id'];
						$fname = $_POST['fname'];
						$lname = $_POST['lname'];
						$email = $_POST['email'];
						$tel = $_POST['tel'];
					
							$update_query = " UPDATE employee SET Last_Name='$lname', Email='$email', Contact_No='$tel' where Employee_ID='$_POST[id]' ";
							$update_run = mysqli_query($con, $update_query);
					
							if ($update_run) {
								echo "<script>
								alert('Your Details has been Updated');
								window.location.href='ReceptionistDashboard.php';
								</script>";
							} else {
								echo '<script> alert("Data Not Updated") </script>';
							}
					}



					
					while($row = mysqli_fetch_array($query_run))
					{
			?>

				<tr>
					<td align="center" colspan="2"><h1>USER PROFILE</h1></td>
				</tr>
				<tr>
					<td>Receptionist ID:</td>
					<td><input type="text" name="id" readonly value="<?php echo $row['Employee_ID'] ?>" /></td>
				</tr>
				<tr>
					<td>First Name:</td>
					<td><input type="text" name="fname" readonly value="<?php echo $row['First_Name'] ?>" /></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input type="text" name="lname" value="<?php echo $row['Last_Name'] ?>" /></td>
				</tr>
				<tr>
					<td>Email Address:</td>
					<td><input type="email" name="email" value="<?php echo $row['Email'] ?>" /></td>
				</tr>
				<tr>
					<td>TP Number: </td>
					<td><input type="tel" name="tel" value="<?php echo $row['Contact_No'] ?>" /></td>
				</tr>
				<tr>
					<td><input type="submit" class="button" name="update" value="UPDATE PROFILE"></td>
				</tr>
			<?php
				}
			?>

			</table>
		</form>



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