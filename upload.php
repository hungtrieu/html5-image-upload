<?php

$error = false;
$files_to_upload = $_FILES['filesToUpload'];
foreach( $files_to_upload['error'] as $error_message) {
    if( $error ) {
        echo "Error: " . $error_message . "<br />";
        $error = true;
    }
}

if ( !$error ) {
    for( $i = 0; $i < count( $files_to_upload['name'] ); $i++ ) {
        // array of valid extensions
        $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
        // get extension of the uploaded file
        $fileExtension = strrchr($_FILES['filesToUpload']['name'][$i], ".");
        // check if file Extension is on the list of allowed ones
        if (in_array($fileExtension, $validExtensions)) {
            // we are renaming the file so we can upload files with the same name
            // we simply put current timestamp in fron of the file name
            $newName = time() . '_' . $_FILES['filesToUpload']['name'][$i];
            $destination = 'uploads/' . $newName;
            if (move_uploaded_file($_FILES['filesToUpload']['tmp_name'][$i], $destination)) {
                echo 'File ' .$newName. ' succesfully copied. <br />';
            }
        } else {
            echo 'You must upload an image...';
        }
    }
}