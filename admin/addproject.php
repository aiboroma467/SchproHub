<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['apply'])){

if($_FILES['upload']['name'] != "") {

$file = $_FILES['upload'];
$file_name = $file['name'];
$file_temp = $file['tmp_name'];
$name = explode('.', $file_name);
$path = "files/".$file_name;

$empid=$_SESSION['eid'];
 $dept=$_POST['dept'];
$topic=$_POST['topic'];  
$cat=$_POST['cat'];
$price=$_POST['price'];
$abstract=$_POST['abstract'];  
//$file=$_POST['upload']; 
$status=0;
$isread=0;
/*if($fromdate > $todate){
                $error=" ToDate should be greater than FromDate ";
           }
		   */
$sql="INSERT INTO tbluploadproject(name,file,Department,Topic,Category,Price,Description,Status,IsRead,empid) VALUES( :name, :path,:dept,:topic,:cat,:price,:abstract,:status,:isread,:empid)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':path',$path,PDO::PARAM_STR);
$query->bindParam(':dept',$dept,PDO::PARAM_STR);
$query->bindParam(':topic',$topic,PDO::PARAM_STR);
$query->bindParam(':cat',$cat,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':abstract',$abstract,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Project uploaded successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
}
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Vendor | Upload Project</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
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
                        <div class="page-title">Upload Project</div>
                    </div>
                    <div class="col s12 m12 l8">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp" enctype="multipart/form-data">
                                    <div>
                                        <h3>Upload Project</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m12">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>


 <div class="input-field col m6 s12">
<select  name="dept" autocomplete="off">
<option value="">Department...</option>
<?php $sql = "SELECT DepartmentName from tbldepartments";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                                            
<option value="<?php echo htmlentities($result->DepartmentName);?>"><?php echo htmlentities($result->DepartmentName);?></option>
<?php }} ?>
</select>
</div>



<div class="input-field col m6 s12">
<label for="topic">Project Topic</label>
<input id="topic" name="topic" type="text" autocomplete="off" required>
</div>


<div class="input-field col m6 s12">
<select  name="cat" autocomplete="off">
<option value="">Category...</option>                                          
<option value="undergraduate">Undergraduate</option>
<option value="postgraduate">Postgraduate</option>  
</select>
</div>

<div class="input-field col m6 s12">
<select  name="price" autocomplete="off">
<option value="">Price...</option> 
<option value="250000">250000</option>
<option value="200000">200000</option>
<option value="150000">150000</option>
<option value="100000">100000</option>
<option value="70000">70000</option>
<option value="60000">60000</option>                                         
<option value="50000">50000</option>
<option value="30000">20000</option>
<option value="30000">30000</option>
<option value="20000">20000</option>
<option value="15000">15000</option>
<option value="0.00">0.00</option>  
</select>
</div>
   

 
<div class="input-field col m12 s12">
<label for="abstract">Abstract</label>    

<textarea id="textarea1" name="abstract" class="materialize-textarea" length="2000" required></textarea>
</div>

<div class="input-field col m6 s12">
<label for="upload"></label>
<input id="upload" name="upload" type="file" value="Complete Project" autocomplete="off" required>
</div>



</div>
      <button type="submit" name="apply" id="apply" class="waves-effect waves-light btn indigo m-b-xs">Upload Project</button>                                             

                                                </div>
                                            </div>
                                        </section>
                                     
                                    
                                        </section>
                                    </div>
                                </form>
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
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/form_elements.js"></script>
    </body>
</html>
<?php } ?> 