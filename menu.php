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
        <li class="active">Menu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->



<!-- room 1 -->
      <!-- Your Page Content Here -->
<!--div style="float:left;width:20%"-->

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Meal Table</h3>
        </div>
            <a href="#" id="btnAddroom" type="button" class="btn btn-small btn-primary dropdown-toggle" data-toggle="modal" data-target="#myModalAdd">
              <i class="glyphicon glyphicon-plus"></i>Add Meal
          </a>
         <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Food name</th>
                  <th width="20%">Food Image</th>
                  <th>Category</th>
                  <th>Food Price</th>
                  <th>Availability</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                   
                    $sql = "SELECT p.product_ID, p.product_name, f.food_image, fc.category_name, f.food_price, p.availability FROM product p, food f, food_category fc WHERE p.product_ID = f.product_ID AND f.category_ID = fc.category_ID AND p.product_type =\"food\"";
                    $result = mysqli_query($conn, $sql);


                    if (mysqli_num_rows($result) > 0) { 
                    // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
                         $food_ID = $row['product_ID'];
                         $food_image = $row['food_image'];
                         $category_name = $row['category_name'];
                         $food_price = $row['food_price'];
                         $food_name = $row['product_name'];
                         $availability = $row['availability'];

                      echo "<tr>";
          if(isset($_POST['submit'])){
                      if($_POST['id'] == $food_ID){
                            //edit
                            echo "<form method=\"post\" action=\"backend/menu/menu_edit.php\" enctype=\"multipart/form-data\">";
                            echo "<td><input type=\"text\" placeholder=\"".$food_name."\" id=\"food_name\" name=\"food_name\"></td>";
                            echo '<td><input type="file" accept="image/jpeg" name="file"></td>';

                            echo"<td>
                                  <select class=\"form-control\" id=\"category_ID\" name=\"category_ID\">";
                                  echo"<option value=\"\">Select the food category</option>";
                                    $sql = "SELECT * FROM `food_category`";
                                    $result = mysqli_query($conn, $sql);
                      
                                    if (mysqli_num_rows($result) > 0) { 
                                    // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                        
                                          $category_name = $row['category_name'];
                                          $category_id = $row['category_ID'];      
                                              echo"<option value=".$category_id.">".$category_name." </option>";
                                        }
                                      }    
                                        echo"</select>
                                  </td>";

                            echo "<td><input type=\"number\" class=\"form-control\" id=\"food_price\" name=\"food_price\"  placeholder= ".$food_price."></td>";
                            //availability of food
                            if($availability == 0){
                            echo"<td>
                                  <div class=\"radio\">
                                  <label>
                                    <input type=\"radio\" name=\"availability\" id=\"availability\" value=\"1\">
                                    Available
                                  </label>
                                </div>
                                <div class=\"radio\">
                                  <label>
                                    <input type=\"radio\" name=\"availability\" id=\"availability\" value=\"0\" checked>
                                    Not Available
                                  </label>
                                </div>
                                </td>
                            ";
                          }else{
                              echo"<td>
                              <div class=\"radio\">
                              <label>
                                <input type=\"radio\" name=\"availability\" id=\"availability\" value=\"1\" checked>
                                Available
                              </label>
                            </div>
                            <div class=\"radio\">
                              <label>
                                <input type=\"radio\" name=\"availability\" id=\"availability\" value=\"0\">
                                Not Available
                              </label>
                            </div>
                            </td>
                        ";
                            }
                            echo "<td><form action=\"\" method=\"post\">
                            <input type=\"hidden\" value=".$food_ID." name=\"id\">
                            <input type=\"submit\" value=\"Save\" name=\"Save\"\></form></td>";
                      }
                        else{
                          //view other collumn while editing one product
                        echo "<td>" . $food_name. "</td>";
                        echo "<td><img width=\"150\" height=\"100\" src='".$food_image."'/></td>";
                        echo "<td>" . $category_name. "</td>";
                        echo "<td>₱ " . $food_price. "</td>";
                        if($availability == 0){
                          echo "<td class=\" btn-danger\">Not Available</td>";
                          }else{
                            echo "<td class=\" btn-success\">Available</td>";
                          }
                        echo "<td> 
                        <form action=\"\" method=\"post\">
                                      <input type=\"hidden\" value=".$food_ID." name=\"id\">  
                                      <a> <input type=\"submit\" class=\"fa fa-edit\" value=\"Edit\" name=\"submit\"\> 
                                      </a>
                                      ";
                                        echo"
                                        <!--<a id=\"#myModalDel\" class=\"dropdown-toggle\" data-toggle=\"modal\" data-target=\"#myModalDel\" value=". $food_ID .">
                                        <i class=\"fa fa-trash-o\"></i>      
                                      </a>--> 
                                      <a  class = \"fa fa-fw fa-trash-o\" href=\"backend/menu/menu_delete.php?id=".$food_ID."\" onclick=\"return confirm('Confirm Delete');\"></a>
                                   
                                   </form>

                            </td>";
                         }
          }//if(isset($_POST['submit']))
          else{
            //view
            echo "<td>".$food_name."</td>";
            echo "<td><img width=\"150\" height=\"100\" src='".$food_image."'/></td>";
            echo "<td>".$category_name."</td>";
            echo "<td>₱ ".$food_price."</td>";
            if($availability == 0){
              echo "<td class=\" btn-danger\">Not Available</td>";
              }else{
                echo "<td class=\" btn-success\">Available</td>";
              }
            echo "<td><form action=\"\" method=\"post\">
                                      <input type=\"hidden\" value=".$food_ID." name=\"id\">  
                                      <a> <input type=\"submit\" class=\"fa fa-edit\" value=\"Edit\" name=\"submit\"\> 
                                      </a>";
                                        echo"
                                      <a class = \"fa fa-fw fa-trash-o\" href=\"backend/menu/menu_delete.php?id=".$food_ID."\" onclick=\"return confirm('Confirm Delete');\"></a>
                                   
                                   </form>

                            </td>";
          }
          echo "</tr>";
    }//end while($row = mysqli_fetch_assoc($result))
  }//end if (mysqli_num_rows($result) > 0)

