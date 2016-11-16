<?php
	include("includes/header.php");

	$invalidEmail = false;
    $invalidAccount = false;

    if (isset($_GET["logout"])) {
        if (! empty($_SESSION)) {
            //logout user
            $logoutUser = $conn->prepare ("UPDATE users SET isLoggedIn = 0, token = '' WHERE user_role = ? AND token = ?");
            $logoutUser->bind_param("ss", $userRole, $token);

            $userRole = $_SESSION["user_role"];
            $token = $_SESSION["token"];

            $logoutUser->execute();

            $logoutUser->store_result();
            $countRows = $logoutUser->num_rows;

            $logoutUser->close();

            session_unset();
            session_destroy();
            header("Location: ".$baseURL."/index.php");
        }
    }

    if (! empty($_SESSION)) {
        if ($userRole == 1) {
    		header("Location: ".$baseURL."/dashboards/admin_dash.php");
    	}else if($userRole == 2) {
    		header("Location: ".$baseURL."/dashboards/manager_dash.php");
    	}else if($userRole == 3) {
    		header("Location: ".$baseURL."/dashboards/coordinator_dash.php");
    	}else{
    		header("Location: ".$baseURL."/dashboards/student_dash.php");
    	}
    }

    if (isset($_GET["invalid"])) {
        $invalidAccount = true;
    }

    if (isset($_GET["email"])) {
        $invalidEmail = true;
    }

    if (! empty( $_POST )) {
		$valid = true;
		$name = $_POST["uName"];
		
        if($_POST["password"]){
            $pass  = md5($_POST["password"]);
        }else{
            $valid = false;
        }

        // if($_POST["uName"]){
        //     $name = $_POST["uName"];
        //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //         $valid = false;
        //     }else{
        //         $email = mysql_escape_string($email);
        //     }
        // }else{
        //     $valid = false;
        // }

        if(!$valid){
            header("Location: ".$baseURL."/index.php?invalid=invalid");
        }else{
            $sql = "SELECT id, faculty, user_role FROM users WHERE uname = '$name' AND password = '$pass'";
            $result = $conn->query($sql);
            echo "string1";

            print_r($result);

            if ($result->num_rows > 0) {
                echo "string2";
                $userLoggedinStmt = $conn->prepare ("UPDATE users SET isLoggedIn = 1, token = ? WHERE uname = ? AND password = ?");
        		$userLoggedinStmt->bind_param("sss", $token, $name, $pass);

                $token = bin2hex(openssl_random_pseudo_bytes(16));
        		$userLoggedinStmt->execute();
                $userLoggedinStmt->close();

                while($row = $result->fetch_assoc()) {
                    // Set session variables
                    $userRole = $row["user_role"];
                    $userID = $row["id"];
                    $userFaculty = $row["faculty"];

                    $_SESSION["user_role"] = $userRole;
                    $_SESSION["user_ID"] = $userID;
                    $_SESSION["user_faculty"] = $userFaculty;
                    $_SESSION["token"] = $token;

                    if ($userRole == 1) {
			    		header("Location: ".$baseURL."/dashboards/admin_dash.php");
			    	}else if($userRole == 2) {
			    		header("Location: ".$baseURL."/dashboards/manager_dash.php");
			    	}else if($userRole == 3) {
			    		header("Location: ".$baseURL."/dashboards/coordinator_dash.php");
			    	}else{
			    		header("Location: ".$baseURL."/dashboards/student_dash.php");
			    	}
                }
            }else{
                header("Location: ".$baseURL."/index.php?email=invalid");
            }
        }

    }
 ?>
	<!-- Container -->
	<div class="content-container">
		<div class="container">
			<!-- register form holder -->
			<div class="form-holder col-sm-6">
				<h3 class="page-title">Login Form</h3>
				<form role="form" method="post">
	                <div class="form-group">
						<label for="uName">User Name*:</label>
						<input type="text" class="form-control" name="uName" id="uName">
					</div>
					<div class="form-group">
						<label for="pwd">Password*:</label>
						<input type="password" class="form-control" name="password" id="pwd">
					</div>
					<button type="submit" class="btn btn-primary pull-right">Submit</button>
				</form>
			</div>
		</div>
	</div>
 <?php
	include("includes/footer.php");
 ?>
