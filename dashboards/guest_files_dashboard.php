<?php 
	include("../includes/header.php");

    $opt = "";
    $filesHTML = "";
	if(isset($_GET['id'])){
		$facID = $_GET['id'];

		//Show file info
        $filesStmt = $conn->prepare ("SELECT id, fName,fPath, imgPath FROM files WHERE faculty = '$facID'");

        // retried faculty data
        $filesStmt->execute();
        $filesStmt->bind_result($fID,$fName,$fPath,$imgPath);
        while ( $filesStmt->fetch() ) {
            $filesHTML .= "<div class='file-wrapper clearfix'>
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
	}else{
		header("Location: ".$baseURL."/dashboards/guest_dash.php");
	}
?>

<!-- Container -->
<div class="content-container">
	<div class="container">
        <div class="title-holder">
            <h3 class="page-title">Selected Articles</h3>
        </div>
        <!-- new users -->
        <!-- user bio -->
        <div class="content-holder">
            <div id="update-form-holder" class="article-holder form-holder">
                <h4 class="sub-title">Article Details</h4>
                <?php 
                	if ($filesHTML) {
                		echo $filesHTML; 	
                	}else{
                		echo "No Articles";
                	}
                ?>
            </div>
        </div>
	</div>
</div>

<!-- include footer -->
<?php include("../includes/footer.php"); ?>
