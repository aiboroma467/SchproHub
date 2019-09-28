<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
// code for Inactive  customer    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$email=0;
$sql = "update neworder set EmailId=:email  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':email',$email, PDO::PARAM_STR);
$query -> execute();
header('location:managecustomer.php');
}



//code for active customer
if(isset($_GET['id']))
{
$id=$_GET['id'];
$email=1;
$sql = "update neworder set EmailId=:email  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':email',$email, PDO::PARAM_STR);
$query -> execute();
header('location:managecustomer.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Manage Customer</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

            
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
<style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body>
       <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Manage Customer</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Customer Info</span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th>Sr no</th>
                                            
                                            <th>Full Name</th>
                                            
											<th>Email</th>
											<th>Department</th>
											<th>PhoneNumber</th>
                                             
                                             <th>Reg Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php $sql = "SELECT id,FirstName,LastName,EmailId,Department,Topic,Services,Budget,Status,Phonenumber,OrderDate from neworder";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                        <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <!--<td><?php //echo htmlentities($result->EmpId);?></td>-->
                                            <td><?php echo htmlentities($result->FirstName);?>&nbsp;<?php echo htmlentities($result->LastName);?></td>
                                            
											<td><?php echo htmlentities($result->EmailId);?></td>
											<td><?php echo htmlentities($result->Department);?></td>
											<td><?php echo htmlentities($result->Phonenumber);?></td>
											
                                             <!--<td><?php $stats=$result->EmailId;
if($stats){
                                             ?>
                                                 <a class="waves-effect waves-green btn-flat m-b-xs">Active</a>
                                                 <?php } else { ?>
                                                 <a class="waves-effect waves-red btn-flat m-b-xs">Inactive</a>
                                                 <?php } ?>


                                             </td>-->
                                              <td><?php echo htmlentities($result->OrderDate);?></td>
                                            <td><a href="editcustomer.php?empid=<?php echo htmlentities($result->id);?>"><i class="material-icons">mode_edit</i></a>
                                        <?php if($result->Status==1)
 {?>
<a href="managecustomer.php?inid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to inactive this Customer?');"" > <i class="material-icons" title="Inactive">clear</i>
<?php } else {?>

                                            <a href="managecustomer.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to active this Customer?');""><i class="material-icons" title="Active">done</i>
                                            <?php } ?> </td>
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
         
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
        
    </body>
</html>
<?php } ?>