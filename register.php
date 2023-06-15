<?php
$id=$_POST["id"];
$num=$_POST["num"];
$ct=$_POST["city"];
$f=$_POST["fname"];
$l=$_POST["lname"];
$s=$_POST["sp"];
$a=$_POST["address"];
$e=$_POST["email"];
$sps = $_POST["sps"];
$ps = $_POST["password"];
$c=mysqli_connect("localhost","root","","extern");
$q="insert into doctors(id,num,city,fname,lname,specialized,address,email,sps,password)values('$id','$num','$ct','$f','$l','$s','$a','$e','$sps','$ps')";
if(mysqli_query($c,$q))
echo "<script>alert('Registration successful.........');</script>";
else
die ("errror");
?>