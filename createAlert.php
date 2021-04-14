<?php

include('includes/dbConnect.php');
session_start();


if(isset($_POST['region'])){
    echo "Yessssssssssssss am here". '<br>';
    
    $status = 1;
    $user =  $_SESSION['username'];

    $sqlUser = "SELECT * from `zeta_users` WHERE Email = '$user'";
    $result = $conn->query($sqlUser);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $userLoggedIn = $row['user_id'];
            echo "Logged in as: ".$userLoggedIn.'<br>';

            $region = stripcslashes($_POST['region']);
            $district = stripcslashes($_POST['district']);
            $village = stripcslashes($_POST['village']);
            $totalCases = stripcslashes($_POST['total_cases']);
            $below_5 = stripcslashes($_POST['below_5']);
            $above_5 = stripcslashes($_POST['above_5']);
            $adult = stripcslashes($_POST['adult']);
            $totalDeaths = stripcslashes($_POST['total_deaths']);
            $createdAt = stripcslashes($_POST['created_at']);
            $dateReported = stripcslashes($_POST['date_reported']);
            // $submittedBy = stripcslashes($_POST['submitted_by']);


            $sql = "INSERT INTO `cholera_alert` (id, region, district, 
                village, total_cases,below_5, above_5, adults, total_deaths, 
                date_created, date_reported, status, created_by) 
                VALUES(null, '$region', '$district', '$village', '$totalCases', 
                '$below_5', '$above_5', '$adult', '$totalDeaths', '$createdAt', 
                '$dateReported','$status', '$userLoggedIn'
            )";


            if ($conn->query($sql)){
                
                $_SESSION['success'] = array('Alert Created successfully.');
                header('Location: index.php');
            
            }
            else{
                $_SESSION['errors'] = array('Failed to insert the record.');
                
            }
        }

}

?>