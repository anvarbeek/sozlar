<?php
include '../db_connect/connection.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);
    if($username!='' && $password!=''){
        $sql="SELECT * FROM login WHERE username='$username'";
        $query=$conn->query($sql);
        if($query->num_rows>0){
            $user =$query->fetch_assoc();
            if($username==$user['username'] && $password==$user['password']){
                header('location:../index.php');
            }else{
                header('location:login.php?error=login');
            }
        }else{
            header('location:login.php?error=login');
        }
    }
}