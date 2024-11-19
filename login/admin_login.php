<?php
include '../db_connect/connection.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $password=trim($_POST['password']);
    if($password!=''){
        $sql="SELECT * FROM login WHERE username='admin'";
        $query=$conn->query($sql);
        if($query->num_rows>0){
            $user =$query->fetch_assoc();
            if($password==$user['password']){
                header('location:../pages/index.php');
            }else{
                header('location:login.php?error=login');
            }
        }else{
            header('location:login.php?error=login');
        }
    }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Lockscreen</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="../../index2.html"><b>Korean</b>.KIUF</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Anvarjon</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../dist/img/logo_login.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="POST">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password" name="password">

        <div class="input-group-append">
          <button type="button" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Tizim parolni kiriting
  </div>
  <div class="text-center">
    <a href="login.php">Or sign in as a different user</a>
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
