<?php
    if(isset($_GET["rtype"])){
        include("roomconn2.php");
        $invoicesID = $_GET["rtype"];
        $sql = "select rprice from rooms where rtype = '$invoicesID'";
        $do = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($do);
        if($count > 0) {
            while($row = mysqli_fetch_array($do)) {
                echo $row["rprice"];
                
            }
        }
    }
?>