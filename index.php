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
      <?php
        $connect=mysqli_connect("localhost", "root", "toor", "journal");
        if ($connect->connect_error){
          print("<p>Error connecting</p>\n");
        }
        $result=$connect->query("SELECT * FROM entries ORDER BY id DESC LIMIT 10;");
        if ($result->num_rows > 0){
          while ($row = $result->fetch_assoc()){
            $id = $row["id"];
            $title = $row["title"];
            $date = $row["date"];
            $post = $row["post"];
            $maxlength = 170;
            $post = (strlen($post) > $maxlength) ? substr($post,0,$maxlength-43) . "...<a href='/view.php?id=$id'>read more</a>" : $post;
            print("<h2>$title</h2>\n");
            print("<h3>$date</h3>\n");
            print("<p>$post</p>\n");
            print("<br>");
          }
        } else {
          print("<h2>Entry not found</h2>\n");
        }
       ?>
    </div>
  </body>
</html>
