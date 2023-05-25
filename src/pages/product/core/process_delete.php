<?php
include "../../../../config/config.php";
 
$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM products WHERE id = $id");

if ($query) {
    echo "<script>
    alert('Successfuly delete product.');
    window.location.href='../index.php';
    </script>";
} else {
    echo "<script>
    alert('Sorry, there was an error delete product.');
    window.location.href='../index.php';
    </script>";
}