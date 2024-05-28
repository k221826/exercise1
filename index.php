<?php
include 'upload.php'
?>
<html>
    <head>
        <title>Picture Upload</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="top-part">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Select Image File to Upload:</h3>
            <div class="msg">
                <?php
                if(!empty($statusMsg)){ ?>
                    <p class="status-msg"><?php echo $statusMsg; ?></p>
                <?php }
                ?>
            </div>
            <input type="file" name="file" id="file-input">
            <label for="file-input"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" 
                fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
  <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
  <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 
  0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
</svg> Choose file</label>

                <span>
                    <strong>Choose file:</strong>
                    <span id="file-name">None</span>
                </span>
                <script>
                    let inputFile = document.getElementById('file-input');
                    let fileNameField = document.getElementById('file-name');
                    inputFile.addEventListener('change', function(event){
                        let uploadedFileName = event.target.files[0].name;
                        fileNameField.textContent = uploadedFileName;
                    })
                </script>


            <input type="submit" name="submit" value="Upload" id="submit">
            <label for="submit" title="Upload"><svg xmlns="http://www.w3.org/2000/svg" width="16" 
                height="16" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 
  0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
</svg> Upload</label>
        </form>
        </div>
        <div class="gallery">
            <?php
                //Include the database configuration file
                include 'dbConfig.php';
                //Get images from the database
                $query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = 'uploads/'.$row["file_name"];
                        ?>
                           <img class="images" src="<?php echo $imageURL; ?>" alt="" />
                <?php    }
                }else{ ?>
                <p>No image(s) found...</p>
               <?php } ?>
        </div>
    </body>
</html>