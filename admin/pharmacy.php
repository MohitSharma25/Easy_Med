<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>eASY MED</title>
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
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");

    
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
                                    <p class="profile-title">Administrator</p>
                                    <p class="profile-subtitle">admin@edoc.com</p>
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
                    <td class="menu-active" >
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td>
                        <a href="doctors.php" class="non-style-link-menu "><div><p class="menu-text">Doctors</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Schedule</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td>
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">Appointment</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="patient.php" class="non-style-link-menu"><div><p class="menu-text">Patients</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="pharmacy.php" class="non-style-link-menu"><div><p class="menu-text">Medicines</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="donation.php" class="non-style-link-menu"><div><p class="menu-text">Donation</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="transplant.php" class="non-style-link-menu"><div><p class="menu-text">Transplant</p></a></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                <tr>
                    <td colspan="2" class="nav-bar" >
                        <form action="medicine.php" method="post" class="header-search">
                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Medicine Name" list="doctors">&nbsp;&nbsp;
                                    
                            <?php
                            echo '<datalist id="medicine">';

                            include("db.php");

                            $list11 = $co->query("select name from medicine");
        
                            for ($y=0;$y<$list11->num_rows;$y++){
                                $row00=$list11->fetch_assoc();
                                $d=$row00["name"];
                                echo "<option value='$d'><br/>";
                            };
        
                            echo ' </datalist>';
                            ?>
                                
                               
                            <input type="Submit" value="Search" class="login-btn btn-primary-soft btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                                
                        </form>    
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
                   <td colspan="2" >
                       <center>
                        <div class="abc scroll">
                        <table width="93%" class="sub-table scrolldown" border="0" cellpadding="10px"><br><br><br><br>
                        <thead>
                        <tr>
                                <th class="table-headin">
                                 Name
                                </th>
                                <th class="table-headin">
                                    Category
                                </th>
                                <th class="table-headin">
                                    Description
                                </th>
                                <th class="table-headin">
                                    Quantity
                                </th>
                                <th class="table-headin">
                                    Price per piece
                                </th>
                                <th class="table-headin">
                                    Update
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php

                                include("db.php");
                                $sqlmain="select * from medicine order by name asc";
                                $result= $co->query($sqlmain);

                                    while($row=mysqli_fetch_array($result)){
                                    echo"
                                    <tbody>
                                    <tr>
                                        <td style='text-align:center'>".$row['name']."</td>
                                        <td style='text-align:center'>".$row['category']."</td>
                                        <td style='text-align:center'>".$row['description']."</td>
                                        <td style='text-align:center'>".$row['qty']."</td>
                                        <td style='text-align:center'>".$row['price']."</td>
                                        <td style='text-align:center'><a href='update-medicine.php?id=".$row['id']."'>edit</a></td>
                                    </tr>
                                    </tbody>";
                                    }
                                 
                            ?>
 
                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
                
            </table>
        </div>
    </div>


</body>
</html>4