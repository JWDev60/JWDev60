<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the panel key entered by the user
    $panel_key_entered = $_POST['panel_key'];

    // Read panel keys from file
    $panel_keys = file("panel_keys.txt", FILE_IGNORE_NEW_LINES);

    // Check if the entered panel key matches any of the panel keys
    if (in_array($panel_key_entered, $panel_keys)) {
        // Generate a new authorization key
        $authorization_key = generateAuthorizationKey();

        // Append the new authorization key to the auth_keys.txt file
        file_put_contents("auth_keys.txt", $authorization_key . PHP_EOL, FILE_APPEND);

        // Display success message
        echo "Authorization key created successfully: $authorization_key";
    } else {
        // Display error message if panel key is incorrect
        echo "Invalid panel key. Authorization key creation failed.";
    }
} else {
    // Redirect back to the panel page if accessed directly
    header("Location: panel.html");
}

// Function to generate a random authorization key
function generateAuthorizationKey() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $authorization_key = '';
    $length = 16;

    for ($i = 0; $i < $length; $i++) {
        $authorization_key .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $authorization_key;
}
?>