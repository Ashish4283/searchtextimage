<?php
if (isset($_GET['url'])) {
    $url = urldecode($_GET['url']);
    $image = file_get_contents($url);
    header('Content-Type: image/jpeg'); // Change the content type based on the image format.
    echo $image;
} else {
    header('HTTP/1.1 400 Bad Request');
    echo 'Invalid request.';
}
?>
