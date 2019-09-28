<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['emplogin'])==0)
    {   
header('location:index.php');
}
else{
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Vendor | Dashboard</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">

        	
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
           <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>

            <main class="mn-inner">
                <div class="">
                    <div class="row">
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                            
                                <span class="card-title">Total Vendors</span>
                                <span class="stats-counter">
<?php
$sql = "SELECT id from tblemployees";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$empcount=$query->rowCount();
?>

                                    <span class="counter"><?php echo htmlentities($empcount);?></span></span>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                    </div>
                        <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                            
                                <span class="card-title">Total Uploaded Projects </span>
    <?php
$sql = "SELECT id from tbluploadproject";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$dptcount=$query->rowCount();
?>                            
                                <span class="stats-counter"><span class="counter"><?php echo htmlentities($dptcount);?></span></span>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <span class="card-title">Total Customers</span>
                                    <?php
$sql = "SELECT id from  tblleavetype";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$leavtypcount=$query->rowCount();
?>   
                                <span class="stats-counter"><span class="counter"><?php echo htmlentities($leavtypcount);?></span></span>
                      
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                
				
				  <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <span class="card-title">Total Approved Projects</span>
                                    <?php
$sql = "SELECT Status from  tbluploadproject where Status=1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$approvedprojectcount=$query->rowCount();
?>   
                                <span class="stats-counter"><span class="counter"><?php echo htmlentities($approvedprojectcount);?></span></span>
                      
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
					
					  <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <span class="card-title">Total Not Approved Projects</span>
                                    <?php
$sql = "SELECT Status from  tbluploadproject where Status=0";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$approvedprojectcount=$query->rowCount();
?>   
                                <span class="stats-counter"><span class="counter"><?php echo htmlentities($approvedprojectcount);?></span></span>
                      
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <span class="card-title">Total Completed Projects</span>
                                    <?php
$sql = "SELECT Status from  tbluploadproject where Status=0";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$approvedprojectcount=$query->rowCount();
?>   
                                <span class="stats-counter"><span class="counter"><?php echo htmlentities($approvedprojectcount);?></span></span>
                      
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <span class="card-title">Total Ongoing Project</span>
                                    <?php
$sql = "SELECT id from  tblleavetype";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$leavtypcount=$query->rowCount();
?>   
                                <span class="stats-counter"><span class="counter"><?php echo htmlentities($leavtypcount);?></span></span>
                      
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
					
					
				
				</div>
                 
                    <div class="row">
					
                        <div class="col s12 m12 l12">
                            <div class="card invoices-card">
                                <div class="card-content">
                                 
                                    <span class="card-title">Latest Upload Projects</span>
                             <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="100">Vendor Name</th>
                                            <th>Department</th>
											<!--<th>Topic</th>-->
                                            <th>Category</th>
											<th >Price</th>
                                            <th >Admin Price</th>

                                             <th >Posting Date</th>                 
                                            <th>Status</th>
                                            <th align="center">Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php $sql = "SELECT tbluploadproject.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tbluploadproject.Department,tbluploadproject.Topic,tbluploadproject.Category, tbluploadproject.Price, tbluploadproject.PostingDate,tbluploadproject.AdminPrice,tbluploadproject.Status from tbluploadproject join tblemployees on tbluploadproject.empid=tblemployees.id order by lid desc limit 6";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>  

                                        <tr>
                                            <td> <b><?php echo htmlentities($cnt);?></b></td>
                                              <td><a href="editemployee.php?empid=<?php echo htmlentities($result->id);?>" target="_blank"><?php echo htmlentities($result->FirstName." ".$result->LastName);?></a></td>
                                            <td><?php echo htmlentities($result->Department);?></td>
											<!--<td><?php echo htmlentities($result->Topic);?></td>-->
                                            <td><?php echo htmlentities($result->Category);?></td>
											 <td><?php echo htmlentities($result->Price);?></td>
                                           <td><?php echo htmlentities($result->AdminPrice);?></td>
										   <td><?php echo htmlentities($result->PostingDate);?></td>
                                                                       <td><?php $stats=$result->Status;
if($stats==1){
                                             ?>
                                                 <span style="color: green">Approved</span>
                                                 <?php } if($stats==2)  { ?>
                                                <span style="color: red">Not Approved</span>
                                                 <?php } if($stats==0)  { ?>
 <span style="color: blue">waiting for approval</span>
 <?php } ?>


                                             </td>

          <td>
           <td><a href="project-details.php?leaveid=<?php echo htmlentities($result->lid);?>" class="waves-effect waves-light btn blue m-b-xs"  > View Details</a></td>
                                    </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </main>
          
        </div>

        
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/plugins/chart.js/chart.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/dashboard.js"></script>
        
    </body>
</html>
<?php } ?>