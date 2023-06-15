<?php
$id=$_POST["id"];
$num=$_POST["num"];
$ct=$_POST["city"];
$f=$_POST["fname"];
$l=$_POST["lname"];
$p=$_POST["problem"];
$e=$_POST["email"];
$c=mysqli_connect("localhost","root","","extern");
$q="insert into bookings(id,num,city,fname,lname,email,problem)values('$id','$num','$ct','$f','$l','$e','$p')";
if(mysqli_query($c,$q))
echo "<script>alert('Registration successful.........');</script>";
else
die ("errror");
?>