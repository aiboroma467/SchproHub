<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
// code for not approved  project    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$status=0;
$sql = "update tbluploadproject set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:manageproject.php');
}



//code for approved project
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = "update tbluploadproject set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:manageproject.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Manage Project</title>
        
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
                        <div class="page-title">Manage Project</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Project Info</span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
										<th>S/N</th>
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
{               ?>  
                                        <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <!--<td><?php //echo htmlentities($result->EmpId);?></td>-->
                                            <td><?php echo htmlentities($result->FirstName);?>&nbsp;<?php echo htmlentities($result->LastName);?></td>
                                            
											<td><?php echo htmlentities($result->Department);?></td>
											<!--<td><?php echo htmlentities($result->Topic);?></td>-->
                                            <td><?php echo htmlentities($result->Category);?></td>
											 <td><?php echo htmlentities($result->Price);?></td>
                                           <td><?php echo htmlentities($result->AdminPrice);?></td>
										   <td><?php echo htmlentities($result->PostingDate);?></td>
                                             <td><?php $stats=$result->Status;
if($stats){
                                             ?>
                                                 <a class="waves-effect waves-green btn-flat m-b-xs">Approved</a>
                                                 <?php } else { ?>
                                                 <a class="waves-effect waves-red btn-flat m-b-xs">Not Approved</a>
                                                 <?php } ?>


                                             </td>
                                              <td><?php echo htmlentities($result->RegDate);?></td>
                                            <td><a href="editproject.php?empid=<?php echo htmlentities($result->id);?>"><i class="material-icons">mode_edit</i></a>
                                        <?php if($result->Status==1)
 {?>
<a href="manageproject.php?inid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to reject this project?');"" > <i class="material-icons" title="Not Approved">clear</i>
<?php } else {?>

                                            <a href="manageproject.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to approved this project?');""><i class="material-icons" title="Approved">done</i>
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