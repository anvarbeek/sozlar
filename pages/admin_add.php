<?php
include '../include/header.php';
include '../include/menu.php';
include '../include/navbar.php';
include '../db_connect/connection.php';
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
<div class="content-wrapper mt-4">
    <div class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">New Admin</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-success" value="Add" >
                            </div>
                        </form>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="col-md-6">
                    <!-- /.card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Tizim loginlari</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM login";
                                        $query = $conn->query($sql);

                                        if($query->num_rows>0){
                                            while($row=$query->fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['username']?></td>
                                        <td><?= $row['password']?></td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    <tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<?php
include '../include/footer.php'; ?>