<?php 

session_start();
include('includes/dbConnect.php');


$id = $_SESSION['id'];
if(isset($_SESSION['user'])){
    $query = "SELECT * FROM `cholera_alert` WHERE created_by = '$id' AND status = '2'";
    $result = $conn->query($query);
}
else {
    $query = "SELECT * FROM `cholera_alert` WHERE status = '2'";

    $result = $conn->query($query);

}
if(isset($_SESSION['username']) && isset($_SESSION['loggedin'])){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
      <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font-awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Box icons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom css -->
    <link rel="stylesheet" href="css/style.css">

    <title>Cholera Alert Reporting</title>
</head>
<body>
    <div class="wrapper">
        <header class="top-header">
            <nav class="navbar navbar-light">
        
                <div class="logo">
                    <a class="navbar-brand logo" href="">
                        Cholera Alert
                    </a>
                </div>
        
                <div class="nav-collapse show-nav" id="nav-collapse">
                    <ul class="mynav">
                        <li class="nav-item">
                            <a class="nav-link" href="http://">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://">Contact</a>
                        </li>
                        <li class="nav-item left">
                            <a class="btn btn-secondary" class="nav-link" href="includes/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
        
                <button class="nav-toggle">
                    <div class="tog-div" id="tog-div">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAA
                            NSUhEUgAAABgAAAAYCAYAAADgdz34AAABLklEQVRIS5VWiw4D
                            IQjT//9oF8Uhjxa9S7ZMBwptgevNPb21NvzWWsk++1cdgsFczs/6
                            7gMfkQ+1O+Iovvk5F2iMwega8t1RMgg56rmamRhAoKyx5nEc5y+P
                            e0BAfAobAE0MOfnDnCDWjI+Tq0KkW30MyBiLNOPpYBeIVAbLegviUZ
                            pYPJZVe1AhykB4QbvjTEnO3NYXF9qLuoShFdqAMrPVapM7lWwkPDwlWK
                            aFjeM1FNoKZF8QSH6pao39GF8rGRYa625gP1TyVz5qqiaMCCLcHa8Q4b
                            rJvch2XnYo64aWg62CnEFrg9VE1j6ECLSKT80H9wbWdCEHVjk19KxfgX
                            nAutDLBTCn3d4RB268sMYASyFEM5fwAuachzucqWkIlxPtKO//6hByYq8
                            U+5ofceafIGNKFE4AAAAASUVORK5CYII=" />
                    </div>
                </button>
        
            </nav>
        </header>
        
        <!-- Sidbar -->
        <aside>
            <div class="sidebar">
                <div class="aside_logo">
                    <div class="image-aside">
                        <img class="aside-image" src="images/logo/Report-cholera-logos.jpeg" alt="cholera alert logo">
                        Cholera
                    </div>
                    <div class="menu">
                        <i class='bx bx-menu'></i>
                    </div>
                </div>
                <div class="list">
                    <ul>
                        <li class="aside-list-item">
                            <i class='bx bxs-dashboard'></i>
                            <a href="index.php" class="aside-link">Dashboard</a>
                        </li>
                        <li class="aside-list-item" id="btn_Create">
                            <i class='bx bx-pencil'></i>
                            <a href="" class="aside-link">Create Alert</a>
                        </li>
                        <li class="aside-list-item active">
                            <i class='bx bx-folder-open'></i>
                            <a href="allAlerts.php" class="aside-link">All Alerts</a>
                        </li>
                        <li class="aside-list-item">
                            <i class='bx bx-user'></i>
                            <a href="" class="aside-link">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <div class="main-content">
           <div class="container-fluid">
               <div class="row table_row">
                <h4 style="padding: 1rem;">Approved alerts</h4>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <!-- <th scope="col">#</th> -->
                            <th scope="col">Id</th>
                            <th scope="col">Region</th>
                            <th scope="col">Village</th>
                            <th scope="col">Total Cases</th>
                            <th scope="col">Total Deaths</th>
                            <th scope="col">Date Reported</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i =0;
                            while($row =$result->fetch_Assoc())
                            {
                                $i++;
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row['region'] ?></td>
                            <td><?php echo $row['village'] ?></td>
                            <td><?php echo $row['total_cases'] ?></td>
                            <td><?php echo $row['total_deaths'] ?></td>
                            <td><?php echo $row['date_reported'] ?></td>
                            <td>
                                <?php

                                    $status = $row['status'];
                                    // echo $status; exit();
                                    $sql = "SELECT * FROM `report_status` WHERE id = '$status'";
                                    $res = $conn->query($sql) or die($conn->error);
                                    
                                    while ($rows =  $res->fetch_Assoc()){
                                        echo $rows['stat'];
                                    }
                                    
                                    // echo $status; 
                                    // switch($status){
                                    //     case 1: 
                                    //         echo "Awaiting Approval";

                                    //     case 2: 
                                    //         echo "Approved";
                                        
                                    //     default: 
                                    //         echo 'Rejected';
                                            
                                    // }
                                    // $status;
                                ?>
                            </td>
                            
                            <td class="action">
                                <!-- <div class="edit"><a href="editAlert.php?id=<?=$row['id']; ?>" id="btnEdit"><i class="fa fa-pencil" aria-hidden="true"></i></a></div> -->
                                <div class="view"><a href="viewAlert.php?id=<?=$row['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
               </div>

            <!-- modal -->
            <div class="row">
                <div class="report-modal" id="alert_modal">
                    <div class="modal-content col-md-6">
                        <div class="modal-header">
                            <span class="exit-modal" id="exit-modal">
                                &times;
                            </span>
                        </div>
                        <form action="createAlert.php" method="post">
                            <div class="modal-body">
                                <div class="row p-2 form-group">
                                    <label for="region"> Region <br>
                                        <input list="regions" class="form-control" type="text" name="region" id="area_region">
                                        <datalist id="regions">
                                            <option value="Nairobi">
                                            <option value="Nyanza">
                                            <option value="Western">
                                            <option value="Eastern">
                                            <option value="Coast">
                                            <option value="Central">
                                            <option value="NorthEastern">
                                            <option value="Rift Valley">
                                        </datalist>
                                    </label>
                                </div>
            
                                <div class="row p-2 form-group">
                                    <label for="district"> Area District <br>
                                        <input class="form-control" type="text" name="district" id="area_district">
                                    </label>
                                </div>
            
                                <div class="row p-2 form-group">
                                    <label for="village"> Village <br>
                                        <input class="form-control" type="text" name="village" id="area_village">
                                    </label>
                                </div>
            
                                <div class="row p-2">
                                    <label for="total_cases">Total Cases Reported <br>
                                        <input class="form-control" type="number" name="total_cases" id="total-cases">
                                    </label>
                                </div>
            
                                <div class="row p-2 form-group">
                                    <div class="col-md-4">
                                        <label for="below_5">Below 5 Years</label>
                                        <input class="form-control" type="number" name="below_5" id="below_5" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="above_5">Above 5 Years</label>
                                        <input class="form-control" type="number" name="above_5" id="above_5" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Adult">No. Adults</label>
                                        <input class="form-control" type="number" name="adult" id="adults" required>
                                    </div>
                                </div>
            
                                <div class="row p-2">
                                    <label for="total_deaths">Total Deaths <br>
                                        <input class="form-control" type="number" name="total_deaths" id="total-deaths">
                                    </label>
                                </div>
            
                                <div class="row p-2 form-group">
                                    <label for="created_at">
                                        <input class="form-control" type="text" name="created_at" id="created_at"
                                            value="<?php echo $currentDate; ?>" hidden>
                                    </label>
                                </div>
            
                                <div class="row p-2 form-group">
                                    <label for="date_reported">Date first Case reported <br>
                                        <input class="form-control" type="date" name="date_reported" id="date_reported">
                                    </label>
                                </div>
            
                                <div class="row p-2 form-group">
                                    <label for="submitted_by">
                                        <input class="form-control" type="text" name="submitted_by" id="submitted_by" hidden>
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" id="save">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

           </div>
        </div>
    </div>
</body>

    <!-- Custom Javascript -->
    <script src="js/index.js"></script>
</html>

<?php
    }
    else{
        echo 'Failed. Not logged in';
        header('Location: login.php');
    }
?>