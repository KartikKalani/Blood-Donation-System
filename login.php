<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        li {
            font-size: 28px;
        }

        div {
            display: flex;
            justify-content: center;
            align-items: center;
            /* min-height: 100vh; */
        }

        body {
            background-image: url('background.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        form {
            font-size: 30px;
        }

        .error {
            color: red;
        }

        input[type=submit] {
            background-color: darksalmon;
            border: none;
            color: white;
            padding: 12px 32px;
            text-decoration: none;
            margin: 20px 2px;
            cursor: pointer;
            border-radius: 10%;
            font-size: 25px;
        }

        input[type=text],
        input[type=password] {
            font-size: 25px;
            height: 35px;
            width: 300px;
            margin: 5px;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blood_donation_system";

    // Create connection
    $conn = new mysqli(
        $servername,
        $username,
        $password,
        $dbname
    );
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $emailErr = $passwordErr = "";
    $emailValue = $passwordValue = "";





    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $flag = 1;
        if (empty($_POST["email"])) {
            $emailErr = "Email is Required ";
            $flag = 0;
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required ";
            $flag = 0;
        }

        if (!empty($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email address";
            $flag = 0;
        } else {
            $emailValue = $_POST["email"];
        }

        $passwordValue = $_POST["password"];

        if ($flag == 1) {
            $email = $_POST['email'];
            $sql = " select *from user_info where email ='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows == 0) {
                $emailErr = "User does not exists";
            } else {


                $passwordq = md5($passwordValue);
                $sql = "SELECT * from user_info where email='$email' and password='$passwordq'";

                $result = $conn->query($sql);

                $count = $result->num_rows;
                if ($count == 0) {
                    $passwordErr = "Invalid Password";
                } else {

                    $sql = "SELECT name from user_info where email='$email' and password='$passwordq'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $uname = $row['name'];
                    $_SESSION["user"] = $uname;
                    $_SESSION["email"] = $email;

                    header("Location: index.php");
                }
            }
        }
    }
    $conn->close();
    ?>
    <br><br> <br><br> <br><br> <br><br><br>


    <div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <table>
                <tr>
                    <td>Email Id</td>
                    <td>
                        <input type="text" name="email" value="<?php echo $emailValue; ?>">

                    </td>
                    <td> <span class="error">*<?php echo $emailErr; ?></span></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" value="<?php echo $passwordValue; ?>">
                    </td>
                    <td> <span class="error">*<?php echo  $passwordErr; ?></span></td>

                </tr>
                <tr>

                    <td colspan="2" align="right">
                        <a href="forgot.php">Forgot Password</a>
                    </td>

                </tr>
                <tr align="center">
                    <td colspan="3"><input type="submit" value="login"></td>
                </tr>

            </table>
        </form>
    </div>


    <?php

    ?>


</body>

</html>