﻿<!DOCTYPE html>
<html>
<head>
<title>BeerPong | 세상의 모든 맥주</title>
<link rel="stylesheet" href="beerpong.css" type="text/css"/>
<link href="http://fonts.googleapis.com/earlyaccess/notosanskr.css" rel="stylesheet">
</head>

<body>
<?php
$id=$_POST['my_id'];
$pw=$_POST['my_password'];
$pwc=$_POST['my_password2'];
$name=$_POST['my_name'];
$email=$_POST['my_mail'];

if($pw!=$pwc){
	echo "<script> alert('비밀번호와 비밀번호 확인이 서로 다릅니다.');</script>";
	echo "<script> location.href='join.html' </script>";
	exit();
}
if($id==NULL|| $pw==NULL|| $name==NULL|| $email==NULL){
	echo "<script> alert('빈칸을 모두 채워주세요.');</script>";
	echo "<script> location.href='join.html' </script>";
	exit();
}

$mysqli=mysqli_connect("localhost", "root","1234", "beerpong");

$check ="SELECT * FROM customer WHERE Customer_ID='$id'";
$result=$mysqli->query($check);
$num=mysqli_num_rows($result);
if($num==1){
	echo "<script> alert('중복된 id입니다.');</script>";
	echo "<script> location.href='join.html' </script>";
	exit();
}
$password=md5($pw);
$query="INSERT INTO customer (Customer_ID, Customer_PW, Customer_Name, Customer_Email) VALUES('".$id."', '".$password."', '".$name."', '".$email."')";
$signup=mysqli_query($mysqli, $query);
if($signup){
	echo "<script> alert('회원가입 완료');</script>";
	echo "<script> location.href='home.php' </script>";
}
?>
</body>
</html>