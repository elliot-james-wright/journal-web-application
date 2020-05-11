<!DOCTYPE html>
<html>
  <head>
    <title>About us</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="fonts/fonts-src.css">
    <link rel="icon" href="favicon.ico">
  </head>

  <body>
    <div class="header">
      <h2 id="title">Daily Journal</h2>
      <h3 id="home"><a href="index.php">Home</a></h3>
      <h3 id="compose"><a href="compose.php">Compose</a></h3>
      <h3 id="about"><a href="about.php">About us</a></h3>
      <h3 id="contact"><a href="contact.php">Contact Us</a></h3>
    </div>

    <div class="body">
      <h1>Compose a new Journal Entry</h1>

      <?php
        if( $_POST["title"] && $_POST["post"]){
          $connect=mysqli_connect("localhost", "root", "toor", "journal");
          if ($connect->connect_error){
            print("<p>Error connecting</p>");
          } else {
            print("<h2>Message sent succefully!</h2>");
          }
          $result=$connect->query('INSERT INTO entries (date, title, post) VALUES ("' . date("d/m/Y") . '", "' . $_POST["title"] . '", "' . $_POST["post"] . '")');
        }
       ?>

      <form action="<?php $_PHP_SELF ?>" method=post>
        <h2>Title</h2>
        <input type="text" name="title" placeholder=""><br>
        <h2>Message</h2>
        <textarea name="post" rows="8" cols="80" placeholder=""></textarea><br><br>
        <input type="submit">
      </form>
    </div>
  </body>
</html>
