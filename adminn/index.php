<?php
session_start();
//connect database
$koneksi = new mysqli("localhost","root","","rentbus");

if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location:login.php;</script>";
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
     <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Sewa Sewa</a> 
            </div>
  
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				
					
                    <li><a href="index.php"><i class="fas fa-tachometer-alt fa-2x"></i> Home</a></li>
                    <li><a href="index.php?halaman=bus"><i class="fa fa-bus fa-2x"></i>Data Bus</a></li>
                    <li><a href="index.php?halaman=datapo"><i class="fa fa-users fa-2x"></i>Data PO</a></li>
                    <li><a href="index.php?halaman=logout"><i class="fas fa-sign-out-alt fa-2x"></i>Logout</a></li>
                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="bus")
                    {
                        include 'bus.php';
                    }
                    elseif ($_GET['halaman']=="datapo")
                    {
                        include 'datapo.php';
                    }
                    elseif ($_GET['halaman']=="detail")
                    {
                        include 'detail.php';
                    }
                    elseif ($_GET['halaman']=="hapusbus")
                    {
                        include 'hapusbus.php';
                    }
                    elseif ($_GET['halaman']=="hapuspo")
                    {
                        include 'hapuspo.php';
                    }
                    elseif ($_GET['halaman']=="updatebus")
                    {
                        include 'updatebus.php';
                    }
                    elseif ($_GET['halaman']=="updatepo")
                    {
                        include 'updatepo.php';
                    }
                    elseif ($_GET['halaman']=="logout")
                    {
                        include 'logout.php';
                    }
                }
                else
                {
                    include 'home.php';
                }
                ?>           
            </div>
             <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
