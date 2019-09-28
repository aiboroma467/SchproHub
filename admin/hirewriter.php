<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['add']))
{
//$empid=$_POST['empcode'];
$fname=$_POST['firstName'];
$lname=$_POST['lastName'];   
$email=$_POST['email']; 
//$password=md5($_POST['password']);
$topic=$_POST['topic'];
$services=$_POST['services'];  
$department=$_POST['department'];
$institution=$_POST['institution'];
$budget=$_POST['budget'];
$description=$_POST['description'];
$hasapproved=$_POST['hasapproved'];
$duration=$_POST['duration'];
//$gender=$_POST['gender']; 
//$dob=$_POST['dob']; 
//$department=$_POST['department']; 
//$address=$_POST['address']; 
//$city=$_POST['city']; 
//$country=$_POST['country']; 
$mobileno=$_POST['mobileno']; 
$status=0;
$isread=0;


$sql="INSERT INTO neworder(FirstName,LastName,EmailId,Topic,services,Department,Institution,Budget,Description,Hasapproved,Duration,Phonenumber,Status,IsRead) VALUES(:fname,:lname,:email,:topic,:services,:department,:institution,:budget,:description,:hasapproved,:duration,:mobileno,:status,:isread)";
$query = $dbh->prepare($sql);
//$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
//$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':topic',$topic,PDO::PARAM_STR);
$query->bindParam(':services',$services,PDO::PARAM_STR);
$query->bindParam(':department',$department,PDO::PARAM_STR);
$query->bindParam(':institution',$institution,PDO::PARAM_STR);
$query->bindParam(':budget',$budget,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':hasapproved',$hasapproved,PDO::PARAM_STR);
$query->bindParam(':duration',$duration,PDO::PARAM_STR);
//$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Thank you! your request has been received, we'll get back to you soon";
}
else 
{
$error="Something went wrong. Please try again";
}

}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>SPH | Hire Writer Page</title>
        
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

                <link href="../assets/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"/>  
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
   
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
    <script type="text/javascript">
function valid()
{
if(document.addemp.password.value!= document.addemp.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.addemp.confirmpassword.focus();
return false;
}
return true;
}
</script>

