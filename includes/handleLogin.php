<?php
    require('dbConnect.php');
    session_start();
    

    if(isset($_POST['username'])){
        $username =  stripcslashes($_POST['username']);
        $username = mysqli_escape_string($conn, $username);
        $password =  stripslashes($_POST['password']);
        $password = mysqli_escape_string($conn, $password);

        $sql = "SELECT * from `zeta_users` WHERE Email = '$username' and Password = '$password'";

        $result = $conn->query($sql) or die(mysqli_error());
        $rows = mysqli_num_rows($result);

        if($rows == 1){
            $row = $result->fetch_Assoc(); 
            $_SESSION['user_type'] = $row['user-type'];
            $_SESSION['id'] = $row['user_id'];
            // echo $_SESSION['user_type']; exit();
            

            if($_SESSION['user_type'] == 1){

                $_SESSION['admin'] = $_SESSION['user_type'];
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                // echo "Yes you are the adminsssss".$_SESSION['admin']; exit();
            }
            else{
                $_SESSION['user'] = $_SESSION['user_type'];
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                echo "Yes you are the mormal user ".$_SESSION['user'].'<br>';
                echo $_SESSION['id']; 
                // exit();
            }
            
            header('Location: ../index.php');
        }

        else{
            $_SESSION['errors'] = array('Wrong username or password hehe');
            header('Location: ../login.php');

            // $_SESSION['errors']  = "";
        }
    }
    else{
        echo "Failed to post at Isset post";
    }

?>