<?php
require('includes/dbConnect.php');

if(isset($_POST['id'])){

    $id = $_POST['id'];
    // echo $id; exit();
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

    echo "I am here by now".'<br>';

    $query = "UPDATE `cholera_alert` SET region='$region', district='$district', village='$village', 
            total_cases='$totalCases', below_5='$below_5', above_5='$above_5', adults = '$adult', 
            total_deaths = '$totalDeaths', date_created='$createdAt',date_reported='$dateReported' WHERE id = '$id'";

    print_r($query);

    echo "and here also  by now".'<br>';

    if ($conn->query($query)){
            
        $_SESSION['success'] = array('Alert edited successfully.');
        header('Location: allAlerts.php');
    
    }
    else{
        $_SESSION['errors'] = array('Failed to iedit the alert.');
        
    }

}
else{
    echo "failed";
}
?>