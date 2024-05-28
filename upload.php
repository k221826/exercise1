<?php
//Include the database config file
include 'dbConfig.php';
$statusMsg ='';

//File upload path
$targetDir = "uploads/";

if(isset($_POST["submit"])){
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $filetType = pathinfo($targeFilePath,PATHINFO_EXTENSION);

    //Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        //Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            //Insert image file name into the database
            $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
                if($insert){
                    $statusMsg = "The file " .$fileName. " has been uploaded successfully.";
                    } else {
                        $statusMsg = "File upload failed, please try again.";
                    }
                }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
                }
        }else{
            $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF and PDF files are allowed to upload.";
        }
        }else{
            $statusMsg = "Please select a file to upload.";
    }
?>