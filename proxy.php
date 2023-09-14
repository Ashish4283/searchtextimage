<?php
// Get the URL of the image from the 'url' parameter
$imageUrl = $_GET['url'];

// Check if the URL is valid (you may want to add more robust validation)
if (filter_var($imageUrl, FILTER_VALIDATE_URL)) {
    // Fetch the image data
    $imageData = file_get_contents($imageUrl);

    // Check if the image data was successfully fetched
    if ($imageData !== false) {
        // Set the appropriate Content-Type header for the image
        header('Content-Type: ' . mime_content_type($imageUrl));
        
        // Echo the image data
        echo $imageData;
    } else {
        // Handle the case where image data couldn't be fetched
        header('HTTP/1.1 500 Internal Server Error');
        echo 'Error fetching image data.';
    }
} else {
    // Handle invalid URL
    header('HTTP/1.1 400 Bad Request');
    echo 'Invalid image URL.';
}
?>
