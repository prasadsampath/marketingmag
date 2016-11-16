<?php
    include("includes/header.php");

    if ( ! empty( $_POST ) ) {
        $valid = true;

        if($_POST["name"]){
            $fName = mysql_escape_string($_POST["name"]);
        }else{
            $valid = false;
        }

        if($_POST["faculty"]){
            $faculty = mysql_escape_string($_POST["faculty"]);
        }else{
            $valid = false;
        }

        if($_POST["password"]){
            $pass  = md5($_POST["password"]);
        }else{
            $valid = false;
        }

        if($_POST["email"]){
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $valid = false;
            }else{
                $email = mysql_escape_string($email);
            }
        }else{
            $valid = false;
        }


        if(!$valid){
            header("Location: ".$baseURL."/register.php?valid=invalid");
            exit();
        }else{
            $stmtCheckEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
    		$stmtCheckEmail->bind_param("s", $email);

    		$stmtCheckEmail->execute();
    		$stmtCheckEmail->store_result();
            $countRows = $stmtCheckEmail->num_rows;
    		$countRows = false;

    		$stmtCheckEmail->close();

    		if ($countRows) {
                header("Location: ".$baseURL."/register.php?email=available");
                exit();
            }else{
                // prepare and bind
                $stmt = $conn->prepare("INSERT INTO users (uname, password, email, faculty, isLoggedIn, user_role) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssiii", $fName, $pass, $email, $faculty, $isLoggedIn, $userRole);

                $isLoggedIn = 0;
                $userRole = 4;

                $stmt->execute();
                $stmt->close();
            }
        }

	}
?>

<!-- Container -->
<div class="content-container">
	<div class="container">
        <!-- Account Created -->
        <div class="activate-account-msg">
            <h2>Thank you for creating an account with us.</h2>
            <h3>You are registerd as a student in our system, If you need to chagne the user role please contact the system admin.</h3>
            <div class="btn-holder">
            	<a class="btn btn-primary btn-lg" <?php echo "href='".$baseURL."/index.php'"?>>Login</a>
            </div>
        </div>
	</div>
</div>

<!-- include footer -->
<?php include("includes/footer.php"); ?>
