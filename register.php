<?php
	include("includes/header.php");

	$opt = "";
	$invalid = false;
	$emailExist = false;

	if(isset($_GET['valid'])){
		$invalid = true;
	}

	if(isset($_GET['email'])){
		$emailExist = true;
	}

	// Get facult data
    $facultyQuery = $conn->prepare ("SELECT id,faculty_name FROM faculty");

    // retried faculty data
    $facultyQuery->execute();
    $facultyQuery->bind_result($id,$facultyName);
    while ( $facultyQuery->fetch() ) {
		$opt .= "<option value='$id'>". $facultyName . "</option>";
    };

 ?>
	<!-- Container -->
	<div class="content-container">
		<div class="container">
			<!-- register form holder -->
			<div class="form-holder validate-form col-sm-6">
				<h3 class="page-title">Register Form</h3>
				<?php
					if($invalid){
						echo "<p class='validate-error'>Please Fill the manditory fields to create an account.</p>";
					}else if($emailExist){
						echo "<p class='validate-error'>Email already in use. Try Again.</p>";
					}
				 ?>
				<form role="form" action="account-active.php" method="post"
					<?php
						if ($invalid) {
							echo "class='invalid'";
						}else if ($emailExist) {
							echo "class='email-exist'";
						}
					?>
				>
					<div class="form-group">
						<label for="name">Name *:</label>
						<input type="text" class="form-control" name="name" id="name" required>
					</div>
	                <div class="form-group">
	                    <label for="faculty">Faculty *:</label>
	                    <select class="form-control" name="faculty" id="faculty">
		                    <?php
								echo $opt;
							?>
	                    </select>
	                </div>
	                <div class="form-group">
	                    <label for="email">Email address *:</label>
	                    <input type="email" class="form-control email" name="email" id="email" required>
	                </div>
					<div class="form-group">
						<label for="pwd">Password *:</label>
						<input type="password" class="form-control" name="password" id="pwd" required>
					</div>
					<div class="btn-holder">
						<span class="manditory-note">Fields marked * are manditory</span>
						<button type="submit" class="btn btn-primary pull-right">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

 <?php
	include("includes/footer.php");
 ?>
