<?php
include('config.php');
session_start();
if(isset($_GET['token'])){
   
   $token = $_GET['token'];
   $verify_query = "SELECT verify_token,verify_status FROM house_owners WHERE verify_token = '$token'";
   $verify_query_run = mysqli_query($con, $verify_query);
        if(mysqli_num_rows($verify_query_run) > 0){
            $row = mysqli_fetch_array($verify_query_run);
            //echo $row['verify_token'];
            if($row['verify_status'] == "0"){

                $clicked_token = $row['verify_token'];
                $update_query = "UPDATE house_owners SET verify_status = '1' WHERE verify_token = '$clicked_token'";
                $update_query_run = mysqli_query($con, $update_query);
                  if($update_query_run){

                    $_SESSION['status'] = "Your Account has been verified Successfully.!";
                    header("Location: listing-login.php");
                    exit(0);
    

                  }else{
                    $_SESSION['status'] = "Verification Failed";
                    header("Location: listing-login.php");
                    exit(0);
    

                  }


            }
            else{
                $_SESSION['status'] = "Email Already verified. Please Log in";
                header("Location: listing-login.php");
                exit(0);

            }

           
        }else {
            $_SESSION['status'] = "This token deos not Exists";
            header("Location: listing-login.php");
            exit(0);
        }

}else{

    $_SESSION['status'] = "Not Allowed";
    header("Location: listing-login.php");
    exit(0);

}

?> 