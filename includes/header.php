<?php
	session_start();
	include("dbconnection.php");

	// Start the session
	$userRole = "";
	if (! empty($_SESSION)) {
		$userRole = $_SESSION["user_role"];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>University Magazine</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
    <meta name="author" content="">
	<!-- fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
	<!-- styles -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/global-styles.css">
</head>
<body>
<!-- Navigation -->
<header>
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container">
			<!-- Brand -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand"
					<?php
						if (!$userRole) {
							echo "href='/index.php'";
						}
					?>
				>
					<img src="../images/logo.png" alt="Branding" class="img-responsive" />
				</a>
			</div>
			<!-- links -->
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav">
					<?php
						if (! empty($_SESSION)) {
							if ($userRole == 1) {
								echo "<li>
										<a href='".$baseURL."/dashboards/admin_dash.php' data-link='dashboard'>Dashboard</a>
									</li>
									<li>
										<a href='".$baseURL."/dashboards/faculties.php' data-link='faculties'>Faculties</a>
									</li>
									<li>
										<a href='".$baseURL."/index.php?logout=1' data-link='logout'>Log out</a>
									</li>";
							}else{
								echo "<li>
										<a href='".$baseURL."/index.php?logout=1' data-link='logout'>Log out</a>
									</li>";
							}
						}else {
							echo "<li>
									<a href='".$baseURL."/register.php' data-link='register'>Register</a>
								</li>
								<li>
									<a href='".$baseURL."/dashboards/guest_dash.php' data-link='guest_dash'>Guest</a>
								</li>
								<li>
									<a href='".$baseURL."/index.php' data-link='login'>Login</a>
								</li>";
						}
					?>
				</ul>
			</div>
		</div>
	</nav>
</header>
