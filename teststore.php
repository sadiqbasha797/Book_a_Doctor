<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <input type="number" name="id">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $image = $_FILES["image"]["tmp_name"];
    $id = $_POST["id"];

    $c = mysqli_connect("localhost", "root", "", "extern");

    $imgData = file_get_contents($image);
    $encodedImage = base64_encode($imgData);

    $q = "INSERT INTO img (img, id) VALUES ('$encodedImage', '$id')";

    if (mysqli_query($c, $q)) {
        echo "<script>alert('Registration successful.');</script>";
    } else {
        die("Error: " . mysqli_error($c));
    }

    mysqli_close($c);
}
?>
