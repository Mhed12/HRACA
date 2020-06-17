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

        <!-- daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">

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
        <li class="active">Booking</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Booking Table</h3>
        </div>
            <a href="#" id="btnAddroom" type="button" class="btn btn-small btn-primary dropdown-toggle" data-toggle="modal" data-target="#myModalAdd">
              <i class="glyphicon glyphicon-plus"></i>Add Booking
          </a>
        
         <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Guest Name</th>
                  <th>Room Name</th>
                  <th>Number of Guest</th>
                  <th>Check In</th>
                  <th>Check Out</th>
                  <th width="10%">Approve/Not Approve?</th>
                  <th>Approve Stamp</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody> 
                
                <?php
                    $sql = "SELECT r.room_ID, b.booking_ID, CONCAT(g.first_name, \" \" ,g.last_name) AS guest_name, r.room_name, b.number_guest, DATE_FORMAT(b.check_in, \"%b. %d, %Y\") AS check_in, DATE_FORMAT(b.check_out, \"%b. %d, %Y\") AS check_out, b.booking_approve, DATE_FORMAT(b.booking_approve_time, \"%b. %d, %Y - %l:%i %p\") AS booking_approve_time, b.status FROM guest g, room r, booking b WHERE g.guest_id=b.guest_id AND r.room_ID=b.room_ID ";
                    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { 
                    // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $room_ID              = $row['room_ID'];
        $booking_ID           = $row['booking_ID'];
        $guest_name           = $row['guest_name'];
        $room_name            = $row['room_name'];
        $number_guest         = $row['number_guest'];
        $check_in             = $row['check_in'];
        $check_out            = $row['check_out'];
        $booking_approve      = $row['booking_approve'];
        $booking_approve_time = $row['booking_approve_time'];
        $status               = $row['status'];

        echo "<tr>";
        echo "<td>".$guest_name."</td>";
        echo "<td>".$room_name."</td>";
        echo "<td>".$number_guest."</td>";
        echo "<td>".$check_in."</td>";
        echo "<td>".$check_out."</td>";

        if($booking_approve == 0){
          echo "<td class=\" btn-warning\">Pending</td>";
          }else if($booking_approve == 1){
            echo "<td class=\" btn-success\">Approved</td>";
          }else{
            echo "<td class=\" btn-danger\">Not Approved</td>";
          }

          //booking approve time
          if($booking_approve_time == '0000-00-00 00:00:00'){
            echo "<td>Pending...</td>";
          }else if($booking_approve_time != '0000-00-00 00:00:00'){
          echo "<td>".$booking_approve_time."</td>";
          }
          //booking status
          if($status == 0){
            echo "<td class=\" btn-danger\">Not Active</td>";
            }else{
              echo "<td class=\" btn-success\">Active</td>";
            }
        echo "<td><form action=\"\" method=\"post\">";
                                if($booking_approve == 1 || $booking_approve == 2){
                                }else{
                                  echo"  <input type=\"hidden\" value=".$booking_ID." name=\"id\">  
                                  <a class = \"fa fa-fw fa-thumbs-o-up\" title=\"Approve\" href=\"backend/booking/booking_app.php?id=".$booking_ID."&id2=".$room_ID."\" onclick=\"return confirm('Confirm Approve?');\"></a>
                                  <a class = \"fa fa-fw fa-thumbs-o-down\" title=\"Disapprove\" href=\"backend/booking/booking_disapp.php?id=".$booking_ID."&id2=".$room_ID."\" onclick=\"return confirm('Confirm Disapprove?');\"></a>";
                                }

                                if((($booking_approve == 1) && ($status == 1)) && (($booking_approve == 1) || ($status == 0))){
                                  echo"<a title=\"Disable Booking\" type=\"button\" class=\"btn btn-small btn-danger dropdown-toggle\" href=\"backend/booking/booking_deactivate.php?id=".$booking_ID."&id2=".$room_ID."\" onclick=\"return confirm('Confirm Approve?');\">Disable</a>";
                                }else{
                                }

                              echo" </form>

                        </td>";
        echo "</tr>";
      }//end while($row = mysqli_fetch_assoc($result))
  }//end if (mysqli_num_rows($result) > 0)
               else {
                    echo "";
                }

                echo"                <!-- Add Meal -->";


