<!DOCTYPE html>
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
      <!-- Full Width Column -->
        <div class="container">
          <!-- Content Header (Page header) -->
          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-8">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Dashboard</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                      <div class="col-md-4 ">
                        <!-- small box -->
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>GUEST</h3>
                            <p>Guest list</p>
                          </div>
                          <div class="icon" style="margin-top:30px; margin-right:30px">
                          <h1 style="color:white">4</h1>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="fa fa-home"></i>
                          </div>
                          <a href="search.php" class="small-box-footer">
                           Click here<i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                      <div class="col-md-4 ">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                          <div class="inner">
                            <h3>CHECK IN</h3>
                            <p>Checkin List</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="fa fa-edit"></i>
                          </div>
                          <a href="rsearch.php" class="small-box-footer">
                           Click Here<i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                      
                      <div class="col-md-4 ">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                          <div class="inner">
                            <h3>ROOMS</h3>
                            <p>Room List</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="fa fa-hotel"></i>
                          </div>
                          <a href="rooms.php" class="small-box-footer">
                            Click Here <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                      <div class="col-lg-4">
                        <!-- small box -->
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3>CHECKOUT</h3>
                            <p>Checkout List</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="fa fa-table"></i>
                          </div>
                          <a href="invoices.php" class="small-box-footer">
                           Click Here <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                      <div class="col-lg-4">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                          <div class="inner">
                            <h3>STATUS</h3>
                            <p>Room Status List</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="fa fa-table"></i>
                          </div>
                          <a href="tstatus.php" class="small-box-footer">
                           Click Here <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                      <div class="col-lg-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3>INVOICE</h3>
                            <p>Invoice List</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="fa fa-bed"></i>
                          </div>
                          <a href="amounts.php" class="small-box-footer">
                           Click Here <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                  </div><!--row-->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            <div class="col-md-3">
              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Us</h3>
                   </div><!-- /.box-header -->
                   <div class="box-body">
                   <h4><i class="fa fa-map"></i> Company Address</h4>
                    <p style="color:red"> <b>BOSAASO-BARI-SOMALIA<b></p>
                  <strong><i class="fa fa-phone"></i> Contact Number</strong>
                  <P  style="color:red"><B>+252-907-7793432</B><P>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>   
			    </div><!-- /.row -->
	      </section><!-- /.content -->
        </div><!-- /.container -->
    <?php include("dashFooter.php"); ?> 
    <?php include("footer.php"); ?>
</body> 
</html>