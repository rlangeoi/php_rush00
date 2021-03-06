<?php
session_start();
$css_file = "products.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
  <div class="container">

    <?php
    $path = "private";
    $file = $path."/categories";
    $unserialized = unserialize(file_get_contents($file));
    ?>

    <div class="filter_box">
      <h2>Quelle planète choisir ?</h2>
      <form method='post' action='check-box-boutique.php'>
        <div class="categories">
           <?php
           foreach ($unserialized as $k => $v)
           {
            echo "<div class='title'>";
            echo "<h4>".$k."</h4>";
            echo "<hr>";
            foreach ($v as $elem)
              echo "<div class='check'><input type='checkbox' name='".$elem."' checked='checked'><p>".$elem."</p></div>";
            echo "</div>";

          } 
        ?>
        </div>
        <input type='submit' name = 'submit' value='Filtrer' />
      </form>
    </div>

    <div class="products-list">
        <?php
        $db_planets = unserialize(file_get_contents("./db/serialized"));
        // print_r ($db_planets);
        foreach ($db_planets as $planet)
        {
          echo "<div class='card'>";
          echo "<div class='title'><h2>".$planet[1]."</h2></div>";
          echo "<img src='".$planet[8]."'>";
          echo "</div>";
        }
        ?>

      </div>

    </div>
    <?php include('partial/footer.php'); ?>

  </body>
  </html>