echo"   <div id=\"myModalAdd\" class=\"modal\">
          <div class=\"modal-dialog\">
            <div class=\"modal-content\">
              <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                  <span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\">Add Booking</h4>
              </div>
              <div class=\"modal-body\">
                
                 <!-- form start -->
            <form role=\"form\" action=\"backend/booking/booking_insert.php\" method=\"post\" enctype=\"multipart/form-data\">

            <!-- select guest name -->";
            echo"<div class=\"box-body\">";
            echo"<label>Guest</label>";  
            echo"<select class=\"form-control\" id=\"guest_name\" name=\"guest_name\"\" required>";
              echo"<option value=\"\">Select Guest</option>";
                      $sql = "SELECT * FROM `guest` ";
                      $result = mysqli_query($conn, $sql);
        
                      if (mysqli_num_rows($result) > 0) { 
                      // output data of each row
                          while($row = mysqli_fetch_assoc($result)) {
                            $guest_id = $row['guest_id'];
                            $first_name = $row['first_name'];
                            $last_name = $row['last_name'];      
                                echo"<option value=".$guest_id.">".$first_name." ".$last_name."</option>";
                          }
                        }    
              echo"</select>
              </div>

              <!-- select room name -->";
              echo"<div class=\"form-group\">";
              echo"<label>Room</label>";
              echo"<select class=\"form-control\" id=\"room_name\" name=\"room_name\" required>";
              echo"<option value=\"\">Select Room</option>";
              $sql = "SELECT * FROM `room` WHERE room_availability = 1 ";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) { 
              // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                    $room_ID = $row['room_ID'];
                    $room_name = $row['room_name'];      
                    echo"<option value=".$room_ID.">".$room_name."</option>";
                  }
                }    
                  echo"</select>";
              echo"  </div>";
        
              echo"
            <div class=\"form-group\">
              <label for=\"number_guest\">Number of Guest</label>
              <input type=\"number\" class=\"form-control\" id=\"number_guest\" name=\"number_guest\" placeholder=\"Enter Number of Guest\" required>
            </div>";
                
                echo"<!-- Date check in dd/mm/yyyy -->
                <div class=\"form-group\">
                  <label>Check In</label>
  
                  <div class=\"input-group\">
                    <div class=\"input-group-addon\">
                      <i class=\"fa fa-calendar\"></i>
                    </div>";
                  echo"  <input type=\"date\" id=\"check_in\" name=\"check_in\" class=\"form-control\" data-inputmask=\"'alias': 'dd/mm/yyyy'\" data-mask>";
                  echo"</div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
  
                <!-- Date check out mm/dd/yyyy -->
                <div class=\"form-group\">
                <label>Check Out</label>

                  <div class=\"input-group\">
                    <div class=\"input-group-addon\">
                      <i class=\"fa fa-calendar\"></i>
                    </div>";
                    echo"<input type=\"date\" id=\"check_out\" name=\"check_out\" class=\"form-control\" data-inputmask=\"'alias': 'mm/dd/yyyy'\" data-mask>";
                 echo" </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->";
                
              echo" <div class=\"modal-footer\">
                <button type=\"submit\" name=\"Submit\" class=\"btn btn-primary\" value=\"Submit\">Add Booking</button>
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
                  <th>Guest Name</th>
                  <th>Room Name</th>
                  <th>Number of Guest</th>
                  <th>Check In</th>
                  <th>Check Out</th>
                  <th>Approve/Not Approve?</th>
                  <th>Approve Stamp</th>
                  <th>Status</th>
                  <th>Action</th>
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
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap time picker -->
<script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

<!-- Page script -->
<script>
var a = "<?php echo $_GET ["err"];?>";
 
 if(a==1){
   a = "Booking Inserted Successfully";
   alert(a);
 }else if(a==2){
   a = "Booking Deleted Successfully";
   alert(a);
 }else if(a==3){
  a = "Booking Updated Successfully";
   alert(a);
 }else if(a==4){
  a = "Booking Approved Successfully";
   alert(a);
 }else{
  a = "The Number of Guest is Greater to the Room Capacity";
   alert(a);
 }
</script>
<script>
  $(function () {

    //Data Tables
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });

  });
</script>   

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

</body>
</html>