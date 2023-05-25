<?php
include "../../../../config/config.php";

$id = $_POST['id'];
$name = $_POST['name'];
$category = $_POST['category'];
$condition = $_POST['condition'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$description = $_POST['description'];
$defaultImage = $_POST['defaultImage'];
$image = "";

if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
    $targetDirectory = "../../../../uploads/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $image = "uploads/" . basename($_FILES["image"]["name"]);
    } else {
        echo "<script>
        alert('Sorry, there was an error uploading your file.');
        window.location.href='../add.php';
        </script>";
    }
} else {
    $image = $defaultImage;
}

$query = mysqli_query($conn, "UPDATE products SET name = '$name', 
                                                  description = '$description', 
                                                  image = '$image', 
                                                  category_id = '$category', 
                                                  condition_id = '$condition', 
                                                  brand_id = '$brand', 
                                                  price = '$price' 
                              WHERE id = $id");

if ($query) {
    echo "<script>
    alert('Successfuly edit product.');
    window.location.href='../index.php';
    </script>";
} else {
    echo "<script>
    alert('Sorry, there was an error edit product.');
    window.location.href='../add.php';
    </script>";
}
