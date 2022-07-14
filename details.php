<?php

if (!isset($_SESSION)) {
   session_start();
}

if (isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator" || isset($_SESSION['Access']) && $_SESSION['Access'] == "user") {
   echo "Welcome " . $_SESSION['UserLogin'] . "<br><br>";
} else {
   echo header("Location: landing.html");
}

include_once("connections/connection.php");

$con = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

?>
<!DOCTYPE html>
<html class="details-page" lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Coach Dinosaur System</title>
   <link rel="stylesheet" href="./css/analysis.css">
   <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>

<body>

   <p>Farm Evaluation Details</p>
   <br>
   <h2><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></h2>
   <p>Over-all Soil Quality: <?php echo $row['quality']; ?></p>
   <br>
   <p id="general"><?php echo $row['comment']; ?></p>
   <br>

   <table class="content-table">
      <thead>
         <tr>
            <th>Nitrogen</th>
            <th>Phosphorus</th>
            <th>Potassium</th>
            <th>Sulfate</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td><?php echo $row['n']; ?></td>
            <td><?php echo $row['p']; ?></td>
            <td><?php echo $row['k']; ?></td>
            <td><?php echo $row['s']; ?></td>
         </tr>
         <tr>
            <td><?php echo $row['n_rate']; ?></td>
            <td><?php echo $row['p_rate']; ?></td>
            <td><?php echo $row['k_rate']; ?></td>
            <td><?php echo $row['s_rate']; ?></td>
         </tr>
         </tr>
         <tr>
            <td>3</td>
            <td>Endgame</td>
            <td>1500</td>
            <td>Beginner</td>
         </tr>
      </tbody>
   </table>

   <div>

      <p>Lorem ipsum dolor sit amet <span class="classic">adipisicing elit</span>. Aspernatur commodi mollitia ratione perferendis maiores laborum officiis, corporis itaque alias laudantium ipsam veniam temporibus neque atque dolorum dolor consequatur eum aliquam.</p>

      <br>
      <iframe width=600 height=371 src="https://lichess.org/study/embed/mpRiqnBB/RfoKNU4I#0" frameborder=0></iframe>
   </div>
   <br>


   </section>
   <section>
      <h2>Section</h2>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex sed similique inventore, asperiores odio dignissimos illum ducimus a nesciunt eligendi impedit mollitia pariatur dolorum et, tenetur, explicabo reprehenderit placeat tempore!</p>
   </section>

   <section>
      <section>
         <h5>Heading 5</h5>
         <h3>Heading 3</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae laboriosam voluptas cupiditate qui quis facilis similique, quaerat nam, voluptatibus nisi natus beatae deleniti. Adipisci eum sequi ab eligendi velit quod.</p>
      </section>
   </section>
   <br>
   <form class="index-form" action="delete.php" method="post">
      <a href="index.php">
         < Back</a>
            <?php if ($_SESSION['Access'] == "administrator") { ?>
               <a href="edit.php?ID=<?php echo $row['id']; ?>">Edit</a>
            <?php } ?>

            <?php if ($_SESSION['Access'] == "administrator") { ?>
               <button type="submit" name="delete">Delete</button>
            <?php } ?>

            <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
   </form>
   <br>
   <footer class="footer"><small>&copy; <a href="./landing.html">Grow Soils</a></small></footer>

</body>

</html>