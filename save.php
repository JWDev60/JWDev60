<?php
$auth_keys = file("auth_keys.txt", FILE_IGNORE_NEW_LINES);
$authorization_key = $_POST['authorization_key'];
$title = $_POST['title'];
$body = $_POST['body'];

if (in_array($authorization_key, $auth_keys)) {
    $filename = "stored_files/" . uniqid() . ".txt";
    $file_content = "Title: $title\n$body";
    file_put_contents($filename, $file_content);
    echo "File saved successfully.";
} else {
    echo "Invalid authorization key.";
}
?>