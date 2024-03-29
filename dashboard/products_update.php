<?php
//sql connection
// @include 'config.php';
require_once("../componant/config.php");
// get data from 

$id = $_GET['edit'];
if (isset($_POST['update_product'])) {
   
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'upload/' . $product_image;
   //validation
   if (empty($product_name) || empty($product_price) || empty($product_image)) {
      $message[] = 'please fill out all!';
   } else {

      $update_data = "UPDATE products SET product_name='$product_name', product_price='$product_price', product_image='$product_image'  WHERE product_id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if ($upload) {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:products.php');
      } else {
         $$message[] = 'please fill out all!';
      }

   }
}
;

//get admin name from db and print 
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
$adminId=$_SESSION['id'];
   $query = mysqli_query($conn, "SELECT * FROM users where role='admin' AND id='$adminId'");
   $fetch = mysqli_fetch_array($query);

   $adminName= "<h5 class='text-success text-white mb-3

   '>" . $fetch['name'] . "</h5>";
   //get admin name from db and print 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>update product</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Font Awesome css file -->
    <link rel="stylesheet" href="../css/all.min.css" />
    <!-- Our css file -->
    <link rel="stylesheet" href="../css/style.css" />
    <!-- Google Fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet" />
</head>


<body>



    <div class="container">


        <div class="admin-product-form-container centered">
            <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<span class="message">' . $message . '</span>';
      }
   }
   ?>
            <?php

         $select = mysqli_query($conn, "SELECT * FROM products WHERE product_id = '$id'");
         while ($row = mysqli_fetch_assoc($select)) {

            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <h3 class="title">update the product</h3>
                <input type="text" class="box" name="product_name" value="<?php echo $row['product_name']; ?>"
                    placeholder="enter the product name">
                <input type="number" min="0" class="box" name="product_price"
                    value="<?php echo $row['product_price']; ?>" placeholder="enter the product price">


                <input type="file" class="box" name="product_image" accept="image/png, image/jpeg, image/jpg">
                <input type="submit" value="update product" name="update_product" class="btn">
                <a href="admin_page.php" class="btn">go back!</a>
            </form>
            <?php }
         ; ?>


        </div>

    </div>

</body>

</html>