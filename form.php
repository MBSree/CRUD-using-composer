<?php include("connection.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <title>PHP CRUD Operations</title>
</head>

<body>
    <div class="container my-5">
        <h1 style="color:#36454F">Registration Form</h1><br>
        <form method="POST">
            <div class="form-group">
                <label>User Name</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Email Id</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter your address" name="address" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" class="form-control" placeholder="Enter your phone Number" name="phonenumber" autocomplete="off" required>
            </div>

            <input type="hidden"  name="create_hidden" value="create">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>


</body>

</html>

<?php
include("connection.php");
include("Validation.php");


// $validationObject = new Validation();

// function isUniqueEmail($email, $conn)
// {
//     $stmt = $conn->prepare("SELECT id FROM employee WHERE email = ?");
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     $stmt->store_result();
//     $count = $stmt->num_rows;
//     $stmt->close();

//     return $count === 0;
// }

// function isValidPassword($password)
// {
//     $minLength = 6;
//     $maxLength = 20;

//     if (strlen($password) < $minLength || strlen($password) > $maxLength) {
//         return false;
//     }

//     if (!preg_match('/[a-z]/', $password)) {
//         return false;
//     }

//     if (!preg_match('/[A-Z]/', $password)) {
//         return false;
//     }

//     if (!preg_match('/[0-9]/', $password)) {
//         return false;
//     }

//     if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
//         return false;
//     }

//     return true;
// }

// function isValidPhoneNumber($phoneNumber) {
//     $pattern = '/^\d{10}$/';
//     return preg_match($pattern, $phoneNumber);
// }


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];

    $hidden = $_POST["create_hidden"];
    

    $ValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    $isAllowedDomain = isValidEmail($email);
    $isUniqueEmail = isUniqueEmail($email, $id=null, $conn);
    $isValidPassword = isValidPassword($password);
    $isValidPhoneNumber = isValidPhoneNumber($phonenumber);
    // $isUniqueEmail = $validationObject->isUniqueEmail($email, $id=null, $conn);
    // $isValidPassword = $validationObject->isValidPassword($password);
    // $isValidPhoneNumber = $validationObject->isValidPhoneNumber($phonenumber);

    // if (!$isValidEmail) {
    //     echo "<script>alert('Invalid email address.');</script>";
    // }

    if (!$isAllowedDomain) {
        echo "<script>alert('Sorry, registration is only allowed for specific email domains of " .implode(',',$allowedDomains). ".');</script>";
    }

    if (!$isUniqueEmail) {
        echo "<script>alert('Sorry, this email is already registered.');</script>";
    }

    if (!$isValidPassword) {
        echo "<script>alert('Password must be between 6 and 20 characters and contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character.');</script>";
    }

    if (!$isValidPhoneNumber){
        echo "<script>alert('Invald Phone Number.');</script>";
    }

    if ($ValidEmail && $isAllowedDomain && $isUniqueEmail && $isValidPassword && $isValidPhoneNumber) {
        $query = "INSERT INTO employee(username,email,password,address,phonenumber) VALUES('$username','$email','$password','$address','$phonenumber')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            //echo "<script>alert('Data insertion is successfull.');</script>";
            header('location: display.php');
        } else {
            echo "<script>alert('Data not inserted. Failed!!!');</script>";
        }

    }
}
?>