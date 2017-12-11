
     <?php
include "tables/config.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
?>
<?php
$host ="localhost";
$user = "root";
$pswd = "";
$db = "simpledata";
$gid="";
$gfullname="";
$gdate="";
$rno="";
$floor="";
$rtype="";
$rprice="";
$paid="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//$conn = mysqli_connect($host,$user,$pswd,$db);//(MySQLi Procedural)
$conn = new mysqli($host,$user,$pswd,$db);//(MySQLi Object-oriented)


function getData()
{
    $data =array();
        $data[0] = $_POST['gid'];
		$data[1] = $_POST['gfullname'];
		$data[2] = $_POST['gdate'];
		$data[3] = $_POST['rno'];
		$data[4] = $_POST['floor'];
		$data[5] = $_POST['rtype'];
		$data[6] = $_POST['rprice'];
		$data[7] = $_POST['paid'];
    return $data;
    }
    if (isset($_POST['searchid'])) {
        $info = getData();
        $sql = "SELECT * FROM guest WHERE gid= '$info[0]'";
        $search_result =mysqli_query($conn,$sql);
    if (mysqli_num_rows($search_result)){
     while ($rows=mysqli_fetch_array($search_result)) {
    
    $gid=$rows['gid'];
    $gfullname=$rows['gfullname'];
    $gdate=$rows['gdate'];
    $floor=$rows['floor'];
    $rno=$rows['rno'];
    $rtype=$rows['rtype'];
    $rprice=$rows['rprice'];
    $paid=$rows['paid'];
    }
    }
    }

    // Update Command
    if (isset($_POST['update'])) {
          $info = getData();
    $sql = "UPDATE guest SET gfullname='$info[1]', gdate='$info[2]', floor='$info[3]', rno='$info[4]', rtype='$info[5]', rprice='$info[6]', paid='$info[7]' WHERE gid='$info[0]'";
    if ($conn->query($sql)===TRUE) {
     
    }
    else {
        echo" Error updating record".mysql_error($conn);
    }
    }
    
    if(isset($_GET['idDelete'])){
        $idDelete = $_GET['idDelete'];
        $sql = "delete from guest where gid='$idDelete'";
        if($conn->query($sql)===true) {
            header("location: search.php");
        }
        else { ?>
            <script>
                alert("failed to delete");
                window.location.href='search.php';
            </script>
            <?php
            echo "failed to delete";
        }
    }
    ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/bootstrap.min.js"></script>
    <title>YAASMIIN | HOTEL</title>
    <?php include("Linkfooter.php"); ?>
    <?php include("links.php"); ?>
</head>
<body class="hold-transition skin-purple-light  sidebar-mini" onload="timing()">
      <div class="wrapper">
      <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <?php include("dashboard.php"); ?>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
          <div class="container" style="margin-top:-80px">
         <div class="row">
         <div class="col-md-11">
        <div class="text-right">
        <a href="checkin.php" class="btn btn-warning" role="button"><i class="fa fa-plus-circle"  ></i> Check in Heare</a>
        </div>
    </div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-md-12  ">
     <h3 style="border:2px solid white; background-color:#b4b4b4"; align="center"> <B style="font-family: Times New Roman, Times, serif; color:white"><strong>Checkin LIST</strong></B></h3>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Search</span>
                        <input type="text" name="search_text" id="search_text" placeholder="Search by Guest Details" class="form-control" />
                    </div>
                </div>
                <div id="result"></div> 
    </div>
    </div>
    </div>
<script>
        $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
            url:"guestlist.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                $('#result').html(data);
            }
            });
        }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });
</script>
        <?php include("dashFooter.php"); ?>    
  
    <?php include("footer.php"); ?>
    </div>
