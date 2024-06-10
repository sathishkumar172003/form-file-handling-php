<?php 

    header('Content-Type: application/json');



    if(!$_SERVER['REQUEST_METHOD'] == 'POST') {
        echo json_encode(['status'  => 'error', 'message' => 'Method ot allowed']);
        die;
    }


    $user_email = filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL) ? $_POST['user_email'] : null;

    $userResumeFile = $_FILES['user_resume'];

    
    $fileSize = $userResumeFile['size'];
    $fileType = $userResumeFile['type'];
    $fileError = $userResumeFile['error'];

    if(!$fileError == 0 || $fileType != 'application/pdf') {
        echo json_encode(['status' => 'error', 'message' => 'file invalid']);
        die;
    }


    $tempFileLocation = $userResumeFile['name'];

    $actualFileName = explode('.', $userResumeFile['name'])[0];
    $actualFileExt =  strtolower(explode('.', $userResumeFile['name'])[1]);

    $fileNewName = $actualFileName ."-". uniqid('', false) . '.' . $actualFileExt;

    $fileDestination = './uploads/' . $fileNewName;
    move_uploaded_file($userResumeFile['tmp_name'], $fileDestination);


    
    
    echo json_encode(['status' => 'success','actualName' => $actualFileName, 'extension' => $actualFileExt, 'new name' => $fileNewName, 'temp name' => $userResumeFile['tmp_name']]);




    








?>