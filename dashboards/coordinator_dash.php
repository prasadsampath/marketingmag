<?php

    include("../includes/header.php");

    $filesHTML= "";
    $opt= "";
    $userRole = $_SESSION["user_role"];
    $userFaculty = $_SESSION["user_faculty"];

    if($userRole == 3){
        //Show file info
        $filesStmt = $conn->prepare ("SELECT id, fName,fPath, imgPath FROM files WHERE faculty = ?");
        $filesStmt->bind_param("i", $userFaculty);

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
        $studentList = $conn->prepare ("SELECT id,uname FROM users WHERE faculty = '$userFaculty'");

        // retried faculty data
        $studentList->execute();
        $studentList->bind_result($id,$uname);
        while ( $studentList->fetch() ) {
            $opt .= "<option value='$id'>". $uname . "</option>";
        };
    }

?>

<!-- Container -->
<div class="content-container">
	<div class="container">
        <div class="title-holder">
            <h3 class="page-title">Submited Articles</h3>
        </div>
        <!-- new users -->
        <div class="sidebar-holder col-sm-3">
            <h4 class="sub-title">Navigation</h4>
            <div class="select-student">
            	<label for="student">Student:</label>
            	<select class="form-control" name="student" id="student">
                    <?php echo $opt; ?>
                </select>
            </div>
        </div>
        <!-- user bio -->
        <div class="content-holder col-sm-9">
            <div id="update-form-holder" class="article-holder form-holder">
                <h4 class="sub-title">Article Details</h4>
                <form action=""></form>
                <?php echo $filesHTML; ?>
            </div>
        </div>
	</div>
</div>

<!-- include footer -->
<?php include("../includes/footer.php"); ?>
