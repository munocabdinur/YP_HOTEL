<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"simpledata");
?>
<?php
include "tables/config.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
?>
<?php include("tables/roomconn2.php"); ?>
    <style>
table{
    border-collapse: collapse;
    width:100%
}
th{
 background:#1b00ff;
	  color:white;
	  text-align:center;
}
    tr{
        
    }
    td{
    background:white;
	  color:black;
	  text-align:center;
        /* padding:10px 20px 10px 20px; */
    }
    .acupay{
      background:#9c0b0b;
      color:white;
      padding: 5px;
       border-radius: 2px solid #9c0b0b;
    }
    .available{
       background:#075207;
       color:white;
       padding: 5px;
       border-radius: 2px solid #075207;
    }
    select{
      /* padding:10px 20px 10px 20px; */
      margin:10px;
      font-size: 18px;
      display: inline-block;
      
    }
    option{
      padding:10px 20px 10px 20px;
      background:rgb(198, 83, 72);
      color:white;
    }
    #ab{
      font-size:18px;
      display: inline-block;
    }
    #qq{
        background:rgb(198, 83, 72);
       color:white;
    }
    #rr{
       background:rgb(198, 83, 72);
       color:white;
    }
    #tt{
       background:rgb(198, 83, 72);
       color:white;
    }
</style>
<!DOCTYPE html>
</head>
   <?php include("Linkfooter.php"); ?>
    <?php include("links.php"); ?>
    </head>
<body class="hold-transition skin-purple-light  sidebar-mini" onload="timing()">
      <div class="wrapper">
      <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <?php include("dashboard.php"); ?>
      <div class="container">
      <div class="row">
      <div class="col-md-8 col-md-offset-1">
<br>
<h3 style="border:2px solid white; background-color:#b4b4b4"; align="center"> <B style="font-family: Times New Roman, Times, serif; color:white"><strong>ROOM STATUS LIST</strong></B></h3>
 <select style="color:black" id="rno" name="rno"   class="form-control" >
                                             <?php
                                            $sql = "select rno  from roomno";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) { ?>
                                            <option  value="<?php echo $row['rno']; ?>" > <?php echo $row['rno']; ?></option>
                                                          <?php }
                                                            }
                                                              ?>
                                                          </select>
                                                          <br>
<div id="table-container">
<?php
      $conn =mysqli_connect("localhost", "root", "", "simpledata");
     $query = " SELECT * FROM roomno ";
    $result = mysqli_query($conn,$query);
   echo '<table border="1" class="table table-bordered">';
   echo '<tr>';
    echo '<th>Room No </th>';
    echo '<th>Room Type </th>';
   echo '<th>Room status </th>';
   echo '</tr>';
  while($output=mysqli_fetch_assoc($result))
            {
               echo '<tr>';
   echo '<td id="rr" >'.$output['rno'].'</td>';
   echo '<td id="rr" >'.$output['room_type'].'</td>';
   $colored ='';
   $colored = $output['room_status'];
   if($colored == 'Accupied'){
      $colored = 'acupay';
   }
      if($colored == 'Available'){
      $colored = 'available';
   }
   echo '<td id="qq" ><span class="'.$colored.'">'.$output['room_status'].'</span></td>';
   echo '</tr>'; 
            };
 echo '</table>';
 mysqli_close($conn);
	 ?>
       </div>
       </div>
       </div>
       </div>
       <?php include("dashFooter.php"); ?>  
  <script>
$(document).ready(function()
{
    $("#rno").on('change', function()   
    {
var value = $(this).val();
$.ajax(
{
url:'tstatusl.php',
type:'POST',
data:'request='+value,
beforeSend:function()
{
    $("#table-container").html('workin....');
},
success:function(data)
{
  $("#table-container").html(data);
},
});
 });
});
 
</script>
     <?php include("footer.php"); ?>
     </div>
     </div> 
</body> 
</html>