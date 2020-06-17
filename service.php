<?php
session_start();
include 'backend/PHPtoMySQL.php';

   // Check user login or not
   if (!isset($_SESSION["uname"])) {
    // logged in
     header('Location: index.php');
     }

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Customer Assistance System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="assets/dist/css/skins/skin-blue.min.css">

  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

      <!-- DataTables -->
      <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <style>
  body {
      position: relative; 
  }

    #breakfast {padding-top:50px;height:500px;}
  #lunch {padding-top:50px;height:500px;}
  #dinner {padding-top:50px;height:500px;}
  </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini" data-spy="scroll" data-target=".navbar" data-offset="50">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CAS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="assets/dist/img/admin.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="assets/dist/img/admin.png" class="img-circle" alt="User Image">

                <p>
                  Admin
                  <small>Member since Nov. 2018</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="backend/Login/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/dist/img/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
       /.search form -->

           <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">OPTIONS</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="guest.php"><i class="fa fa fa-user"></i> <span>Guest</span></a></li>

        <li><a href="room.php"><i class="fa fa-home"></i> <span>Room Management</span></a></li>

        <li><a href="menu.php"><i class="fa fa fa-cutlery"></i> <span>Menu Management</span></a></li>

        <li><a href="room_service.php"><i class="fa fa fa-wrench"></i> <span>Room Service Management</span></a></li>

        <li><a href="booking.php"><i class="fa fa fa-book"></i> <span>Booking</span></a></li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="orders.php">Order Line</a></li>
            <li><a href="service.php">Service Line</a></li>
          </ul>
        </li>
        <li><a href="feedback.php"><i class="ion ion-stats-bars"></i> <span>Feedback</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->

     </section>
    <!-- /.sidebar -->
  </aside>

