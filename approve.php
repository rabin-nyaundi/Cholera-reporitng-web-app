<?php
    include('includes/dbConnect.php');

    if(isset($_POST['approve'])){

        $id = $_GET['id'];

        $status = stripcslashes($_POST['approve']);
        echo "Success".$status;

        $sql = "UPDATE `cholera_alert` SET status='$status' WHERE id = '$id'";
        print_r($sql); 
        if ($conn->query($sql)){
        
            $_SESSION['success'] = array('Alert approved successfully.');
            header('Location: index.php');
        
        }
        else{
            echo "Failed";
            
        }
    }else{
        echo "Failed";
    }
?>