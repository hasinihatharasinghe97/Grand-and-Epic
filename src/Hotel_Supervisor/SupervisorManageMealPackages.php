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
		Hotel Supervisor Manage Meal Packages
	</title>
	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black">

	<center>
		<img src="../../public/images/Logo.png" width="20%">

		<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:0px;top:20px;" onclick="funcUserDetails()"></span>
		<!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
				<?php 
					echo "<br><p class=\"logged-in-msg\">You are Logged in as " . $_SESSION['First_Name']. " (Staff)</p>"; 
				?>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
	<div class="sidenav">
		<button class="dropdown-btn">Manage Meal Packages
			<i class="fa fa-caret-down"></i>
		</button>

		<div class="dropdown-container">
			<a href="SupervisorDashboard.php">Dashboard</a>
			<a href="SupervisorManageMeals.php">Manage Meals</a>
			<a href="SupervisorManageSetMenus.php">Manage Set Menu</a>
			<a href="SupervisorAssignEmployeeTasks.php">Assign Employee Tasks</a>
			<a href="SupervisorLeaveRequest.php">Request a Leave</a>
		</div>

	</div>
	
	<div class="top-right">
		<table width="100%">
			<tr>
				<td>
					<img src="../../public/images/ayomal.png" height="40%">
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

	<form action="Meals.php" method="POST" enctype="multipart/form-data">
	<fieldset style = " position:absolute; top:280px; width:90%; left:50px;">
        <legend style = "color:white; font-size: 20px">Add New Meal Package</legend>
        
				<table style = "color:white; font-size:20px; width:100%;">

					<tr>
						<td>Meal Package ID:</td>
						<td><input type="text" name="mealpackid" size="20" required></td>
					</tr>
					<tr>
                        <td>Meal Package Name: </td>
                        <td><input type="text" name="mealpackname" size="20"></td>
                    </tr>
                    <tr>
                        <td>Meal 01:</td>
						<td><input type="text" name="meal1" size="20" required></td>
						<td><input type="file" name="mealimage1" id="fileToUpload"></td>
					</tr>
					<tr>
                        <td>Meal 02:</td>
						<td><input type="text" name="meal2" size="20" required></td>
						<td><input type="file" name="mealimage2" id="fileToUpload"></td>
					</tr>
					<tr>
                        <td>Meal 03:</td>
						<td><input type="text" name="meal3" size="20" required></td>
						<td><input type="file" name="mealimage3" id="fileToUpload"></td>
					</tr>
					<tr>
                        <td>Meal 04:</td>
						<td><input type="text" name="meal4" size="20"></td>
						<td><input type="file" name="mealimage4" id="fileToUpload"></td>
					</tr>
					<tr>
                        <td>Meal 05:</td>
						<td><input type="text" name="meal5" size="20"></td>
						<td><input type="file" name="mealimage5" id="fileToUpload"></td>
                    </tr>
                    <tr>
                        <td>Price for the Meal Package:</td>
                        <td><input type="text" name="price" size="50" required></td>
                    </tr>
                </table>
            
                <table style = "color:white; font-size: 20px; width:86.5%;">
                    <tr>
                        <td align="right">
                            <input type="submit" class="button" name="insertmp" value="Add a New Meal Package">
							<input type="reset" class="button" value="Reset Package Details" name="reset">
                        </td>
                    </tr>
                </table>
            		
	</fieldset>
    </form>

	<form action="" method="POST">
		<fieldset style=" position:absolute; top:1300px; width:90%; left:50px;">
			<legend style="color:white; font-size: 20px">Update and Delete Meal Package</legend>
			<input type="text" name="MealPack_ID" placeholder="Enter id to Search" /><br>
			<input type="submit" class="button" name="search" value="Search by ID">
		</fieldset>
	</form>

	<!-- SEARCH -->
			<form action="" method="POST" enctype="multipart/form-data">
				<fieldset style=" position:absolute; top:1420px; width: 90%; left:50px; ">
					<table style="color:white; font-size: 20px; width:94%;">
						<tr>
							<td>Meal Package ID:</td>
							<td><input type="text" name="mealpackid" size="20" required></td>
						</tr>
						<tr>
							<td>Meal Package Name: </td>
							<td><input type="text" name="mealpackname" size="20"></td>
						</tr>
						<tr>
							<td>Meal 01:</td>
							<td><input type="text" name="meal1" size="20" required></td>
							<td><input type="file" name="mealimage1" id="fileToUpload"></td>
						</tr>
						<tr>
							<td>Meal 02:</td>
							<td><input type="text" name="meal2" size="20" required></td>
							<td><input type="file" name="mealimage2" id="fileToUpload"></td>
						</tr>
						<tr>
							<td>Meal 03:</td>
							<td><input type="text" name="meal3" size="20" required></td>
							<td><input type="file" name="mealimage3" id="fileToUpload"></td>
						</tr>
						<tr>
							<td>Meal 04:</td>
							<td><input type="text" name="meal4" size="20"></td>
							<td><input type="file" name="mealimage4" id="fileToUpload"></td>
						</tr>
						<tr>
							<td>Meal 05:</td>
							<td><input type="text" name="meal5" size="20"></td>
							<td><input type="file" name="mealimage5" id="fileToUpload"></td>
						</tr>
						<tr>
							<td>Price for the Meal Package:</td>
							<td><input type="text" name="price" size="50" required></td>
						</tr>
						<tr>
							<td></td>
							<td style="position:relative; left:450px">
								<input type="submit" class="button" name="update" value="Update Package">
								<input type="submit" class="button" name="delete" value="Delete Package">
								<input type="reset" class="button" name="reset" value="Reset Details"></a>
							</td>
						</tr>
					</table>
				</fieldset>
			</form>

	<!-- View Table-->
	<div>
	<table style="position:absolute; left:50px; top:900px; border: 1px solid white; color:white; width:92%">
		<tr>
			<th colspan="13"><h2>Meal Package Details</h2></th>
		</tr>
		<tr>
			<th>Package ID</th>
			<th>Package Name</th>
			<th>Meal 01</th>
			<th>Image 01</th>
			<th>Meal 02</th>
			<th>Image 02</th>
			<th>Meal 03</th>
			<th>Image 03</th>
			<th>Meal 04</th>
			<th>Image 04</th>
			<th>Meal 05</th>
			<th>Image 05</th>
			<th>Price</th>
		</tr>

			<?php
				include("../../config/connection.php");

					$query = "SELECT * FROM set_menu";
					$query_run = mysqli_query($con,$query);

					while($row = mysqli_fetch_array($query_run))
					{
			?>
						<tr>
							<td><?php echo $row['setmenu_id'] ?></td>
							<td><?php echo $row['meal_type'] ?></td>
							<td><?php echo $row['meal_1'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['mealimage_1']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['meal_2'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['mealimage_2']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['meal_3'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['mealimage_3']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['meal_4'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['mealimage_4']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['meal_5'] ?></td>
							<td><?php echo '<img src="data:image;base64, '.base64_encode($row['mealimage_5']).'" alt="Image" style="width: 100px; height: 60px" >' ?></td>
							<td><?php echo $row['price'] ?></td>						
						</tr>
				<?php
					}
				?>
	</table>
	</div>
			
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


<!-- Update -->
<?php include("../../config/connection.php");
if (isset($_POST['update'])) {
	$mealid = $_POST['mealid'];
	$mealname = $_POST['mealname'];
	$price = $_POST['price'];
	$mealplan = $_POST['mealplan'];
	$mealtype = $_POST['mealtype'];
	$mealimage = addslashes(file_get_contents($_FILES["mealimage"]["tmp_name"]));

	if($mealimage=="")
	{
		$query = "UPDATE meals SET Meals_ID='$mealid',Meals_Name='$mealname',Price='$price',Meal_Plan='$mealplan',Meal_Type='$mealtype' where Meals_ID='$_POST[mealid]'";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {
			echo "<script>
			alert('Food item Has been Updated');
			window.location.href='SupervisorManageMeals.php';
			</script>";
		} else {
			echo '<script> alert("Data Not Updated") </script>';
		}
	}
	else{
		$query = "UPDATE meals SET Meals_ID='$mealid',Meals_Name='$mealname',Price='$price',Meal_Plan='$mealplan',Meal_Type='$mealtype',Meal_Image='$mealimage' where Meals_ID='$_POST[mealid]'";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {
			echo "<script>
			alert('Food item Has been Updated');
			window.location.href='SupervisorManageMeals.php';
			</script>";
		} else {
			echo '<script> alert("Data Not Updated") </script>';
		}
	}
}



// Delete
if (isset($_POST['delete'])) {
	$mealname = $_POST['mealname'];
	$price = $_POST['price'];
	$mealplan = $_POST['mealplan'];
	$mealtype = $_POST['mealtype'];
	$mealimage = addslashes(file_get_contents($_FILES["mealimage"]["tmp_name"]));
	$delete_query = "DELETE from meals where Meals_ID='$_POST[mealid]'";
	$delete_run = mysqli_query($con, $delete_query);
	if ($delete_run) {
		echo "<script>
		alert('Food item Has been Deleted');
		window.location.href='SupervisorManageMeals.php';
		</script>";
	} else {
		echo '<script> alert("Data Not Deleted") </script>';
	}
}