<!-- BODY -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customer Assistance System
        <small>Admin Module</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Service Line</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Service Line Table</h3>
         </div> 
          <a href="#" id="btnAddroom" type="button" class="btn btn-small btn-primary dropdown-toggle" data-toggle="modal" data-target="#myModalAdd1">
              <i class="glyphicon glyphicon-plus"></i>Add Order
          </a>   
        
         <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th width="1%">Order ID</th>
                <th width="6%">Room Name</th>
                <th width="6%">Guest Name</th>
                <th width="6%">Service Name</th>
                <th width="6%">Order Stamp</th>
                <th width="6%">Approve Stamp</th>
                <th width="4%">Approve/Not Approved?</th>
                <th width="5%">Status</th>
                <th width="5%">Action</th>
                </tr>
                </thead>
                <tbody> 
                
                <?php
                    $sql = "SELECT o.order_ID, p.product_name, r.room_ID, CONCAT(g.first_name,\" \",g.last_name) AS guest, r.room_name, o.o_approve_by_admin, DATE_FORMAT(o.order_time, \"%b. %d, %Y - %l:%i %p\") AS order_time, DATE_FORMAT(o.o_approve_time, \"%b. %d, %Y - %l:%i %p\") AS o_approve_time, o.order_status FROM orders o,order_line ol, room r, product p, booking b, guest g WHERE b.guest_id = g.guest_id AND b.room_ID = r.room_ID AND r.room_ID = o.room_ID AND o.order_ID = ol.order_ID AND p.product_ID = ol.product_ID AND p.product_type = \"room_service\"
                    UNION SELECT o.order_ID, p.product_name, r.room_ID, CONCAT(g.first_name,\" \",g.last_name) AS guest, r.room_name, o.o_approve_by_admin, DATE_FORMAT(o.order_time, \"%b. %d, %Y - %l:%i %p\") AS order_time, DATE_FORMAT(o.o_approve_time, \"%b. %d, %Y - %l:%i %p\") AS o_approve_time, o.order_status FROM orders o,order_line ol, room r, product p, booking b, guest g WHERE b.guest_id = g.guest_id AND b.room_ID = r.room_ID AND r.room_ID = o.room_ID AND o.order_ID = ol.order_ID AND p.product_ID = ol.product_ID AND p.product_type = \"room_service\"";
                    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { 
                    // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $order_ID            = $row['order_ID'];
        $room_name           = $row['room_name'];
        $guest               = $row['guest'];
        $service_name        = $row['product_name'];
        $order_time          = $row['order_time'];
        $sl_approve_time     = $row['o_approve_time'];
        $sl_approve_by_admin = $row['o_approve_by_admin'];
        $order_status        = $row['order_status'];
        

          echo "<tr>";
            echo "<td>" . $order_ID . "</td>";
            echo "<td>" . $room_name . "</td>";
            echo "<td>" . $guest . "</td>";  
            echo "<td>".$service_name."</td>";    
            echo "<td>" . $order_time . "</td>";
            echo "<td>" . $sl_approve_time . "</td>";

            if ($sl_approve_by_admin == 0) {
              echo "<td class=\" btn-danger\">Pending Order</td>";
          }else if($sl_approve_by_admin == 1){
              echo "<td class=\" btn-success\">Approved</td>";
          }else{
               echo "<td class=\" btn-danger\">Not Approved</td>";
          }   

           if ($order_status == "Processing") {
                echo "<td class=\" btn-warning\">Processing Order</td>";
            } else if ($order_status == "Done") {
                echo "<td class=\" btn-success\">Ready to serve</td>";
            } else if ($order_status == "Not Approved") {
                echo "<td class=\" btn-danger\">Not Approved</td>";
            } else{
                echo "<td class=\" btn-danger\">Pending Order</td>";
            }

            echo "<td><form action=\"\" method=\"post\">
                      <input type=\"hidden\" value=".$order_ID." name=\"id\">";  
                      if($sl_approve_by_admin == 0){ 
                      echo"<a class = \"fa fa-fw fa-thumbs-o-up\" title=\"Approve Request\" href=\"backend/service_line/service_line_app.php?id=".$order_ID."\" onclick=\"return confirm('Confirm Approve?');\"></a>";
                      echo"<a class = \"fa fa-fw fa-thumbs-o-down\" title=\"Dispprove Request\" href=\"backend/service_line/service_line_disapp.php?id=".$order_ID."\" onclick=\"return confirm('Confirm Disapprove?');\"></a>";
                      }            
                      echo"</form>
                </td>";
          
          echo "</tr>";
      }//end while($row = mysqli_fetch_assoc($result))
  }//end if (mysqli_num_rows($result) > 0)
               else {
                    echo "";
                }
                
                //<!-- order -->
                        echo"   <div id=\"myModalAdd1\" class=\"modal\">
                        <div class=\"modal-dialog\">
                          <div class=\"modal-content\">
                            <div class=\"modal-header\">
                              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span></button>
                              <h4 class=\"modal-title\">Add Service line</h4>
                            </div>
                            <div class=\"modal-body\">
                              
                               <!-- form start -->
                          <form role=\"form\" action=\"backend/service_line/service_line_insert.php\" method=\"post\" enctype=\"multipart/form-data\">
                            <div class=\"box-body\">
                            
                            <!-- select room name -->";
                            echo"  <div class=\"form-group\">";
                            echo"    <label>Room</label>";
                            echo"    <select class=\"form-control\" id=\"room_ID\" name=\"room_ID\">";
                            echo"<option value=\"\">Select Room - Guest Name</option>";
                            $sql = "SELECT r.room_ID, b.booking_ID,r.room_name, CONCAT(g.first_name, \" \" ,g.last_name) AS guest_name FROM guest g, booking b, room r WHERE g.guest_id = b.guest_id AND b.room_ID = r.room_ID AND r.room_availability = 0 AND b.status = 1 ";
                            $result = mysqli_query($conn, $sql);
                
                            if (mysqli_num_rows($result) > 0) { 
                            // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $room_ID = $row['room_ID'];
                                    $booking_ID = $row['booking_ID'];
                                    $guest_name = $row['guest_name'];
                                    $room_name = $row['room_name'];      
                                  echo"<option value=".$room_ID."|".$booking_ID.">".$room_name." - ".$guest_name."</option>";
                                }
                              }    
                                echo"</select>";

                                echo"    <label>Service</label>";
                                echo"    <select class=\"form-control\" id=\"service_ID\" name=\"service_ID\">";
                                echo"<option value=\"\">Select Room Service</option>";
                                $sql = "SELECT p.product_ID, p.product_name from product p, room_service rs WHERE p.product_ID = rs.product_ID  ";
                                $result = mysqli_query($conn, $sql);
                    
                                if (mysqli_num_rows($result) > 0) { 
                                // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                      $product_ID = $row['product_ID'];
                                      $product_name = $row['product_name'];      
                                      echo"<option value=".$product_ID.">".$product_name."</option>";
                                    }
                                  }    
                                    echo"</select>";                                
                            echo"  </div>
                
                            <div class=\"modal-footer\">
                              <button type=\"submit\" name=\"Submit\" class=\"btn btn-primary\" value=\"Submit\">Add Order</button>
                            </div>
                
                            </div>
                          </form>
                
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal --> ";
                      
mysqli_close($conn);
?>

                
                </tbody>
                 <tfoot>
                <tr>
                <th width="1%">Order ID</th>
                <th width="6%">Room Name</th>
                <th width="6%">Guest Name</th>
                <th width="6%">Service Name</th>
                <th width="6%">Order Stamp</th>
                <th width="6%">Approve Stamp</th>
                <th width="4%">Approve/Not Approved?</th>
                <th width="5%">Status</th>
                <th width="5%">Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->  


      
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- END BODY -->
</div>

    <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Amata, Dela Cruz, Petalio</a>.</strong> All rights reserved.

   </footer>
 
 
 <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
  
  <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="assets/plugins/jQuery/jquery-3.3.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
 
<script src="assets/js/3.3.7/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/app.min.js"></script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.js"></script>
<!-- toggle -->
<script src="assets/js/bootstrap-toggle.js"></script>

<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<script>
  var a = "<?php echo $_GET ["err"];?>";
 
 if(a==1){
   a = "Order Service Inserted Successfully";
   alert(a);
 }else if(a==2){
   a = "Order Service Deleted Successfully";
   alert(a);
 }else{
  a = "Order Service Updated Successfully";
   alert(a);
 }
</script>
 <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });


</script>   

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

</body>
</html>