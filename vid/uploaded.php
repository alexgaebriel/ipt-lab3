<?php

$upload_directory = getcwd() . '/uploads/';

// Create uploads directory if it doesn't exist
if (!file_exists($upload_directory)) {
    mkdir($upload_directory, 0777, true);
}

function handle_file_upload($file, $upload_directory, $type) {
    $uploaded_file = $upload_directory . basename($file['name']);
    $temporary_file = $file['tmp_name'];

    if (move_uploaded_file($temporary_file, $uploaded_file)) {
        if ($type === 'text') {
            $content = file_get_contents($uploaded_file);
            echo "<h3>Uploaded Text File Content:</h3>";
            echo "<textarea cols='70' rows='30'>{$content}</textarea>";
        } elseif ($type === 'pdf') {
            echo "<h3>Uploaded PDF File:</h3>";
            echo "<embed src='{$uploaded_file}' type='application/pdf' width='600' height='400' />";
        } elseif ($type === 'audio') {
            echo "<h3>Uploaded Audio File:</h3>";
            echo "<audio controls><source src='{$uploaded_file}' type='audio/mpeg'>Your browser does not support the audio element.</audio>";
        } elseif ($type === 'video') {
            echo "<h3>Uploaded Video File:</h3>";
            echo "<video width='600' controls><source src='{$uploaded_file}' type='video/mp4'>Your browser does not support the video tag.</video>";
        }
    } else {
        echo "Failed to upload {$type} file.";
    }
}

// Handle Text File
if (!empty($_FILES['text_file']['name'])) {
    handle_file_upload($_FILES['text_file'], $upload_directory, 'text');
}

// Handle PDF File
if (!empty($_FILES['pdf_file']['name'])) {
    handle_file_upload($_FILES['pdf_file'], $upload_directory, 'pdf');
}

// Handle Audio File
if (!empty($_FILES['audio_file']['name'])) {
    handle_file_upload($_FILES['audio_file'], $upload_directory, 'audio');
}

// Handle Video File
if (!empty($_FILES['video_file']['name'])) {
    handle_file_upload($_FILES['video_file'], $upload_directory, 'video');
}

?>
