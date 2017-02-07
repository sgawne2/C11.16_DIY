<?php
$name = time() . "_" . $_POST['proj_name'];
$uploads_dir = 'photos';
$file = $_FILES['file'];
$extension = '';

$uploadOk = true;
$upload_output = [];

$maxMB = 2;
$maxBits = $maxMB * 8388608;

$main_photo = "images/default.jpg";

if ( file_exists($uploads_dir) ) {
    switch($file['type']) {
        case 'image/jpeg':
            $extension = 'jpeg';
            break;
        case 'image/png':
            $extension = 'png';
            break;
        case 'image/gif':
            $extension = 'gif';
            break;
        default:
            $uploadOk = false;
            $upload_output['errors'][] = 'Invalid file type';
    }

    if ($file['size'] > $maxBits) {
        $uploadOk = false;
        $upload_output['errors'][] = 'The file is too large';
    }
} else {
    $uploadOk = false;
    $upload_output['errors'][] = 'Directory not found';
}

if ($uploadOk) {
    $moved = move_uploaded_file( $file['tmp_name'], "$uploads_dir/$name.$extension");

    if(!$moved) {
        $upload_output['errors'][] = 'Upload failure';
    } else {
        $upload_output['success'] = true;
        $upload_output['filepath'] = stripslashes("$uploads_dir/$name.$extension");
        $upload_output['message'] = "The file ". $name . " has been uploaded.";
        $main_photo = addslashes("db/photos/$name.$extension");
    }
}

//echo json_encode($upload_output);
?>