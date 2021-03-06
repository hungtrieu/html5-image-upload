<?php
// include ImageManipulator class
require_once('ImageManipulator.php');
 
foreach ($_FILES as $file) {
    // array of valid extensions
    $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension = strrchr($file['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension, $validExtensions)) {
        $newNamePrefix = time() . '_';
        $manipulator = new ImageManipulator($file['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        // our dimensions will be 200x130
        $x1 = $centreX - 100; // 200 / 2
        $y1 = $centreY - 65; // 130 / 2
 
        $x2 = $centreX + 100; // 200 / 2
        $y2 = $centreY + 65; // 130 / 2
 
        // center cropping to 200x130
        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        // saving file to uploads folder
        $manipulator->save('uploads/' . $newNamePrefix . $file['name']);
        echo 'Done ...';
    } else {
        echo 'You must upload an image...';
    }
}