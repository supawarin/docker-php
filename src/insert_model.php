<?php ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);


//include('connection.php');
$conn = new mysqli('db','root','example','cars');

$id=$_POST['id_model'];
$model=$_POST['model'];
$make=$_POST['make'];
$price=$_POST['price'];
$color=$_POST['color'];
$input_image=$_POST['input_image'];

$sql = "INSERT INTO cars (id, model, make, price, color, image) VALUES ('$id', '$model', '$make', '$price','$color', '$input_image') ";
$result =mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('Add New Model Successfuly!');</script>";
    echo "<script>window.location='model.php';</script>";
}else{
    echo "<script>alert('Error Database !');</script>";
    echo "<script>window.location='form_model.php';</script>";
}
mysqli_close($conn);
















?>