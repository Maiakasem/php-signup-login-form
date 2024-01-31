<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>



<?php

include 'connect.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * from userdata WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        die('query Failed' . mysqli_error($link));
      }
      while ($row = mysqli_fetch_array($result)) {
        
        $user_id = $row['id'];
        $user_name = $row['name'];
        $user_email = $row['email'];
        $user_password = $row['password'];
      }
      if ($user_email == $email  &&  $user_password == $password) {
        session_start();
        $_SESSION['id'] = $user_id;       
        $_SESSION['name'] = $user_name;   
        $_SESSION['email'] = $user_email;
        header('location: dashboard.php?user_id=' . $user_id);
        // echo "hello";
    } else {
      header('location: login.php');
    // echo "hi";
    }
  }
  ?>

<div class="container my-5">
       
          <form  method="post" >
          <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email"
                 class="form-control" 
                 id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Enter your Email"
                name="email"
                autocomplete="off">
                
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password"  name="password" autocomplete="off"  class="form-control" placeholder="Enter your password">
                </div>
            <button type="submit"
             class="btn btn-primary"
             name="submit">log in</button>
        </form>
    </div>
</body>
</html>