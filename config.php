<?php 
    /*if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'config.php';
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

    }
     
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];*/

    $con = new mysqli("localhost", "root", "" ,"registration");
    if(!$con){
        die(mysqli_error($con));
    }
    /*
    $listing = new mysqli("localhost", "root", "" ,"houseowner");
    if(!$listing){
        die(mysqli_error($listing));
    }
       // echo "connection succeful";
      /* $sql = "insert into `users`(FirstName,LatstName,Username,Email,Password) values('$firstname','$lastname','$username','$email','$password')";
       $result = mysqli_query($con, $sql);
       if($result){
        header("Location: log-in.html");
       }else {
        die(mysqli_error($con));

       }


    }else {
        die(mysqli_error($con));
    }*/
    /*if($con -> connect_error){
        die('Connecton Failed : ' .$con->connect_error);
    }
        else {
            $stmt = $con->prepare("insert into users(Firstname, Lastname, Username, Email, Password) values (?,?,?,?,?)");
            $stmt->bind_param("ssssi", $firstname, $lastname,$username,$email,$password);
            $stmt->execute();
            echo "registration succesfully";
            $stmt->close();
            $con->close();
        }*/


?>