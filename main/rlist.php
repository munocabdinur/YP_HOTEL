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
// $gaddress="";
// $gcountry="";
// $gcity="";
 $gdate="";
// $gphone="";
// $gemail="";
// $ggender="";
$floor="";
$rno="";
$rtype="";
$rprice="";
$paid="";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//$conn = mysqli_connect($host,$user,$pswd,$db);//(MySQLi Procedural)
$conn = new mysqli($host,$user,$pswd,$db);//(MySQLi Object-oriented)
function getData()
{
$data =array();
$data[0] =$_POST['gid'];
$data[1] =$_POST['gfullname'];
// $data[2] =$_POST['gaddress'];
// $data[3] =$_POST['gcountry'];
// $data[4] =$_POST['gcity'];
 $data[2] =$_POST['gdate'];
// $data[6] =$_POST['gphone'];
// $data[7] =$_POST['gemail'];
// $data[8] =$_POST['ggender'];
$data[3] =$_POST['floor'];
$data[4] =$_POST['rno'];
$data[5] =$_POST['rtype'];
$data[6] =$_POST['rprice'];
//$data[7] =$_POST['paid'];
return $data;
}
if (isset($_POST['searchid'])) {
    $info = getData();
    $sql = "SELECT * FROM room WHERE gid= '$info[0]'";
    $search_result =mysqli_query($conn,$sql);
if (mysqli_num_rows($search_result)){
 while ($rows=mysqli_fetch_array($search_result)) {
    $gid=$rows['gid'];
    $gfullname=$rows['gfullname'];
    // $gaddress=$rows['gaddress'];
    // $gcountry=$rows['gcountry'];
    // $gcity=$rows['gcity'];
    $gdate=$rows['gdate'];
    // $gphone=$rows['gphone'];
    // $gemail=$rows['gemail'];
    // $ggender=$rows['ggender'];
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
      	$sql1="SELECT gid, gfullname FROM guest WHERE gid=gid";
$ressalt=$conn->query($sql1);
$id="";
while (  $row=$ressalt->fetch_assoc()) {
$id=$row['gid'];
$name=$row['gfullname'];
} 
$sql = "UPDATE room SET gfullname='$info[1]', gdate='$info[2]', floor='$info[3]', rno='$info[4]', rtype='$info[5]', rprice='$info[6]' WHERE gid='$info[0]'";
if ($conn->query($sql)===TRUE) {
}
else {
    echo" Error updating record".mysql_error($conn);
}
}
if(isset($_GET['idDelete'])){
    $idDelete = $_GET['idDelete'];
    $sql = "delete from room where gid='$idDelete'";
    if($conn->query($sql)===true) {
       // header("location:rsearch.php");
    }
    else { ?>
        <script>
            alert("failed to delete");
            window.location.href='rsearch.php';
        </script>
        <?php
       // echo "failed to delete";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <title>Hotel yaasmiin plaza| </title>
 <script src="jquery-3.2.1.js"></script>
    <!-- Bootstrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.min.js"></script>
    <style>
       
th{
	  background:#000099;
	  color:#00FF00;
      text-align:center;
      
      }
      td{
           
	  color:black;
      text-align:center;
      
      
      }
      .table-responsive table tr:hover {
  background:#FFCE43;
}
.table-responsive table tr td:hover {
  background:#DCDCDC;
}
      tr:nth-child(even) {background: #FFCE43}
      .table-responsive table tr:nth-child(odd) {background: #2ecc71}
      </style>
  </head>
  <body>
<?php
    $conn = new mysqli("localhost", "root", "", "simpledata");
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = " SELECT gid, gfullname,  gdate, floor, rno, rtype, rprice, paid FROM room  WHERE gid LIKE '%".$search."%' OR gfullname LIKE '%".$search."%'  OR floor LIKE '%".$search."%'  OR rno LIKE '%".$search."%'";
    }
    else
    {
        $query = " SELECT gid, gfullname,  gdate, floor, rno, rtype, rprice, paid  FROM room ORDER BY gid ";
    }
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { ?>
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Guest Full Name</th>
                    <th>Date</th>
                    <th>Floor</th>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Room Price</th>
                    <th>Action</th>
                    
                    <th>Action</th>
                    <th>Action</th>
                   
                   </tr>
        <?php
            while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td style="background-color:#ff0080", color:"black"><?php echo $row["gid"] ?></td>
                    <td><?php echo $row["gfullname"] ?></td>
                    <td><?php echo $row["gdate"] ?></td>
                    <td><?php echo $row["floor"] ?></td>
                    <td><?php echo $row["rno"] ?></td>
                    <td><?php echo $row["rtype"] ?></td>
                    <td><?php echo $row["rprice"] ?></td>
                    
                    <td>
                       <button type="submit" class="btn btn-light" data-toggle="modal" data-target="#edit-<?php echo $row['gid']; ?>" id=""><i class="fa fa-pencil fa-lg"></i> Edit</button>
                       <div class="modal fade" role="dialog" id="edit-<?php echo $row['gid']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background:rgb(255, 129, 0)">
                                    <h4 style="color:white"> <strong>CHECK IN UPDATE </strong> </h4>
                                    <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px">&times;<B style="color:white;margin-left:-5px">X</B></button>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-group formedit"  method="POST">
                                        <div class="row"> <div  class="col-md-0"> <label class="col pull-left"></label> <input type="hidden" name="gid" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gid']; ?>"><br></div></div>
                                        <div class="row">      <div class="col-md-6"><label class="col pull-left">Fullname::</label>  <input type="text" name="gfullname" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gfullname']; ?>"><br></div>
                                        <div  class="col-md-6"> <label class="col pull-left">Date:</label>     <input type="date" name="gdate" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['gdate']; ?>"><br></div></div>
                                        <div class="row">      <div class="col-md-6"><label class="col pull-left">Floor:</label> <input type="text" name="floor" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['floor']; ?>"><br></div>
                                        <div  class="col-md-6"> <label class="col pull-left">Room number:</label>      <input type="text" name="rno" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['rno']; ?>"><br></div></div>
                                        <div class="row">     <div class="col-md-6"><label class="col pull-left">Room type:</label> <input type="text" name="rtype" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['rtype']; ?>"><br></div>
                                       <div class="col-md-6"> <label class="col pull-left">Room price:</label>     <input type="text" name="rprice" id="#edit-<?php echo $row['gid']; ?>" class="form-control" value="<?php echo $row['rprice']; ?>"><br></div>
                                      </div>
                                       <button style="width:50%;background:rgb(255, 129, 0)"type="submit" name="update" id="#edit-<?php echo $row['gid']; ?>"> <h4 style="color:white"> <strong> Update </strong> </h4> </button>
                                        </form>
                             </td>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        <td>
                     <a href="?idDelete=<?php echo $row['gid'] ?>"><button name="idDelete" type="submit" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Delete</button></a>  
                    </td>
                    <td>     <a href="checkin.php?gid=<?php echo $row['gid'] ?>"  
                    class="btn btn-primary btn-sm"> <i class="fa fa-table"></i></button> ChECK IN</a> </td>
                    </td>   
                       
  <div>
                </tr>
                <?php 
            }
    }
else{
 echo 'Data Not Found';}
echo "</table></div>";
?>		 
	
</html>