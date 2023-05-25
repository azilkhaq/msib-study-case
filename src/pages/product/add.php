<?php
include "../../../config/config.php";
$queryCategory = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");
$queryCondition = mysqli_query($conn, "SELECT * FROM conditions ORDER BY id DESC");
$queryBrand = mysqli_query($conn, "SELECT * FROM brands ORDER BY id DESC");
?>

<?php include_once("../layouts/head.php") ?>

<div class="page-wrapper">

    <?php include_once("../layouts/navbar.php") ?>

    <div class="page-content">

        <?php include_once("../layouts/sidebar.php") ?>

        <main class="page-main">
            <div class="card  mb-3">
                <div class="card-body">
                    <h5>Form Add Product</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="core/process_add.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        <?php if (mysqli_num_rows($queryCategory) > 0) { ?>
                                            <?php
                                            while ($dataCategory = mysqli_fetch_array($queryCategory)) {
                                            ?>
                                                <option value="<?= $dataCategory['id'] ?>"><?= $dataCategory['category_name'] ?></option>
                                            <?php
                                            } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Condition</label>
                                    <select class="form-control" name="condition">
                                        <option value="">Select Condition</option>
                                        <?php if (mysqli_num_rows($queryCondition) > 0) { ?>
                                            <?php
                                            while ($dataCondition = mysqli_fetch_array($queryCondition)) {
                                            ?>
                                                <option value="<?= $dataCondition['id'] ?>"><?= $dataCondition['condition_name'] ?></option>
                                            <?php
                                            } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-control" name="brand">
                                        <option value="">Select Brand</option>
                                        <?php if (mysqli_num_rows($queryBrand) > 0) { ?>
                                            <?php
                                            while ($dataBrand = mysqli_fetch_array($queryBrand)) {
                                            ?>
                                                <option value="<?= $dataBrand['id'] ?>"><?= $dataBrand['brand_name'] ?></option>
                                            <?php
                                            } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" class="form-control" placeholder="Enter price">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" style="float: right;">Submit</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include_once("../layouts/script.php") ?>