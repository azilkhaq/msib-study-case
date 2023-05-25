<?php
include "../../../config/config.php";
$query = mysqli_query($conn, "SELECT *, products.id as product_id FROM products 
                                LEFT JOIN categories ON products.category_id = categories.id
                                LEFT JOIN conditions ON products.condition_id = conditions.id
                                LEFT JOIN brands ON products.brand_id = brands.id
                              ORDER BY products.id DESC");
?>

<?php include_once("../layouts/head.php") ?>

<div class="page-wrapper">

    <?php include_once("../layouts/navbar.php") ?>

    <div class="page-content">

        <?php include_once("../layouts/sidebar.php") ?>

        <main class="page-main">

            <div class="card mb-3">
                <div class="card-body">
                    <a href="./add.php" class="btn btn-primary">Add Product</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="tableData" class="table table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Condition</th>
                                <th>Brand Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($query) > 0) { ?>
                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $data['name'] ?></td>
                                        <td><?= $data['category_name'] ?></td>
                                        <td><?= $data['condition_name'] ?></td>
                                        <td><?= $data['brand_name'] ?></td>
                                        <td>Rp. <?= number_format($data['price']) ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $data["product_id"] ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="core/process_delete.php?id=<?= $data["product_id"] ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
</div>

<?php include_once("../layouts/script.php") ?>
<script>
    $(document).ready(function() {
        $('#tableData').DataTable();
    });
</script>