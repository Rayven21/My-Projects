<?php

if (isset($_POST['submit'])) {

    $newFileName = $_POST['filename'];
    if (empty($newFileName)) {
        $newFileName = "gallery";
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }

    
    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTempName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    define('KB', 1024);
    define('MB', 1048576);
    $allowed = array("jpg", "jpeg", "bmp", "png", "svg", "ai");

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 7*MB) {
                $imageFullName = $newFileName . "." . uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../uploads/' . $imageFullName;
              
                include_once 'db-connection-include.php';
            
                //Checking mysql credentials
                $conn = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name");
      
                if (empty($imageTitle) || empty($imageDesc)) {
                    //move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: ../Gallery.php?upload=empty");
                    exit();
                } else {
                    $sql = "SELECT * FROM gallery;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed!";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount+1;

                        $sql = "INSERT INTO gallery (titleGallery, descriptionGallery, imageFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement failed!";
                        } else {
                            mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTempName, $fileDestination);
                            header("Location: ../gallery.php?=uploadsuccess");
                        }
                    }
                }
            }   else {  
                echo "<script>
                  alert(\"File is too big!\");
                  window.location.assign(\"../upload.php\");
                  </script>";
            } exit();
        }
    } else {
        echo "<script>
                  alert(\"Image file extension is not supported\");
                  window.location.assign(\"../upload.php\");
                  </script>";
        } exit();
}