<!--<script>
function checkAvailabilityEmpid() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'mobileno='+$("#mobileno").val(),
type: "POST",
success:function(data){
$("#empid-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>-->

<script>
function checkAvailabilityEmailid() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#emailid-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>



    </head>
    <body>
	<?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
 <!-- <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3">      
                            <span class="chapter-title"><img src="kashipara.png" alt="" height="100" width="250" style="height: 61px;"></span>
                        </div>
                      
                           
                        </form>
                     
                        
                    </div>
                </nav>
            </header>
			
			 <!--<aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                   
                  
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion" style="">
                    <li>&nbsp;</li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="register.php"><i class="material-icons"></i>Vendor Registration</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="index.php"><i class="material-icons"></i>Vendor Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="forgot-password.php"><i class="material-icons"></i> Password Recovery</a></li>
                
                       <li class="no-padding"><a class="waves-effect waves-grey" href="admin/"><i class="material-icons"></i>Admin Login</a></li>
                
                </ul>
          
                </div>
            </aside>-->
  
  
  
  
  
  
  
  
  
  
  
  
   <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Hire A Writer</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                                        <h3>Hire A Writer</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>


 <!--<div class="input-field col  s12">
<label for="empcode">Employee Code(Must be unique)</label>
<input  name="empcode" id="empcode" onBlur="checkAvailabilityEmpid()" type="text" autocomplete="off" required>
<span id="empid-availability" style="font-size:12px;"></span> 
</div>
-->

<div class="input-field col m6 s12">
<label for="firstName">First name</label>
<input id="firstName" name="firstName" type="text" required>
</div>

<div class="input-field col m6 s12">
<label for="lastName">Last name</label>
<input id="lastName" name="lastName" type="text" autocomplete="off" required>
</div>

<div class="input-field col s12">
<label for="email">Email</label>
<input  name="email" type="email" id="email" onBlur="checkAvailabilityEmailid()" autocomplete="off" required>
<span id="emailid-availability" style="font-size:12px;"></span> 
</div>

<div class="input-field col s12">
<label for="topic">Topic</label>
<input id="topic" name="topic" type="text" autocomplete="off" required>
</div>

<div class="col ">
<div class="row">
<div class="input-field col  s12">
<select  name="services" autocomplete="off">
<option value="">Services...</option>                                          
<option value="Fresh Topic">Write on a fresh topic for you</option>
        <option value="Software Development">Develop a program / App for you</option>
        <option value="Analysis">Conduct Analysis</option>
		<option value="Change case">Change case study</option>
		<option value="Others">Others</option>
</select>
</div>
 
<div class="input-field col  s12">
<select  name="department" autocomplete="off">
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

<div class="input-field col s12">
<label for="institution">Institution</label>
<input id="institution" name="institution" type="text" autocomplete="off" required>
</div>

<div class="input-field col s12">
<label for="budget">Budget Undergraduate (20000-50,000)Postgraduate (50,000-300,000)</label>
<input id="budget" name="budget" type="text" autocomplete="off" required>
 </div>
 

 <div class="input-field col s12">
<label for="description">Description</label>
<textarea id="textarea1" name="description" class="materialize-textarea" length="500" required></textarea>
</div>

                                                            
<div class="col ">
<div class="row">
<div class="input-field col  s12">
<select  name="hasapproved" autocomplete="off">
<option value="">Has the project topic been approved?</option>                                          

		<option value="Yes">Yes</option>
		<option value="No">No</option>
</select>
</div>

<div class="col ">
<div class="row">
<div class="input-field col  s12">
<select  name="duration" autocomplete="off">
<option value="">Your Timeline</option>                                          

		<option value="Less than 7days">Less than 7days</option>
        <option value="1 Week">1 Week</option>
		<option value="2 Weeks">2 Weeks</option>
		<option value="1 Month">1 Month</option>
		<option value="2 Monthsplus">2 Months plus</option>
</select>
</div>
 
 
 
 <!--<div class="col m6">
<div class="row">
<div class="input-field col m6 s12">
<select  name="gender" autocomplete="off">
<option value="">Gender...</option>                                          
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
</div>

<div class="input-field col m6 s12">
<label for="birthdate">Birthdate</label>
<input id="birthdate" name="dob" type="date" class="datepicker" autocomplete="off" >
</div>
-->
                                                    

<!--<div class="input-field col m6 s12">
<select  name="department" autocomplete="off">
<option value="">Department...</option>
<?php /*$sql = "SELECT DepartmentName from tbldepartments";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                                            
<option value="<?php echo htmlentities($result->DepartmentName);?>"><?php echo htmlentities($result->DepartmentName);?></option>
<?php }} */?>
</select>
</div>
-->
<!--<div class="input-field col m6 s12">
<label for="address">Address</label>
<input id="address" name="address" type="text" autocomplete="off" required>
</div>

<div class="input-field col m6 s12">
<label for="city">City/Town</label>
<input id="city" name="city" type="text" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="country">Country</label>
<input id="country" name="country" type="text" autocomplete="off" required>
</div>-->

                                                            
<div class="input-field col m6 s12">
<label for="phone">Mobile number</label>
<input id="phone" name="mobileno" type="tel" maxlength="10" autocomplete="off" required>
 </div>

                                                        
<div class="input-field col s12">
<button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">SUBMIT</button>

</div>

                                                        </div>
                                                    </div>
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
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
         <script src="assets/js/pages/ui-modals.js"></script>
        <script src="assets/plugins/google-code-prettify/prettify.js"></script>
        
        
    </body>
</html>
<?php  ?> 