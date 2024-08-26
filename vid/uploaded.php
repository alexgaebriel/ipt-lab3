<?php

$upload_directory = getcwd() . '/uploads/';

if (!file_exists($upload_directory)) {
    mkdir($upload_directory, 0777, true);
}

function handle_file_upload($file, $upload_directory) {
    $uploaded_file = $upload_directory . basename($file['name']);
    $temporary_file = $file['tmp_name'];

    if (move_uploaded_file($temporary_file, $uploaded_file)) {
        return $uploaded_file;
    } else {
        echo "Failed to upload " . htmlspecialchars($file['name']) . "<br>";
        return null;
    }
}

$uploaded_files = [];

// Handle Text File
if (!empty($_FILES['text_file']['name'])) {
    $uploaded_files['text'] = handle_file_upload($_FILES['text_file'], $upload_directory);
}

// Handle PDF File
if (!empty($_FILES['pdf_file']['name'])) {
    $uploaded_files['pdf'] = handle_file_upload($_FILES['pdf_file'], $upload_directory);
}

// Handle Audio File
if (!empty($_FILES['audio_file']['name'])) {
    $uploaded_files['audio'] = handle_file_upload($_FILES['audio_file'], $upload_directory);
}

// Handle Video File
if (!empty($_FILES['video_file']['name'])) {
    $uploaded_files['video'] = handle_file_upload($_FILES['video_file'], $upload_directory);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uploaded Files</title>
</head>
<body>
    <h2>Uploaded Files</h2>

    <?php if (!empty($uploaded_files['text'])): ?>
        <h3>Uploaded Text File Content:</h3>
        <?php $content = file_get_contents($uploaded_files['text']); ?>
        <textarea cols="70" rows="30"><?php echo htmlspecialchars($content); ?></textarea>
    <?php endif; ?>

    <?php if (!empty($uploaded_files['pdf'])): ?>
        <h3>Uploaded PDF File:</h3>
        <embed src="<?php echo htmlspecialchars($uploaded_files['pdf']); ?>" type="application/pdf" width="600" height="400" />
    <?php endif; ?>

    <?php if (!empty($uploaded_files['audio'])): ?>
        <h3>Uploaded Audio File:</h3>
        <audio controls>
            <source src="<?php echo htmlspecialchars($uploaded_files['audio']); ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    <?php endif; ?>

    <?php if (!empty($uploaded_files['video'])): ?>
        <h3>Uploaded Video File:</h3>
        <video width="600" controls>
            <source src="<?php echo htmlspecialchars($uploaded_files['video']); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php endif; ?>
</body>
</html>
