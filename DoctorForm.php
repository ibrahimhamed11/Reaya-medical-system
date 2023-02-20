<style>
<?php include 'css/joinUsForm.css';
?>
</style>

<?php
$error_fields = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!(isset($_POST['name']) && !empty($_POST['name']))) {
    $error_fields[] = "name";
  }

  if (!(isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
    $error_fields[] = "email";
  }

  if (!(isset($_POST['password']) && strlen($_POST['password']) > 7)) {
    $error_fields[] = 'password';
  }

  if (!(isset($_POST['phone']) && strlen($_POST['phone']) > 10)) {
    $error_fields[] = 'phone';
  }

  if (!(isset($_POST['address']))) {
    $error_fields[] = 'address';
  }

  if (!(isset($_POST['specialization']))) {
    $error_fields[] = 'specialization';
  }

  if (!(isset($_POST['price']))) {
    $error_fields[] = 'price';
  }

  if (!(isset($_POST['gender']))) {
    $error_fields[] = 'gender';
  }

  if (!$error_fields) {
    // Connect to DB
    $conn = mysqli_connect("localhost", "root", "", "reaya");
    if (!$conn) {
      echo mysqli_connect_error();
      exit;
    }

    // Escape any special characters to avoid SQL injection
    $name = mysqli_escape_string($conn, $_POST['name']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = sha1($_POST['password']);
    $phone = mysqli_escape_string($conn, $_POST['phone']);
    $address = mysqli_escape_string($conn, $_POST['address']);
    $specialization = mysqli_escape_string($conn, $_POST['specialization']);
    $price = mysqli_escape_string($conn, $_POST['price']);
    $role = $_POST['role'];
    $gender = $_POST['gender'];

    // Insert the data
    $query = "INSERT INTO `users` (`name`, `email`, `password`, `phone`, `address`, `role`, `gender`, `specialization`,  `price`) VALUES ('" . $name . "', '" . $email . "', '" . $password . "', '" . $phone . "', '" . $address . "', '" . $role . "', '" . $gender . "', '" . $specialization . "', '" . $price . "')";
    if (mysqli_query($conn, $query)) {
      header("Location: index.php");
      exit;
    } else {
      // echo $query
      echo mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Form</title>
    <!-- <link rel="stylesheet" href="assets/css/joinUsForm.css" /> -->
</head>

<body>
    <div class="input_container">
        <h1 class="title details">Registration</h1>
        <form method="post" name="formValidation" id="formValidation">
            <div class="user-details">
                <div class="input-row">
                    <div class="details">Full Name</div>
                    <input type="text" name="name" placeholder="Full Name*" />
                    <div class="error"> <?php if (in_array("name", $error_fields)) echo "Please, enter your name"; ?>
                    </div>
                </div>
                <div class="input-row">
                    <div class="details">Email</div>
                    <input type="email" name="email" placeholder="Email*" />
                    <div class="error">
                        <?php if (in_array("email", $error_fields)) echo "Please, enter a valid email"; ?></div>
                </div>
                <div class="input-row">
                    <div class="details">password</div>
                    <input type="password" name="password" placeholder="password*" />
                    <div class="error">
                        <?php if (in_array("password", $error_fields)) echo "Please, enter a password not less than 8 characters"; ?>
                    </div>
                </div>
                <div class="input-row">
                    <div class="details">phone</div>
                    <input type="number" name="phone" placeholder="phone*" />
                    <div class="error">
                        <?php if (in_array("phone", $error_fields)) echo "Please, enter a phone number not less than 11 characters"; ?>
                    </div>
                </div>
                <div class="input-row">
                    <div class="details">Address</div>
                    <input type="text" name="address" placeholder="address*" />
                </div>
                <div class="input-row">
                    <div class="details">specialization</div>
                    <input type="text" name="specialization" placeholder="specialization*" />
                    <div class="error">
                        <?php if (in_array("specialization", $error_fields)) echo "Please, enter your specialization"; ?>
                    </div>
                </div>
                <div class="input-row">
                    <div class="details">price</div>
                    <input type="text" name="price" placeholder="price*" />
                    <div class="error"> <?php if (in_array("price", $error_fields)) echo "Please, enter your price"; ?>
                    </div>
                </div>
                <div class="input-row">
                    <div class="details">Role</div>
                    <input type="text" name="role" value="Doctor" readonly />
                </div>
            </div>
            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1" />
                <input type="radio" name="gender" id="dot-2" />
                <span class="gender-title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">female</span>
                    </label>
                </div>
                <div class="error"> <?php if (in_array("gender", $error_fields)) echo "Please, choose your gender"; ?>
                </div>
            </div>
            <div class="text-center">
                <input type="submit" value="Register" />
            </div>
        </form>
    </div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" type="text/javascript"></script> -->
    <!-- <script src="./assets/js/index.js" type="text/javascript"></script> -->
</body>

</html>