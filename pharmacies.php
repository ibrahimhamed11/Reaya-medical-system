<?php
session_start();
require_once ('componant/CreateDb.php');
require_once ('componant/component.php');
// create instance of Createdb class
$database = new CreateDb("reaya", "Products");
if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'pharmacies.php'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count] = $item_array;
        }
    }else{
        $item_array = array(
                'product_id' => $_POST['product_id']
        );
        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        // print_r($_SESSION['cart']);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" />
    <title>PHARMACEIES</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <!--fontawesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!--google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--icons library-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css" />
    <link rel="stylesheet" href="css/pharmacie.css">

</head>

<body>
    <div class="pharmaceies-page">
        <!-- start nav -->
        <nav class="navbar navbar-expand-lg navbar-light nav sticky-top p-0">
            <div class="container">
                <div class="col-6 logo">
                    <div class="images">
                        <img src="assets/images/logo.PNG" alt="" />
                        <span>Re<h>ع</h>aya</span>
                    </div>
                </div>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item align-self-center">
                            <a class="nav-link p-1 p-lg-3 " aria-current="page" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item align-self-center">
                            <a class="nav-link p-1 p-lg-3" href="#">PHARMACEIES</a>

                        </li>
                        <li class="nav-item align-self-center">
                            <a class="nav-link p-1 p-lg-3 " href="pharmacie_profile.php">PHARMACY PROFILE</a>
                        </li>
                        <li class="nav-item align-self-center">
                            <a class="nav-link p-1 p-lg-3" href="doctors.php">DOCTORS</a>
                        </li>
                        <li class="nav-item align-self-center active">
                            <a class="nav-link p-1 p-lg-3" href="doctor_profile.php">DOCTOR PROFILE</a>
                        </li>
                        <li class="nav-item align-self-center">
                            <a class="nav-link p-1 p-lg-3" href="contact.php">CONTACT</a>
                        </li>
                        <li class="nav-item align-self-center">
                            <a class="nav-link p-1 p-lg-3" href="join us.php">JOIN</a>
                        </li>
                        <li class="nav-item align-self-center">
                            <a class="nav-link p-1 p-lg-3" href="donate.php">DONATE</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end nav -->
    </div>
    <!-- end header -->

    <!--start head lines-->
    <div>
        <div class="cartnav" id="cardnav">
            <header class="line" style="display: flex;">
                <p class="title">
                    All medicines are dispensed from pharmacies licensed by the Ministry of Health in the Arab Republic
                    of Egypt
                </p>
                <div class="card-close">
                    <button type="button" class="closebtn">×</button>

                    <div class="carttt">
                        <div class="navbar-nav ">
                            <a href="cart.php" class="nav-item nav-link active">
                                <h5 class="px-5 cart">
                                    <i class="fas fa-shopping-cart"></i> Cart
                                    <?php
                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\">$count</span>";
                            
                        }else{
                            echo "<span id=\"cart_count\">0</span>";
                        }
                        ?>
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </header>




            <div class="listitems">
                <!-- <h1 class="item">
                    Request and monthly follow-up of your medications in the easiest way
                </h1>
                <div class="items">
                    <div class="item1">
                        <i size="16" class="fa-solid fa-bolt item1icon"></i>
                        <div class="itemtitle">Immediate delivery</div>
                    </div>
                    <div class="item2">
                        <i size="16" class="fa-solid fa-calendar-days item1icon"></i>
                        <div class="itemtitle">Reminder of medication renewal dates</div>
                    </div>
                    <div class="item3">
                        <i size="16" class="ffa-sharp fa-solid fa-user-doctor item1icon"></i>
                        <div class="itemtitle">Contact a pharmacist</div>
                    </div> -->
                <!-- </div>
        </div>
        <div class="searchbox">
            <h2 class="searchhead">
                Order your medicines and everything you need from the pharmacy
            </h2>
            <div class="lablecontainer"> -->
                <!--------------------------lable1---------------------------------->
                <!-- <input id="med" type="file" accept="image/*" class="input" />
                <label for="med" class="lable1">
                    <div class="perceptionicon">
                        <img id="prescription-icon" src="assets/images/icon1.png" size="16" />
                    </div>
                    <div class="Request">Request by prescription</div>
                </label> -->
                <!--------------------------lable2---------------------------------->
                <!-- <input type="file" id="medicine" accept="image/*" class="input" />
                <label for="medicine" class="lable2">

                    <div class="perceptionicon">
                        <img id="medicine-icon" src="assets/images/icon2.png" size="16" />
                    </div>
                    <div class="Request">Request a product photo</div>
                </label> -->
                <!--------------------------lable3---------------------------------->
                <!-- <input type="file" id="medicine" accept="image/*" class="input" />
                    <label for="medicine" class="lable2">
                        <div class="perceptionicon">
                            <img id="medicine-icon" src="images/icon2.png" size="16" />
                        </div>
                        <div class="Request">Request a product photo</div>
                    </label> -->
                <!--------------------------------------------------------------------------->
                <!-- </div>
                <div class="searchcontainer">
                    <i id="search-icon" size="32" color="#808184"
                        class="fa-sharp fa-solid fa-magnifying-glass iconsearch"></i>
                    <input type="text" placeholder="search for your order" class="searchtextinbox" />
                </div> -->
                <!--******************************************************* -->
                <!-- </div> -->


                <div class="searchcontainer">
                    <form action="search.php" method="post" class=" d-flex py-0">
                        <input type="text" name="search" class="form-control mb-4" placeholder="Enter any details">
                        <br>
                        <button type="submit" name="submit" class="btn btn-success mb-4">Search</button>
                    </form>
                </div>




                <!-------------------------lables container div------------------------->
            </div>
        </div>
        <!--******************************************************* -->

        <div class="container">
            <div class="row text-center py-5">

                <?php

                $result = $database->getDataProducts();
               
                while ($row = mysqli_fetch_assoc($result)){

                    
                    component($row['product_name'], $row['product_price'],$row['product_description'], $row ['product_image'], $row['product_id']);
                }
            ?>
            </div>


        </div>

        <!-- start footer -->
        <footer class="section_end text-center text-lg-start pt-2">
            <!-- Section: Links  -->
            <div class="container p-3">
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->

                    <!-- Copyright -->

                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-2">
                        <!-- Content -->
                        <div class="pb-2">
                            <img src="./assets/images/logoFooter.PNG" alt="" />
                            <span>Re<h>ع</h>aya</span>
                        </div>
                        <p></p>
                        <div class="pt-3">
                            <a class="text-reset" href="">©2020 Thousand Sunny. All rights reserved</a>
                        </div>
                    </div>
                    <!-- Copyright -->

                    <!-- Start Grid column -->

                    <!-- End Grid column -->

                    <!-- Start Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">OUR PAGE</h6>
                        <p>
                            <a href="#!" class="text-reset">HOME</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">PHARMACEIES</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">DOCTORS</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">JOIN US</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">CONTACT US</a>
                        </p>
                    </div>
                    <!-- End Grid column -->

                    <!-- Start Grid column -->
                    <div class="col-md-2 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">ABOUT</h6>
                        <p><i class="fa-solid fa-phone"></i> +1800-001-658</p>
                        <p>
                            <i class="fa-solid fa-envelope"></i> Info@Peacefulthemes.Com
                        </p>
                        <p>
                            <i class="fa-solid fa-location-dot"></i> Themeforest, Envato HQ
                            24 Fifthst., Los Angeles, USA
                        </p>
                    </div>

                    <!-- End Grid column -->
                    <!-- Grid row -->
                </div>
                <!-- Section: Links  -->

                <!-- Icons -->
                <div class="text-center pl-4">
                    <div class="container" style="border-top: 1px solid white">
                        <!-- Twitter -->
                        <a class="btn btn-link btn-floating btn-lg text-dark mt-2" href="#!" role="button"
                            data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

                        <!-- Facebook -->
                        <a class="btn btn-link btn-floating btn-lg text-dark mt-2" href="#!" role="button"
                            data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

                        <!-- Instagram -->
                        <a class="btn btn-link btn-floating btn-lg text-dark mt-2" href="#!" role="button"
                            data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

                        <!-- Linkedin -->
                        <a class="btn btn-link btn-floating btn-lg text-dark mt-2" href="#!" role="button"
                            data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>

                        <!-- Google -->
                        <a class="btn btn-link btn-floating btn-lg text-dark mt-2" href="#!" role="button"
                            data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>
                    </div>
                </div>
                <!-- Icons -->
            </div>
        </footer>
        <!-- end footer -->

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="js/main.js"></script>

</html>