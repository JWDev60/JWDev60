<?php
$files = glob("stored_files/*.txt");
foreach ($files as $file) {
    $content = file_get_contents($file);
    echo "<h2>" . basename($file, ".txt") . "</h2>";
    echo nl2br($content);
    echo "<hr>";
}
?>