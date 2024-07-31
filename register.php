<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
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
    </style>
</head>

<body>
    <?php include 'header.php' ?>


    <?php

    include 'connection.php';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function alert($message)
    {
        echo ("<script type='text/javascript'> 
			alert('" . $message . "'); </script>");
    }


    $emailErr = $passwordErr =  $unameErr = "";
    $emailValue = $passwordValue = $unameValue = "";

    function test_input($data)
    {
        $data =  trim($data);
        $data =  stripslashes($data);
        $data =  htmlspecialchars($data);
        return $data;
    }



    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $flag = 1;

        if (empty($_POST["uname"])) {
            $unameErr = "user name is Required ";
            $flag = 0;
        }

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

        // $passwordValue = $_POST["password"];

        if ($flag == 1) {

            $email = $_POST['email'];
            $uname = $_POST['uname'];

            $sql = " select *from user_info where email ='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $emailErr = "!!! Email id already exits";
            } else {

                $sql = "SELECT * from user_info where email='$email'";

                $result = $conn->query($sql);

                $count = $result->num_rows;
                if ($count > 0) {
                    echo "Email id already exists";
                } else {
                    $password = md5($_POST['password']);

                    $uname = test_input($_POST['uname']);
                    $sql = "INSERT INTO user_info (name,email,password) VALUES ('$uname','$email','$password')";
                    $conn->query($sql);
                    alert("Registered Successfully");
                    $emailValue = $passwordValue = "";
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
                    <td>User Name</td>
                    <td>
                        <input type="text" name="uname" value="<?php echo $unameValue; ?>">
                        <span class="error">*<?php echo $unameErr; ?></span>

                    </td>
                </tr>
                <tr>
                    <td>Email Id</td>
                    <td>
                        <input type="text" name="email" value="<?php echo $emailValue; ?>">
                        <span class="error">*<?php echo $emailErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" value="<?php echo $passwordValue; ?>">
                        <span class="error">*<?php echo $passwordErr; ?></span>
                    </td>

                </tr>
                <tr align="center">
                    <td colspan="2"><input type="submit" value="Register"></td>
                </tr>
            </table>
        </form>
    </div>


    <?php

    ?>


</body>

</html>