<?php
include("../../public/includes/session.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
	header('Location:../Hotel_Website/index.php');
}

?>
<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">

	<title>
		Admin Manage Co-admins
	</title>

	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black">

	<center>
		<img src="../../public/images/Logo.png" width="20%">
		<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:0px;top:20px;" onclick="funcUserDetails()"></span>
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as " . $_SESSION['First_Name']; ?></P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
	<div class="sidenav">
		<button class="dropdown-btn">Manage Co-admins(H.M)
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="AdminDashboard.php">
				<font size="4 px">Dashboard</font>
			</a>
			<a href="AdminRespondToLeaveRequests.php">
				<font size="4px">Respond to Leave Requests</font>
			</a>
			<a href="AdminViewBookings.php">
				<font size="4 px">View Booking Details</font>
			</a>
			<a href="AdminManageContent.php">
				<font size="4 px">Manage Content on web-site</font>
			</a>
			<a href="AdminAddPromotion.php">
				<font size="4 px">Add promotion</font>
			</a>
			<a href="AdminViewStats.php">
				<font size="4 px">View Stats</font>
			</a>
		</div>
	</div>
	<div class="top-right">
		<table width="100%">
			<tr>
				<td>

				</td>
				<td>
					<img src="../../public/images/Uvini.png" width="60" height="60">
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

	<fieldset style=" position:absolute; top:270px; width: 75%; left:160px">
		<legend style="color:white; font-size: 20px">Add Co-admins</legend>
		<form action="co-adminadd.php" method="POST">
			<table style="color:white; font-size: 20px; width:88%;">
				<tr>
					<td align="left">Employee ID:</td>
					<td align="center"><input type="text" name="empID" pattern="[C]+[0-9]{3}" size="4" class="inputs" required></td>
				</tr>

				<tr>
					<td align="left">First Name:</td>
					<td align="center"><input type="text" pattern="[A-Za-z]+" name="empFname" size="20" class="inputs" required></td>
				</tr>
				<tr>
					<td align="left">Last Name:</td>
					<td align="center"><input type="text" pattern="^[A-Za-z ]+$" name="empSname" size="50" class="inputs" required></td>
				</tr>
				<tr>
					<td align="left">Password:</td>
					<td align="center"><input type="password" name="empPass" size="50" placeholder="Password" class="inputs" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Your Password Should contain minimum of 8 characters, the first character should should be uppercase & should include special characters as well" required></td>
				</tr>
				<tr>
					<td align="left">Email Address:</td>
					<td align="center"><input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="empEmail" size="50" class="inputs" required></td>
				</tr>
				<tr>
					<td align="left">Contact No:</td>
					<td align="center"><input type="tel" pattern="[0][1-9][0-9]{8}" name="empContact" size="20" class="inputs" required></td>
				</tr>
			</table>
			<br>
			<table style="color:white; font-size: 20px; width:81%;">
				<tr>
					<td align="right">
						<input type="submit" name="ADD" class="button" value="  ADD  ">
						<input type="reset" class="button" value="  RESET " name="reset">
					</td>
				</tr>
			</table>
		</form>
	</fieldset>


	<?php include("../../config/connection.php");
	if (isset($_POST['search'])) {
		$id = $_POST['id'];
		$query = "SELECT * FROM 'employee' where Employee_ID='$id' AND User_Role='Hotel Manager' ";
		$query_run = mysqli_query($connection, $query);
		if (mysqli_num_rows($query_run)) {
			while ($row = mysqli_fetch_array($query_run))
				if ($query_run) {
					echo "<script>
											alert('Hotel Manager Has been Deleted');
											window.location.href='AdminManageCoAdmins.php';
											</script>";
				} else {
					echo '<script> alert("Hotel Manager has been not deleted") </script>';
				} {
	?>
				<tr>
					<td><?php echo $row['First_name']; ?> </td>
					<td><?php echo $row['Last_name']; ?> </td>
					<td><?php echo $row['Email']; ?> </td>
					<td><?php echo $row['Password']; ?> </td>
					<td><?php echo $row['Contact_No']; ?> </td>
					<td><?php echo $row['User_Role']; ?> </td>
				</tr>
	<?php }
		} else {
			echo "Invalid Data";
		}
	} ?>
	</tr>

	

	<?php
	include("../../config/connection.php");
	if (isset($_POST['add'])) {
		$Employee_ID = $_POST['Employee_ID'];

		$query = "SELECT * FROM employee where Employee_ID='$Employee_ID' ";
		$query_run = mysqli_query($con, $query);


		while ($row = mysqli_fetch_array($query_run))
			if ($query_run) {
				echo '<script type="text/javascript">alert("Data Updated")</script>';
			} else {
				echo '<script type="text/javascript">alert("Data Updated")</script>';
			} {
	?>
			<tr>
				<td align="center"><?php echo $row['First_Name']; ?> </td>
				<td align="center"><?php echo $row['Last_Name']; ?> </td>
				<td align="center"><?php echo $row['Email']; ?> </td>
				<td align="center"><?php echo $row['Contact_No']; ?> </td>
			</tr>

	<?php
		}
	}
	?>
	</table>
	</div>
	</fieldset>
	<!--search-->
	</form>
	<form action="" method="POST">
		<fieldset style=" position:absolute; top:790px; left:750px; width: 45%; right:5%;">
			<legend style="color:white; font-size: 20px">Update and Delete Co-Admins</legend>
			<input type="text" name="Employee_ID" placeholder="Enter id to Search" /></td>
			<input type="submit" class="button" name="search" value="Search by ID"></td>
		</fieldset>
	</form>

	<?php
	include("../../config/connection.php");
	if (isset($_POST['search'])) {
		$Employee_ID = $_POST['Employee_ID'];

		$query = "SELECT * FROM employee where Employee_ID='$Employee_ID' AND User_Role='Hotel Manager' ";
		$query_run = mysqli_query($con, $query);
		if (mysqli_num_rows($query_run)) {
			while ($row = mysqli_fetch_array($query_run)) {
	?>
				<form action="" method="POST">
					<fieldset style=" position:absolute; top:950px;left:750px; width: 45%;">
						<table align="left" style="color:white; font-size: 20px; width:110%;">
							<tr>
								<td>Employee ID</td>
								<td><input type="int" name="Employee_ID" value="<?php echo $row['Employee_ID'] ?>" /></td>
							</tr>
							<tr>
								<td>First Name</td>
								<td><input type="text" name="First_Name" value="<?php echo $row['First_Name'] ?>" /></td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td><input type="float" name="Last_Name" value="<?php echo $row['Last_Name'] ?>" /></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><input type="text" name="Email" value="<?php echo $row['Email'] ?>" /></td>
							</tr>
							<tr>
								<td>Contact No</td>
								<td><input type="text" name="Contact_No" value="<?php echo $row['Contact_No'] ?>" /></td>
							</tr>
							<tr>
								<td align="center" style="width:50%;">
									<input type="submit" class="button" name="update" value="UPDATE">
									<input type="reset" class="button" value="  RESET " name="reset">
									<input type="submit" class="button" name="delete" value="DELETE">
								</td>

							</tr>
						</table>
					</fieldset>
				</form>


	<?php
			}
		} else {
			echo "<script>alert('Invalid Data Searched')</script>";
			echo "<script>		window.location.href='AdminManageCoAdmins.php';
			</script>";
		}
	}
	?>
	</table>

	<!--view-->
	<table align="right" style="color:white; font-size: 17px; width:40%; top:790px; left:25px; position:absolute; border: 1px solid white; margin-bottom:50px">
		<tr>
			<th colspan="6">
				<h4>Employee Details</h2>
			</th>
		</tr>
		<tr>
			<th>Employee ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email Address</th>
			<th>Contact No</th>
		</tr>

		<?php include("../../config/connection.php");

		$query = "SELECT * FROM employee WHERE User_Role='Hotel Manager' ";
		$query_run = mysqli_query($con, $query);
		while ($row = mysqli_fetch_array($query_run)) {

		?>
			<tr>
				<td><?php echo $row["Employee_ID"]; ?></td>
				<td><?php echo $row["First_Name"]; ?></td>
				<td><?php echo $row["Last_Name"]; ?></td>
				<td><?php echo $row["Email"]; ?></td>
				<td><?php echo $row["Contact_No"]; ?></td>
			</tr>
		<?php
		}
		?>

	</table>
