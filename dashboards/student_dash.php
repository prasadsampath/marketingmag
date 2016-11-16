<?php

    include("../includes/header.php");

    $filesHTML = "";
    $target_dir = "../uploads/";
    $userID = $_SESSION["user_ID"];
    $userFaculty = $_SESSION["user_faculty"];
    //Show file info
    $filesStmt = $conn->prepare ("SELECT fName,fPath, imgPath FROM files WHERE uid = ?");
    $filesStmt->bind_param("i", $userID);

    // retried faculty data
    $filesStmt->execute();
    $filesStmt->bind_result($fName,$fPath,$imgPath);
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
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $imgName = basename($_FILES["imgUpload"]["name"]);
        $fileName = basename($_FILES["fileUpload"]["name"]);
        $target_img_file = $target_dir . "user-" . $userID . "-fac-" . $userFaculty . "-" . $imgName;
        $target_file = $target_dir . "user-" . $userID . "-fac-" . $userFaculty . "-" . $fileName;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_img_file,PATHINFO_EXTENSION);
        $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file) || file_exists($target_img_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["imgUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large. Only Image size less than 500KB allowed.";
            $uploadOk = 0;
        }

        if ($_FILES["fileUpload"]["size"] > 10000000) {
            echo "Sorry, your file is too large. Only file size less than 10MB are allowed.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
        if($fileType != "doc" && $fileType != "docx" ) {
            echo "Sorry, only doc & docx files are allowed.";
            $uploadOk = 0;
        }
        //add info to uploads table
        $uploadRecordStmt = $conn->prepare("INSERT INTO uploads (uid, faculty) VALUES (?, ?)");
        $uploadRecordStmt->bind_param("ii", $userID, $userFaculty);

        //add info to files table
        $fileUploadStmt = $conn->prepare("INSERT INTO files (fName, uid, fPath, imgPath, faculty) VALUES (?, ?, ?, ?, ?)");
        $fileUploadStmt->bind_param("sissi", $fileName, $userID, $target_file, $target_img_file, $userFaculty);
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            $fileUploadStmt->execute();
            $uploadRecordStmt->execute();
            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            }else {
                echo "Sorry, there was an error uploading your file.";
            }

            if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_img_file)) {
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $fileUploadStmt->close();
            $uploadRecordStmt->close();
            header("Refresh:0");
        }
    }

?>

<!-- Container -->
<div class="content-container">
	<div class="container">
        <div class="title-holder">
            <h3 class="page-title">Upload your Articles</h3>
        </div>
        <!-- new users -->
        <div class="sidebar-holder col-sm-3">
            <h4 class="sub-title">Navigation</h4>
            <div class="mobile-dropdown">
                <span class="show-more">Show Faculty list <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></span>
                <span class="show-less">Hide Faculty list <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></span>
            </div>
            <div id="side-block" class="user-list-holder">
                <div class="user-block active" id="uploaded">
                    <a href="#">
                        <p>Uploaded Articles</p>
                    </a>
                </div>
                <div class="user-block" id="upload">
                    <a href="#">
                        <p>Upload Article</p>
                    </a>
                </div>
            </div>
        </div>
        <!-- user bio -->
        <div class="content-holder col-sm-9">
            <div id="update-form-holder" class="form-holder">
                <div id="article-holder" class="article-holder clearfix">
                    <h4 class="sub-title">Uploaded Article Details</h4>
                    <?php echo $filesHTML; ?>
                </div>
                <div id="article-upload" class="article-upload">
                    <h4 class="sub-title">Upload Article</h4>
                    <form role="form" method="post" class="user-list-form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fileUpload">Document *:</label>
                            <input type="file" class="form-control" name="fileUpload" id="fileUpload" accept="application/msword,
                                application/vnd.openxmlformats-officedocument.wordprocessingml.document" >                        
                        </div>
                        <div class="form-group">
                            <label for="imgUpload">Image *:</label>
                            <input type="file" class="form-control" name="imgUpload" id="imgUpload" accept="image/*" required>                        
                        </div>
                        <div class="btn-holder">
                            <button type="submit" class="btn btn-primary pull-right" name="submit">Upload</button>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
	</div>
</div>

<!-- include footer -->
<?php include("../includes/footer.php"); ?>
