<?php
$id = $_POST["id"];
$num = $_POST["num"];
$ct = $_POST["city"];
$f = $_POST["fname"];
$l = $_POST["lname"];
$s = $_POST["sp"];
$a = $_POST["address"];
$e = $_POST["email"];
$sps = $_POST["services"];
$ps = $_POST["password"];

    $image = $_FILES["image"]["tmp_name"];

    $c = mysqli_connect("localhost", "root", "", "extern");

    $imgData = file_get_contents($image);
    $encodedImage = base64_encode($imgData);

    $q = "INSERT INTO img (id, num, city, fname, lname, specialized, address, email, services, password, img) VALUES ('$id', '$num', '$ct', '$f', '$l', '$s', '$a', '$e', '$sps', '$ps', '$encodedImage')";

    if (mysqli_query($c, $q)) {
        echo "<script>alert('Registration successful.');</script>";
    } else {
        die("Error: " . mysqli_error($c));
    }

    mysqli_close($c);

?>