<!--UPDATE-->
	<?php
	include("../../config/connection.php");
	if (isset($_POST['update'])) {
		$First_name = $_POST['First_Name'];
		$Last_Name = $_POST['Last_Name'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		$Contact_No = $_POST['Contact_No'];
		$query = "UPDATE employee SET First_Name='$First_name',Last_Name='$Last_Name',Email='$Email',Contact_No='$Contact_No' WHERE Employee_ID='$_POST[Employee_ID]' AND User_Role='Hotel Manager'";
		$query_run = mysqli_query($con, $query);
		if ($query_run) {
			echo '<script type="text/javascript">alert("Data Updated")</script>';
			echo '<script>window.location.href="AdminManageCoAdmins.php"</script>';
		} else {
			echo '<script type="text/javascript">alert("Data Not Updated")</script>';
			echo '<script>window.location.href="AdminManageCoAdmins.php"</script>';
		}
	}

	if (isset($_POST['delete'])) {
		$query = "DELETE FROM employee where Employee_ID='$_POST[Employee_ID]' AND User_Role='Hotel Manager'";
		$query_run = mysqli_query($con, $query);
		if ($query_run) {
			echo "<script>
                alert('Hotel Manager Has been Deleted');
                window.location.href='AdminManageCoAdmins.php';
                </script>";
				}
			 else 
			 {
			echo '<script> alert("Hotel Manager has been not deleted") </script>';
			}
		}
	?>

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
