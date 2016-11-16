<?php
	include("../includes/header.php");

	$opt = "";

	//student list
    $facList = $conn->prepare ("SELECT id,faculty_name FROM faculty");

    // retried faculty data
    $facList->execute();
    $facList->bind_result($id,$facName);
    while ( $facList->fetch() ) {
        $opt .= "<option value='".$baseURL."/dashboards/guest_files_dashboard.php?id=".$id."'>". $facName . "</option>";
    };
 ?>
	<!-- Container -->
	<div class="content-container">
		<div class="container">
			<!-- register form holder -->
			<div class="form-holder col-sm-6">
				<h3 class="page-title">Select Faculty</h3>
				<form role="form" method="post">
	                <div class="form-group">
	                    <label for="faculty">Faculty *:</label>
	                    <select class="form-control" name="faculty" id="guestfaculty" onchange="changePath();">
	                    	<option value="">Please Select</option>
	                    	<?php echo $opt; ?>
	                    </select>
	                </div>
					<a href="" id="guestFileList" class="btn btn-primary pull-right">View Articles</a>
				</form>
			</div>
		</div>
	</div>
	<script>
		function changePath()
    {
        var path= document.getElementById("guestfaculty").value;
        console.log(path);
        $("#guestFileList").attr('href',path);
    }
	</script>
 <?php
	include("../includes/footer.php");
 ?>