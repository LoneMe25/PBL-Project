<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Inventory Management System</title>
	<link rel ="stylesheet" type="text/css" href="dashboard.css">
	<script src = "https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>
	<div id="dashboardMainContainer">
		<div class="dashboard_sidebar" id="dashboard_sidebar">
		<img src="Erovoutika.png">	
        <h1>Welcome <?php echo $fetch_info['name'] ?></h1>
			<div class ="dashboard_sidebar_menus">
				<ul class="dashboard_menu_lists">
					<li class="menuActive">
						<a href=""><i class ="fa fa-dashboard"></i>  Dashboard</a>
					</li>
					<li>
						<a href=""><i class ="fa fa-file"></i>  Reports</a>
					</li>
					<li>
						<a href=""><i class ="fa fa-tag"></i>  Product</a>
					</li>
					<li>
						<a href=""><i class ="fa fa-truck"></i>  Supplier</a>
					</li>
					<li>
						<a href=""><i class ="fa fa cart-shopping"></i>  Purchase Order</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="dashboard_content_container">
			<div class ="dashboard_topNav">
				<a href="" id="toggleBtn"><i class="fa fa-navicon"></i></a>
				<a href="logout-user.php" id="logoutBtn"><i class="fa fa-power-off">Log-out</i></a>
			</div>
			<div class="dashboard_content">
				<div class="dashboard_content_main">
				</div>
			</div>
		</div>
	</div>

<script>
	toggleBtn.addEventListener( 'click', (event) => {
		event.preventDefault();
		dashboard_sidebar.style.width= '10%';
		dashboardMainContainer.style.width = '90%';
	});
</script>
</body>
</html>