echo"                <!-- Add Meal -->";

echo"   <div id=\"myModalAdd\" class=\"modal\">
          <div class=\"modal-dialog\">
            <div class=\"modal-content\">
              <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                  <span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\">Add Meal</h4>
              </div>
              <div class=\"modal-body\">
                
                 <!-- form start -->
            <form role=\"form\" action=\"backend/menu/menu_insert.php\" method=\"post\" enctype=\"multipart/form-data\">
              <div class=\"box-body\">
                
                <div class=\"form-group\">
                  <label for=\"product_ID\">Food Code</label>
                  <input type=\"text\" class=\"form-control\" id=\"product_ID\" name=\"product_ID\" placeholder=\"Enter Food ID\"required>
                </div>
                
                <div class=\"form-group\">
                  <label for=\"food_name\">Meal Name</label>
                  <input type=\"text\" class=\"form-control\" id=\"food_name\" name=\"food_name\" placeholder=\"Enter Food Name\"required>
                </div>
                <div class=\"form-group\">
                  <label for=\"food_price\">Price</label>
                  <input type=\"number\" class=\"form-control\" id=\"food_price\" name=\"food_price\" placeholder=\"Price\" required>
                </div>
        
        <!-- select -->";
              echo"  <div class=\"form-group\">";
              echo"    <label>Meal Type</label>";
              echo"    <select class=\"form-control\" id=\"category_ID\" name=\"category_ID\">";
              $sql = "SELECT * FROM `food_category` ";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) { 
              // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                    $category_id = $row['category_ID'];
                    $category_name = $row['category_name'];      
                    echo"<option value=".$category_id.">".$category_name."</option>";
                  }
                }    
                  echo"</select>";
              echo"  </div>

                 <div class=\"form-group\">
                  <label for=\"exampleInputImage\">Image</label>
                  <input type=\"file\" name=\"file\" accept=\"image/x-png,image/jpeg\" class=\"form-control\" id=\"exampleInputImage\" required>
                </div>

              <div class=\"modal-footer\">
                <button type=\"submit\" name=\"Submit\" class=\"btn btn-primary\" value=\"Submit\">Add Meal</button>
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
                  <th>Food name</th>
                  <th>Food Image</th>
                  <th>Category</th>
                  <th>Food Price</th>
                  <th>Availability</th>
                  <th>Action</th>
                </tfoot>
        </table>
      </div>

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
<script>
var a = "<?php echo $_GET ["err"];?>";
 
 if(a==1){
   a = "Meal Inserted Successfully";
   alert(a);
 }else if(a==2){
   a = "Meal Deleted Successfully";
   alert(a);
 }else{
  a = "Meal Updated Successfully";
   alert(a);
 }
</script>   

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
     
</body>
</html>