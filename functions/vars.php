<?php
/*
coded by m.slamat
*/
/// inistialize all vars 
$year=filter($data->year);
$id=filter($data->id);
$email=filter($data->email); // user email
$password = filter($data->password);
$fname=filter($data->fname);
$lname=filter($data->lname);
$picture=filter($data->picture);

$flag=filter($data->banne); // flag if my client want banne someone
$date = date('Y/m/d H:i:s'); // date
$ip = $_SERVER['REMOTE_ADDR'] ; // user ip 
$useragent = $_SERVER['HTTP_USER_AGENT']; // getting useragnet 
$op = filter($_GET['op']); // operation name 
$tooken = filter($_GET['tooken']); // secure tooken
?>