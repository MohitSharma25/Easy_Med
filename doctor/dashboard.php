<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Dashboard</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>


</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    
    

       //import database
       include("../connection.php");
       $userrow = $database->query("select * from doctor where docemail='$useremail'");
       $userfetch=$userrow->fetch_assoc();
       $userid= $userfetch["docid"];
       $username=$userfetch["docname"];
    //echo $userid;
    ?>
    <div class="container">
        <div class="menu">
        <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class=" menu-active" >
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td>
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Appointments</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td>
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">My Sessions</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="patient.php" class="non-style-link-menu"><div><p class="menu-text">My Patients</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="index1.php" class="non-style-link-menu"><div><p class="menu-text">Donation</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
                
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                <tr>    
                    <td colspan="1" class="nav-bar" >
                    <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Blood collection details</p>
                          
                    </td>
                    <td width="25%">

                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 
                        date_default_timezone_set('Asia/Kolkata');
        
                        $today = date('Y-m-d');
                        echo $today;
                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>
                </tr>
                
                <tr>
                     <td colspan="4">
                        
                        <center>
                        <table class="filter-container center" style="border: none;" border="0" >
                            <br><br><br><br>
                            <tr>
                                <td style="width: 25%; text-align:center; vertical-align:middle' " >
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:65%;display: flex">

                                        <div>
                                                <div class="h1-dashboard">
                                                    <a href="viewdonor.php"><?php include 'counter/dashboardcount.php';?></a>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Total Donor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                               
                                    </div>
                                </td>
                                <td style="width: 25%; text-align:center; vertical-align:middle' ">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:65%;display: flex;">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <a href="viewblood.php"><?php include 'counter/dashbloodcount.php';?></a>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Available Blood  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div> 
                                    </div>       
                                </td>
                            </tr>
                        </table>
                        </center>
                    </td>
                </tr>
                
            </table>
        </div>
    </div>


</body>
</html>
