<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>


<?php
session_start();
include 'connect.php';
if (!isset($_SESSION['id'])) {         
    header('location: login.php'); 
      
  }
  ?>
<div class="container col-12 border rounded mt-3">
  <h1 class=" mt-3 text-center">Welcome, This your dashboard!! </h1>
  <hr>
  <h4> <?php echo $_SESSION['name']; ?> </h4>

  <table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      
        <td> <?php echo $_SESSION['id']; ?></td>
        <td> <?php echo $_SESSION['name']; ?></td>
        <td> <?php echo $_SESSION['email']; ?></td>
      </tr>
    </tbody>
  </table>

  <form action="" method="post">
    <button type="submit" name='signout' class=" btn btn-warning mb-3"> Sign Out</button>
  </form>
</div>
<?php
if (isset($_POST['signout'])) {
  session_destroy();            
  header('location: signup.php');
}
?>



</body>
</html>





