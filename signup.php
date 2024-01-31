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
    <div class="container my-5">
        <?php
        
        if(isset($_POST["submit"])){
            $name=$_POST["name"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            // $id=$_POST["id"];
            $errors=array();
            if(empty($name) OR empty($email) OR empty($password)){
                    array_push($errors,"All fields are required");
            }
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                array_push($errors,"Email is not valid");
            }
            if(count($errors)>0){
                foreach ($errors as $error){

                   echo" <div class='alert alert-danger' role='alert'>
                       $error
                    </div>";
                    
                    
                }
            }
            else{
                include 'connect.php';
              $sql=  "INSERT INTO userdata(name,email,password)
                values('$name','$email','$password')";
                $result=mysqli_query($link,$sql);
                if($result){
                    header('location:login.php');
                    
                }
                else{
                    die(mysqli_error($link));
    };
            }
            
        }
        ?>
        <form action="" method="post" >
        <div class="form-group" >
                <label for="name">Name:</label>
                <input type="text"
                 class="form-control"  
                 placeholder="Enter your name"
                 name="name"
                 autocomplete="off">
                
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email"
                class="form-control" 
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
             name="submit">sign up</button>
        </form>
    </div>
</body>
</html>