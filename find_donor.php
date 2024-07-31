<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find_Donor</title>
    <style>
        li {
            font-size: 28px;
        }

        td {
            font-size: larger;
        }
    </style>
</head>



<body bgcolor="#FFCEC4">
    <?php include 'header.php' ?>




    <?php
    // define variables and set to empty values
    $cityErr = $bloodgroupErr = "";
    $city =  $bloodgroup = "";
    $flag1 = 1;
    $flag2 = 1;

    if (isset($_POST['submit'])) {
        if (empty($_POST["city"]) || $_POST["city"] == "Select One") {
            $cityErr = "city is required";
            $flag1 = 0;
        } else {
            $city = $_POST["city"];
        }

        if (empty($_POST["bloodgroup"]) || $_POST["bloodgroup"] == "Select One") {
            $cityErr = "bloodgroup is required";
            $flag2 = 0;
        } else {
            $bloodgroup = $_POST["bloodgroup"];
        }
    }


    ?>

    <br>
    <br>
    <br>
    <center>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <table style="background-color:lightgrey;">
                <tr>
                    <td colspan="2" style="font-size:xx-large">
                        Find Donors as per your Requirement
                    </td>
                </tr>

                <tr>
                    <td style="font-size: xx-large;">
                        Blood group:
                    </td>
                    <td style="font-size: xX-large;">
                        <select name="bloodgroup" style="font-size: 28px;">
                            <option value="Select One" <?= $bloodgroup == "Select One" ? "selected" : "";  ?>>Select One</option>
                            <option value="A+" <?= $bloodgroup == "A+" ? "selected" : ""; ?>>A+</option>
                            <option value="A-" <?= $bloodgroup == "A-" ? "selected" : ""; ?>>A-</option>
                            <option value="B+" <?= $bloodgroup == "B+" ? "selected" : ""; ?>>B+</option>
                            <option value="B-" <?= $bloodgroup == "B-" ? "selected" : ""; ?>>B-</option>
                            <option value="AB+" <?= $bloodgroup == "AB+" ? "selected" : ""; ?>>AB+</option>
                            <option value="AB-" <?= $bloodgroup == "AB-" ? "selected" : ""; ?>>AB-</option>
                            <option value="O+" <?= $bloodgroup == "O+" ? "selected" : ""; ?>>O+</option>
                            <option value="O-" <?= $bloodgroup == "O-" ? "selected" : ""; ?>>O-</option>

                        </select>

                    </td>
                </tr>


                <tr>
                    <td style="font-size: xx-large;">
                        City
                    </td>

                    <td>
                        <select name="city" style="font-size: 28px;">
                            <option value="Select One" <?=
                                                        $city == "Select One" ? "selected" : "";
                                                        ?>>Select One</option>
                            <option value="Ahmedabad" <?= $city == "Ahmedabad" ? "selected" : ""; ?>>Ahmedabad</option>
                            <option value="Surat" <?= $city == "Surat" ? "selected" : ""; ?>>Surat</option>
                            <option value="Vadodara (Baroda)" <?= $city == "Vadodara (Baroda)" ? "selected" : ""; ?>>Vadodara (Baroda)</option>
                            <option value="Rajkot" <?= $city == "Rajkot" ? "selected" : ""; ?>>Rajkot</option>
                            <option value="Bhavnagar" <?= $city == "Bhavnagar" ? "selected" : ""; ?>>Bhavnagar</option>
                            <option value="Jamnagar" <?= $city == "Jamnagar" ? "selected" : ""; ?>>Jamnagar</option>
                            <option value="Gandhinagar" <?= $city == "Gandhinagar" ? "selected" : ""; ?>>Gandhinagar</option>
                            <option value="Junagadh" <?= $city == "Junagadh" ? "selected" : ""; ?>>Junagadh</option>
                            <option value="Anand" <?= $city == "Anand" ? "selected" : ""; ?>>Anand</option>
                            <option value="Porbandar" <?= $city == "Porbandar" ? "selected" : ""; ?>>Porbandar</option>
                            <option value="Bhuj" <?= $city == "Bhuj" ? "selected" : ""; ?>>Bhuj</option>
                            <option value="Bharuch" <?= $city == "Bharuch" ? "selected" : ""; ?>>Bharuch</option>
                            <option value="Vapi" <?= $city == "Vapi" ? "selected" : ""; ?>>Vapi</option>
                            <option value="Ankleshwar" <?= $city == "Ankleshwar" ? "selected" : ""; ?>>Ankleshwar</option>
                            <option value="Gandhidham" <?= $city == "Gandhidham" ? "selected" : ""; ?>>Gandhidham</option>

                        </select>
                    </td>


                </tr>


                <tr align="center">
                    <td colspan="2" align="center" bgcolor="cyan">

                        <input type="submit" name="submit" value="Search" style="font-size: 28px;">
                    </td>
                </tr>

            </table>

        </form>
    </center>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "Kartik@21bce105";
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
    } else {

        if (isset($_POST['submit'])) {
            echo "<center>";
            echo "<br>";
            echo "<br>";



            if ($flag1 == 1 && $flag2 == 1) {


                $sql = "SELECT * from user_details where user_city='$city' and user_bg='$bloodgroup' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table border='1'  align='center' style='background-color:lightcyan;font-size:xx-large'>";
                    echo "<tr> <th> User name </th>
                <th> Blood group</th> <th> City </th> 
                <th> Mobile 1 </th>
                <th> Mobile 2</th> 
                <th> Gender </th> 
                </tr>";

                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["user_name"] . "</td>";
                        echo "<td>" . $row["user_bg"] . "</td>";
                        echo "<td>" . $row["user_city"] . "</td>";
                        echo "<td>" . $row["user_major"] . "</td>";
                        echo "<td>" . $row["user_minor"] . "</td>";
                        echo "<td>" . $row["user_gender"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<h2>No user found with such details</h2>";
                }
            } else if ($flag1 == 1) {


                $sql = "SELECT * from user_details where user_city='$city' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {


                    echo "<table border='1' align='center' style='background-color:lightcyan;font-size:xx-large'>";
                    echo "<tr> <th> User name </th>
                <th> Blood group</th> <th> City </th> 
                <th> Mobile 1 </th>
                <th> Mobile 2</th> 
                <th> Gender </th> 
                </tr>";

                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["user_name"] . "</td>";
                        echo "<td>" . $row["user_bg"] . "</td>";
                        echo "<td>" . $row["user_city"] . "</td>";
                        echo "<td>" . $row["user_major"] . "</td>";
                        echo "<td>" . $row["user_minor"] . "</td>";
                        echo "<td>" . $row["user_gender"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<h2>No user found with such details</h2>";
                }
            } else if ($flag2 == 1) {

                $sql = "SELECT * from user_details where   user_bg='$bloodgroup'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table border='1' style='background-color:lightcyan;font-size:xx-large'>";
                    echo "<tr> <th> User name </th>
                <th> Blood group</th> <th> City </th> 
                <th> Mobile 1 </th>
                <th> Mobile2</th> 
                <th> Gender </th> 
                </tr>";

                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["user_name"] . "</td>";
                        echo "<td>" . $row["user_bg"] . "</td>";
                        echo "<td>" . $row["user_city"] . "</td>";
                        echo "<td>" . $row["user_major"] . "</td>";
                        echo "<td>" . $row["user_minor"] . "</td>";
                        echo "<td>" . $row["user_gender"] . "</td>";
                        echo "</tr>";
                    }
                }
            } else {
                echo "<h2>plese select blood group or city for search the user info</h2>";
            }
            echo "</center>";
        }
        $conn->close();
    }
    ?>


</body>


</html>