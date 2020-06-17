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
        <li class="active">Room</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">


<!-- room 1 -->
      <!-- Your Page Content Here -->

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Room Table</h3>
        </div>
            <a type="button" href="#" id="btnAddroom" class="btn btn-small btn-primary dropdown-toggle" data-toggle="modal" data-target="#myModalAdd">
              <i class="glyphicon glyphicon-plus"></i>Add Room
          </a>
        
         <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Room Name</th>
                  <th>Room Price</th>
                  <th>Room type</th>
                  <th>Room Capacity</th>
                 <th width="6%">Availability</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>   
                  <?php
                    $sql = "SELECT room_ID, room_name, room_price, room_type, room_capacity, room_availability FROM room";
                    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { 
                    // output data of each row
      while($row = mysqli_fetch_assoc($result)) {

                      echo "<tr>";
          if(isset($_POST['submit'])){
                      if($_POST['id'] == $row['room_ID']){
                        //edit
                        echo "<form method=\"post\" action=\"backend/room/room_edit.php\">";//bagong laag
                            
                            echo "<td><input type=\"text\" placeholder=\"".$row['room_name']."\" name=\"room_name\"></td>";
                            echo "<td><input type=\"number\" class=\"form-control\" id=\"room_price\" name=\"room_price\"  placeholder= ".$row['room_price']."></td>";
                            echo "<td>                                    
                                    <select class=\"form-control\" id=\"room_type\" name=\"room_type\">";
                                    echo"<option value=\"\">Select the room type</option>";
                                     echo" <option value=\"A\">Aircon</option>";
                                     echo" <option value=\"NA\">Non-Aircon</option>";
                                    echo"</select></td>";
                                    echo "<td><input type=\"number\" class=\"form-control\" id=\"room_capacity\" name=\"room_capacity\"  placeholder= ".$row['room_capacity']."></td>";        
                                
                            if($row['room_availability'] == 0){
                                echo "<td class=\" btn-danger\">Not Available</td>";
                                }else{
                                  echo "<td class=\" btn-success\">Available</td>";
                                }

                            echo "<td><form action=\"\" method=\"post\">
                            <input type=\"hidden\" value=".$row['room_ID']." name=\"id\">
                            <input type=\"submit\" value=\"Save\" name=\"Save\"\></form></td>";
                      }
                        else{
                        //view
                        echo "<td>" . $row["room_name"]. "</td>";
                        echo "<td>₱ " . $row["room_price"]. "</td>";

                        if($row["room_type"] == 'A'){
                          echo "<td>Aircon</td>";
                          }else{
                            echo "<td>Non Aircon</td>";
                          }

                        echo "<td>" . $row["room_capacity"]. "</td>";

                    if($row['room_availability'] == 0){
                      echo "<td class=\" btn-danger\">Occupied</td>";
                      }else{
                        echo "<td class=\" btn-success\">Available</td>";
                      }
                      
                        /*echo "<td> <input checked data-toggle=\"toggle\" data-size=\"small\" data-width=\"93\" data-on=\"Available\" data-off=\"Not Available\" data-onstyle=\"success\" data-offstyle=\"danger\" type=\"checkbox\">  
                              </td>";*/
                        echo "<td><form action=\"\" method=\"post\">
                                      <input type=\"hidden\" value=".$row['room_ID']." name=\"id\">  
                                      <a> <input type=\"submit\" class=\"fa fa-edit\" value=\"Edit\" name=\"submit\"\> 
                                      </a>
                                      ";
                                        echo"
                                        <!--<a id=\"#myModalDel\" class=\"dropdown-toggle\" data-toggle=\"modal\" data-target=\"#myModalDel\" value=". $row["room_ID"] .">
                                        <i class=\"fa fa-trash-o\"></i>      
                                      </a>--> 
                                      <a class = \"fa fa-fw fa-trash-o\" href=\"backend/room/room_delete.php?id=".$row['room_ID']."\" onclick=\"return confirm('Confirm Delete');\"></a>
                                   
                                   </form>

                            </td>";
                         }
          }//if(isset($_POST['submit']))
          else{
            //delete
            echo "<td>".$row['room_name']."</td>";
            echo "<td>₱ ".$row['room_price']."</td>";
            
            if($row["room_type"] == 'A'){
              echo "<td>Aircon</td>";
              }else{
                echo "<td>Non Aircon</td>";
              }
            
            echo "<td>" . $row["room_capacity"]. "</td>";
            
            if($row['room_availability'] == 0){
              echo "<td class=\" btn-danger\">Occupied</td>";
              }else{
                echo "<td class=\" btn-success\">Vacant</td>";
              }

            echo "<td><form action=\"\" method=\"post\">
                                      <input type=\"hidden\" value=".$row['room_ID']." name=\"id\">  
                                      <a> <input type=\"submit\" class=\"fa fa-edit\" value=\"Edit\" name=\"submit\"\> 
                                      </a>";
                                        echo"
                                      <a class = \"fa fa-fw fa-trash-o\" href=\"backend/room/room_delete.php?id=".$row['room_ID']."\" onclick=\"return confirm('Confirm Delete');\"></a>
                                   
                                   </form>

                            </td>";
          }
          echo "</tr>";
      }//end while($row = mysqli_fetch_assoc($result))
  }//end if (mysqli_num_rows($result) > 0)
               else {
                    echo "";
                }

mysqli_close($conn);
?>

     </tbody>
                 <tfoot>
                <tr>
                  <th>Room Name</th>
                  <th>Room Price</th>
                  <th>Room Type</th>
                  <th>Room Capacity</th>
                  <th>Availability</th>
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

<!-- add room -->
        <div id="myModalAdd" class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Room</h4>
              </div>
              <div class="modal-body">
                
            <!-- form start -->
            <form role="form" action="backend/room/room_insert.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="room_name">Room Name</label>
                  <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Enter Room Name" required>
                </div>
                <div class="form-group">
                  <label for="room_price">Price</label>
                  <input type="number" class="form-control" id="room_price" name="room_price" placeholder="Price" required>
                </div>
        
                  <!-- select -->
                <div class="form-group">
                  <label>Room Type</label>
                  <select class="form-control" id="room_type" name="room_type">
                    <option value="">Select Room Type</option>
                    <option value="A">Aircon</option>
                    <option value="NA">Non-Aircon</option>
                  </select>
                </div>

                 <div class="form-group">
                  <label for="room_capacity">Room Capacity</label>
                  <input type="number" class="form-control" id="room_capacity" name="room_capacity" placeholder="Capacity" required>
                </div>

              </div>
                
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" value="Submit">Add Room</button>
              </div>
            </form>

              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<!-- /.add modal --> 
   
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
   a = "Room Inserted Successfully";
   alert(a);
 }else if(a==2){
   a = "Room Deleted Successfully";
   alert(a);
 }else{
  a = "Room Updated Successfully";
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

</body>
</html>