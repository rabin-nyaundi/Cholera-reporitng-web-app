<?php 

include('includes/dbConnect.php');
include('createAlert.php');

date_default_timezone_set('UTC');
$currentDate = date('Y-m-d h:i');

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
                            <a class="nav-link" href="http://"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://"></a>
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
                        <?php echo $_SESSION['username']; ?>
                    </div>
                    <div class="menu">
                        <i class='bx bx-menu'></i>
                    </div>
                </div>
                <div class="list">
                    <ul>
                        <li class="aside-list-item active">
                            <i class='bx bxs-dashboard'></i>
                            <a href="index.php" class="aside-link">Dashboard</a>
                        </li>
                        <li class="aside-list-item" id="btn_Create">
                            <i class='bx bx-pencil'></i>
                            <a class="aside-link">Create Alert</a>
                        </li>
                        <li class="aside-list-item">
                            <i class='bx bx-folder-open'></i>
                            <a href="allAlerts.php" class="aside-link">All Alerts</a>
                        </li>
                        <li class="aside-list-item">
                            <i class='bx bx-user'></i>
                            <a href="profile.php" class="aside-link">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <div class="main-content">
           <div class="container-fluid">
               <div class="row text-center">
                    <div class="col-md-3 boxdiv" id="btnCreate">
                        <div class="box-alert">
                            <div class="icon">
                                <i class='bx bx-pencil'></i>
                                <strong>Create Alert</strong>
                            </div>
                        </div>
                        <div class="text">
                            <strong>More info</strong>
                            <i class='bx bxs-right-arrow-circle'></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <a href="allAlerts.php">
                            <div class="box-alert">
                                <div class="icon">
                                    <i class='bx bx-folder-open'></i>
                                    <strong>All Alerts</strong>
                                </div>
                            </div>
                            <div class="text">
                                <strong>More Info</strong>
                                <i class='bx bxs-right-arrow-circle'></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="dispatched.php">
                            <div class="box-alert">
                                <div class="icon">
                                    <i class='bx bx-calendar-check'></i>
                                    <strong>Dispatched</strong>
                                </div>
                            </div>
                            <div class="text">
                                <strong>More Info</strong>
                                <i class='bx bxs-right-arrow-circle'></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3" id="open_modal">
                        <a href="profile.php">
                            <div class="box-alert">
                            <div class="icon">
                                <i class='bx bx-user'></i>
                                <strong>Profile</strong>
                            </div>
                        </div>
                        <div class="text">
                            <strong>More Info</strong>
                            <i class='bx bxs-right-arrow-circle'></i>
                        </div>
                        </a>
                    </div>
               </div>
               <!-- Alert -->
               <div class="row alert">
                <?php if(isset($_SESSION['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php foreach($_SESSION['success'] as $success) : ?>
                    <strong>
                        <?php echo $success ?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
               </div>
               <!-- modal -->
               <div class="row">
                   <div class="report-modal" id="rep_modal">
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
                                            <input list="regions" class="form-control" type="text" name="region" id="area_region" required>
                                            <datalist id="regions">
                                                <option value='Baringo'>Baringo</option>
                                                <option value='Bomet'>Bomet</option>
                                                <option value='Bungoma'>Bungoma</option>
                                                <option value='Busia'>Busia</option>
                                                <option value='Elgeyo-Marakwet'>Elgeyo-Marakwet</option>
                                                <option value='Embu'>Embu</option>
                                                <option value='Garissa'>Garissa</option>
                                                <option value='Homa Bay'>Homa Bay</option>
                                                <option value='Isiolo'>Isiolo</option>
                                                <option value='Kajiado'>Kajiado</option>
                                                <option value='Kakamega'>Kakamega</option>
                                                <option value='Kericho'>Kericho</option>
                                                <option value='Kiambu'>Kiambu</option>
                                                <option value='Kilifi'>Kilifi</option>
                                                <option value='Kirinyaga'>Kirinyaga</option>
                                                <option value='Kisii'>Kisii</option>
                                                <option value='Kisumu'>Kisumu</option>
                                                <option value='Kitui'>Kitui</option>
                                                <option value='Kwale'>Kwale</option>
                                                <option value='Laikipia'>Laikipia</option>
                                                <option value='Lamu'>Lamu</option>
                                                <option value='Machakos'>Machakos</option>
                                                <option value='Makueni'>Makueni</option>
                                                <option value='Mandera'>Mandera</option>
                                                <option value='Marsabit'>Marsabit</option>
                                                <option value='Meru'>Meru</option>
                                                <option value='Migori'>Migori</option>
                                                <option value='Mombasa'>Mombasa</option>
                                                <option value='Murang'a'>Murang'a</option>
                                                <option value='Nairobi City'>Nairobi City</option>
                                                <option value='Nakuru'>Nakuru</option>
                                                <option value='Nandi'>Nandi</option>
                                                <option value='Narok'>Narok</option>
                                                <option value='Nyamira'>Nyamira</option>
                                                <option value='Nyandarua'>Nyandarua</option>
                                                <option value='Nyeri'>Nyeri</option>
                                                <option value='Samburu'>Samburu</option>
                                                <option value='Siaya'>Siaya</option>
                                                <option value='Taita-Taveta'>Taita-Taveta</option>
                                                <option value='Tana River'>Tana River</option>
                                                <option value='Tharaka-Nithi'>Tharaka-Nithi</option>
                                                <option value='Trans Nzoia'>Trans Nzoia</option>
                                                <option value='Turkana'>Turkana</option>
                                                <option value='Uasin Gishu'>Uasin Gishu</option>
                                                <option value='Vihiga'>Vihiga</option>
                                                <option value='West Pokot'>West Pokot</option>
                                                <option value='wajir'>wajir</option>
                                            </datalist>
                                        </label>
                                    </div>
                                
                                    <div class="row p-2 form-group">
                                        <label for="district"> Area District <br>
                                            <input class="form-control" type="text" name="district" id="area_district" required>
                                        </label>
                                    </div>

                                    <div class="row p-2 form-group">
                                        <label for="village"> Village <br>
                                            <input class="form-control" type="text" name="village" id="area_village" required>
                                        </label>
                                    </div>
                                
                                    <div class="row p-2">
                                        <label for="total_cases">Total Cases Reported <br>
                                            <input class="form-control" type="number" name="total_cases" id="total-cases" required>
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
                                            <input class="form-control" type="number" name="total_deaths" id="total-deaths" required>
                                        </label>
                                    </div>

                                    <div class="row p-2 form-group">
                                        <label for="created_at">
                                            <input class="form-control" type="text" name="created_at" id="created_at" value="<?php echo $currentDate; ?>" hidden >
                                        </label>
                                    </div>
                                
                                    <div class="row p-2 form-group">
                                        <label for="date_reported">Date first Case reported <br>
                                            <input class="form-control" type="date" name="date_reported" id="date_reported" required>
                                        </label>
                                    </div>
                                    
                                    <div class="row p-2 form-group">
                                        <label for="submitted_by">
                                            <input class="form-control" type="text" name="submitted_by" id="submitted_by" hidden >
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

