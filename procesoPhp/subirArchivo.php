<?php
// if (($_FILES["file"]["type"] == "image/pjpeg")
//     || ($_FILES["file"]["type"] == "image/jpeg")
//     || ($_FILES["file"]["type"] == "image/png")
//     || ($_FILES["file"]["type"] == "image/gif")) {
//     if (move_uploaded_file($_FILES["file"]["tmp_name"], "csv/".$_FILES['file']['name'])) {
//         //more code here...
//         echo "csv/".$_FILES['file']['name'];
//     } else {
//         echo 0;
//     }
// } else {
//     echo 0;
// }

    if ( isset($_FILES["file"])) { //if there was an error uploading the file 
        if ($_FILES["file"]["error"] > 0) { 
        // echo "Return Code: " . $_FILES["file"]["error"] . " "; 
        echo 1;
    } else { //Print file details 
        // echo "Upload: " . $_FILES["file"]["name"] . " "; 
        // echo "Type: " . $_FILES["file"]["type"] . "  "; 
        // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb "; 
        // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "  "; 
    //if file already exists 
    if (file_exists("../csv/" . $_FILES["file"]["name"])) { 
        // echo $_FILES["file"]["name"] . " already exists. "; 
        echo 2;
    } else { //Store file in directory "upload" with the name of "uploaded_file.txt" 
        $target_path = "../csv/";
        $target_path = $target_path . basename( $_FILES['file']['name']); 
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_path); 
        // echo "Guardado en: " . "../csv/" . $_FILES["file"]["name"] . "  ";
        echo 3; 
        } 
    } 
    } else { 
        // echo "No hay archivo"; 
        echo 0;
        } 