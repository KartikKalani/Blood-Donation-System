<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blood Donation System</title>
   <style>
      body {
         margin: 0;
         padding: 0;
      }

      nav {
         background-color: rgb(100, 93, 93);
         color: #fff;
         display: flex;
         justify-content: space-between;
         align-items: center;
         padding: 20px;
      }

      .logo h2 {
         margin: 0;
      }

      .nav-links {
         list-style-type: none;
         margin: 0;
         padding: 0;
         display: flex;
      }

      .nav-links li {
         margin-right: 20px;
      }

      .nav-links li a {
         text-decoration: none;
         color: #fff;
      }

      .nav-links li a:hover {
         color: #ff0000;
      }
   </style>
</head>

<body>

   <nav>
      <div class="logo">
         <h2>Blood Donation System</h2>
      </div>
      <ul class="nav-links">
         <li><a href="index.php">Home</a></li>
         <li><a href="donate.php">Donate</a></li>
         <li><a href="find_donor.php">Find Donor</a></li>
         <li><a href="contact.php">Contact</a></li>
         <?php if (isset($_SESSION['user'])) { ?>
            <li><a href="index.php"><?php echo $_SESSION["user"]; ?></a></li>
         <?php } else { ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
         <?php } ?>
         <?php if (isset($_SESSION['user'])) { ?>
            <li><a href="logout.php">Logout</a></li>
         <?php } ?>
      </ul>
   </nav>

</body>

</html>