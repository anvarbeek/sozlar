<?php
include '../include/header.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $sql1 = "SELECT * FROM login WHERE username='$username'";
    $query = $conn->query($sql1);
    if ($query->num_rows == 0) {
        $sql = "INSERT INTO login(username,password)VALUES('$username', '$password')";
        if ($conn->query($sql)) {
            echo "<script>alert('Ro\'yxatdan muvaffaqiyatli o\'tdingiz');</script>";
        } else {
            echo "<script>alert('Ro\'yxatdan o\'tishda xatolik');</script>";
        }
    } else {
        echo "<script>alert('Bu Username allaqachon ro\'yxatdan o\'tgan');</script>";
    }
    mysqli_close($conn);
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper login-page">
    <div class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">New Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                                </div>
                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<?php
include '../include/footer.php'; ?>