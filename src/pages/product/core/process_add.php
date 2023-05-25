<?php
include "../../../../config/config.php";

$name = $_POST['name'];
$category = $_POST['category'];
$condition = $_POST['condition'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$description = $_POST['description'];
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
    echo "<script>
    alert('No file selected or an error occurred.');
    window.location.href='../add.php';
    </script>";
}

$query = mysqli_query($conn, "INSERT INTO products (name, description, image, category_id, condition_id, brand_id, price) 
                                    VALUES ('$name', '$description', '$image', '$category', '$condition', '$brand', '$price')");

if ($query) {
    echo "<script>
    alert('Successfuly add product.');
    window.location.href='../index.php';
    </script>";
} else {
    echo "<script>
    alert('Sorry, there was an error add product.');
    window.location.href='../add.php';
    </script>";
}
