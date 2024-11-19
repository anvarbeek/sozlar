<?php
include '../include/header.php';
$book_id =1;


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <div class="content ">
        <div class="container-fluid mt-5">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Yangi So'zlar kiritish</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form method="post">
                            <div class="col-3">
                                <select name="book" id="" class="form-control">
                                    <?php
                                    $sql = " INSERT INTO ";
                                    $result = $conn->query($sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['book_id'] ?></option>
                                    <?php
                                        }
                                    } ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <select name="lesson" id="" class="form-control">
                                <?php
                                    $sql = " SELECT * from config";
                                    $result = $conn->query($sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['lesson_id'] ?></option>
                                    <?php
                                        }
                                    } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="O'zbekcha" name="name_uz">
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Korescha" name="name_ru">
                            </div>
                            <div class="col-1">
                                <input type="submit" class="btn btn-success" value="OK">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->




<?php
include '../include/footer.php'; ?>