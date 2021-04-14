<?php 

session_start();
include('includes/dbConnect.php');

$id = $_GET['id'];

// current date
date_default_timezone_set('UTC');
$currentDate = date('Y-m-d h:i');

if(isset($_SESSION['user'])){

    $user_id = $_SESSION['id'];
    $query = "SELECT * FROM `cholera_alert` WHERE `id`  = '$id' AND `created_by` = '$user_id' ";
    $result = $conn->query($query);
    // print_r($query); exit();
}
else {
    // $user_id = $_SESSION['id'];
    // $user = "SELECT * FROM `zeta_users` WHERE ID  = '$id'";
    $query = "SELECT * FROM `cholera_alert` WHERE id  = '$id'";
    $result = $conn->query($query);

}
if(isset($_SESSION['username']) && isset($_SESSION['loggedin'])){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd/td=device-widtd/td, initial-scale=1.0">
    
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
              <div style="background-color: #ffff; padding:1rem" class="row view_alert">
                  
                  <table class="table table-bordered">
                      <?php 
                      while($row = $result->fetch_Assoc()){
                      ?>
                        <tr>
                            <th scope="row">Report ID</th>
                            <th scope="row"><?php echo $row['id']; ?></th>
                        </tr>
                        <tr>
                            <td>Region</td>
                            <td><?php echo $row['region']; ?></td>
                        </tr>
                        <tr>
                            <td>Village</td>
                            <td><?php echo $row['village']; ?></td>
                        </tr>
                        <tr>
                            <td>Total Cases </td>
                            <td><?php echo $row['total_cases']; ?></td>
                        </tr>
                        <tr>
                            <td>Below 5 Years</td>
                            <td><?php echo $row['below_5']; ?></td>
                        </tr>
                        <tr>
                            <td>Above 5 Years</td>
                            <td><?php echo $row['above_5']; ?></td>
                        </tr>
                        <tr>
                            <td>Adults</td>
                            <td><?php echo $row['adults']; ?></td>
                        </tr>
                        <tr>
                            <td>Total Deaths </td>
                            <td><?php echo $row['total_deaths']; ?></td>
                        </tr>
                        <tr>
                            <td>Report Created At</td>
                            <td><?php echo $row['date_created']; ?></td>
                        </tr>
                        <tr>
                            <td>Date Reported </td>
                            <td><?php echo $row['date_reported']; ?></td>
                        </tr>
                        <tr>
                            <td>Submitted By </td>
                            <td><?php echo $row['created_by']; ?></td>
                        </tr>
                        <?php 
                        if(isset($_SESSION['admin']))
                        { ?>
                        <tr>
                            <td colspan="2">
                                <div style="padding: 1rem;" class="row approve-form">
                                    <form action="approve.php?id=<?=$row['id']; ?>" method="post">
                                        <div class="id form-group">
                                            <input type="text" name="id" id="id" value="<?php echo $id; ?>" hidden>
                                        </div>
                                        <div class="row input-group approve p-3">
                                            <label for="approve"> <strong>Approve Alert</strong>
                                                <select class="form-control" name="approve" id="approve">
                                                    <?php
                                                                $sql =  "SELECT * FROM `report_status`";
                                                                $results = $conn->query($sql);
                                
                                                                while($rows = $results->fetch_Assoc())
                                                                {
                                                                ?>
                                                    <option value="<?php echo $rows['id']; ?>">
                                                        <?php echo $rows['stat']; ?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </label>
                                        </div>
                                        <divv class="row input-group p-3">
                                            <div class="modal-footer ">
                                                <button class="btn btn-primary">Approve</button>
                                            </div>
                                        </divv>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
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
                        <form action="createAlert.php" metd/tdod="post">
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
                                            <option value="Nortd/tdEastern">
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
                                    <label for="total_deatd/tds">Total Deatd/tds <br>
                                        <input class="form-control" type="number" name="total_deatd/tds" id="total-deatd/tds">
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
        header('Location: index.php');
    }
?>