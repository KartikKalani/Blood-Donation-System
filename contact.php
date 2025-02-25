<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        li {
            font-size: 28px;
        }

        .myDiv {
            background-color: cornflowerblue;
            width: 500px;
            border: 5px lightcoral;
            padding: 50px;

            margin-top: 20px;
            margin-left: 300px;
            font-size: xx-large;
            border-radius: 10%;

        }

        .myDiv2 {
            background-color: mediumseagreen;

            border: 5px lightcoral;
            padding: 50px;

            margin-top: 50px;
            margin-left: 50px;
            font-size: xx-large;
            align-items: center;
            border-radius: 10%;

        }




        body {
            background-color: lightblue;
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
            padding: 10px 50px;
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
            width: 200px;
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
    include 'connection.php';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "";
    $queryErr = "";

    function alert($message)
    {
        echo ("<script type='text/javascript'> 
			alert('" . $message . "'); </script>");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $query = $_POST['query'];
        if (empty($query)) {
            $queryErr = "empty Query";
        } else {

            $email = $_SESSION["email"];
            $sql = "SELECT * from user_info where email='$email'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $uid = $row["id"];

            $sql = "INSERT INTO query_details VALUES($uid ,'$email','$query')";
            if ($conn->query($sql)) {
                alert("query submitted successfully.");
            }
        }
    }

    $conn->close();
    ?>
    <br><br> <br><br> <br><br> <br><br><br>

    <table>

        <tr>
            <td>

                <div class="myDiv">
                    <b>Parth Mori </b><br>
                    email id : 21bce157@nirmauni.ac.in<br>
                    mobile no : +91 0000000000<br>

                    <b> Kartik Kalani </b> <br>
                    email id: 21bce105@nirmauni.ac.in<br>
                    mobile no: +91 0000000000<br>
                </div>

            </td>
            <td>

                <div class="myDiv2">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <table>
                            <tr>
                                <td>
                                    <textarea style="font-size:x-large;" name="query" rows="4" cols="40" placeholder="Enter your query here.." maxlength="2000"></textarea><br>
                                </td>
                            </tr>
                            <tr align="center">
                                <td>
                                    <input type="submit" value="Ask Query" width="50px" height="20px">
                                </td>
                            </tr>


                        </table>
                    </form>
                </div>
            </td>

    </table>





</body>

</html>
