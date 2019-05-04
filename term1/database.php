<?php


$servername="localhost";
$username ="root";
$password ="";
$conn =new mysqli($servername, $username, $password);

if($conn->connect_error){die("Connection failed: ". $conn->connect_error);}
$sql="CREATE DATABASE proj";
if($conn->query($sql) === TRUE) {echo"Database created successfully"."<br>";}
else{echo"Error creating database: ". $conn->error;}
$conn->close();

$conn=new mysqli($servername, $username, $password,'proj');
$sql="CREATE TABLE user(
uid varchar(48) not null unique,
pwd varchar(12) not null,
email varchar(48) not null,
phone_num varchar(12) not null,
date date,
primary key(uid));";
if($conn->query($sql) === TRUE) 
	{echo"Table user created successfully"."<br>";}
else{echo"Error creating table: ". $conn->error;}


$sql="CREATE TABLE board(
num int not null auto_increment,
uid varchar(48) not null,
title varchar(12) not null,
content varchar(48) not null,
date date,
primary key(num),
constraint FK_uid foreign key(uid) references user(uid));";
if($conn->query($sql) === TRUE) 
	{echo"Table board created successfully"."<br>";}
else{echo"Error creating table: ". $conn->error;}

$sql="CREATE TABLE user_picture(
num int not null auto_increment,
uid varchar(48) not null,
title varchar(12) not null,
description varchar(48) not null,
place varchar(12) not null,
p_path varchar(48) not null,
date date,
primary key(num),
constraint FK_uid foreign key(uid) references user(uid));";
if($conn->query($sql) === TRUE) 
	{echo"Table user_picture created successfully"."<br>";}
else{echo"Error creating table: ". $conn->error;}

$conn->close();


?>