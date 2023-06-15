<?php
$c = mysqli_connect("localhost", "root", "", "extern");

$id = $_POST['id'];

$q = "SELECT img FROM img WHERE id = '$id'";

$result = mysqli_query($c, $q);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $imageData = $row['img'];

        // Display the image
        header("Content-Type: image/jpeg");
        echo base64_decode($imageData);
    } else {
        echo "No image found.";
    }
} else {
    echo "Error retrieving image: " . mysqli_error($c);
}

mysqli_close($c);
?>