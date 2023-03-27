<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = test_input($_POST["first_name"]);
    $last_name = test_input($_POST["last_name"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirm_password"]);


    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = "All fields are required.";
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    }

    elseif ($password != $confirm_password) {
        $error_message = "Passwords do not match.";
    }

    else {
        $success_message = "Registration successful!";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>


</head>
<body>

            <?php
            // Display error or success message
            if (!empty($error_message)) {
                echo "<p style='color: red'>$error_message</p>";
            }
            elseif (!empty($success_message)) {
                echo "<p style='color: green;'>$success_message</p>";
            }
            ?>
        </div></div></div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="container">
        <div class="row">
            <div class="column column-40 column-offset-20">
                <h1 class="">Registration Form</h1>
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="first_name" required>
                <br><br>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="last_name" required>
                <br><br>
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br><br>
                <label for="c_password">Confirm Password:</label>
                <input type="password" id="c_password" name="confirm_password" required>
                <br><br>
                <input type="submit" value="Register">

</form>
</body>
</html>