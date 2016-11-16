<?php

    include("../includes/header.php");

    $opt = "";
    $filesHTML = "";
    $userRole = $_SESSION["user_role"];

    if ($userRole == 2) {
        //Show file info
        $filesStmt = $conn->prepare ("SELECT id, fName,fPath, imgPath FROM files");

        // retried faculty data
        $filesStmt->execute();
        $filesStmt->bind_result($fID,$fName,$fPath,$imgPath);
        while ( $filesStmt->fetch() ) {
            $filesHTML .= "<div class='file-wrapper clearfix'>
                                <div class='checkbox pull-left'>
                                    <input type='checkbox' value=".$fID.">
                                </div>
                                <div class='img-holder pull-left'>
                                    <img src='$imgPath' class='img-responsive'>
                                </div>
                                <div class='doc-holder pull-left'>
                                    <div class='doc-img'>
                                        <img src='../images/doc-thumb.png' class='img-responsive pull-left'>
                                    </div>
                                    <p><b>Fiel Name:</b> ".$fName."</p>
                                </div>
                            </div>";
        };

        //student list
        $facList = $conn->prepare ("SELECT id,faculty_name FROM faculty");

        // retried faculty data
        $facList->execute();
        $facList->bind_result($id,$facName);
        while ( $facList->fetch() ) {
            $opt .= "<option value='$id'>". $facName . "</option>";
        };
    }


?>

<!-- Container -->
<div class="content-container">
	<div class="container">
        <div class="title-holder">
            <h3 class="page-title">Selected Articles</h3>
        </div>
        <!-- new users -->
        <div class="sidebar-holder col-sm-3">
            <h4 class="sub-title">Navigation</h4>
            <div class="select-student">
            	<label for="student">Faculty:</label>
            	<select class="form-control" name="student" id="student">
                    <?php echo $opt; ?>
                </select>
            </div>
        </div>
        <!-- user bio -->
        <div class="content-holder col-sm-9">
            <div id="update-form-holder" class="article-holder form-holder">
                <h4 class="sub-title">Article Details</h4>
                <?php echo $filesHTML; ?>
            </div>
            <div class="btn-holder">
				<button type="submit" class="btn btn-primary pull-right">Download</button>
			</div>
        </div>
	</div>
</div>

<!-- include footer -->
<?php include("../includes/footer.php"); ?>
