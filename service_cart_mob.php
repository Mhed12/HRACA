<?php
session_start();
include 'backend/PHPtoMySQL.php';

   // Check user login or not
   if (!isset($_SESSION["unameMobBook"])) {
    // logged in
     header('Location: index4.php');
     }

     $booking_ID =$_GET['booking_ID'];
     $room_ID    =$_GET['room_ID'];
     $guest_ID   =$_GET['ID'];

?>
<!DOCTYPE html>
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
<body class="hold-transition skin-blue sidebar-mini" data-spy="scroll" data-target=".navbar" data-offset="50">
        <div class="modal-content">
        <div class="modal-header">
          <!--<a type="button" href="orders.php" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span></a>-->
            <a type="button" href="mobile_home.php?ID=<?php echo $guest_ID; ?>&booking_ID=<?php echo $booking_ID; ?>&room_ID=<?php echo $room_ID; ?>" class="btn btn-primary">Home</a>
          <h4 class="modal-title">Service Order</h4>
          
        </div>

   <!-- form start -->
   <form role="form" action="backend/mobile/service_line_insert_mob.php?ID=<?php echo $guest_ID; ?>&booking_ID=<?php echo $booking_ID; ?>&room_ID=<?php echo $room_ID; ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
<?php
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
                          </form>";
?>
    <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 2.2.3 -->
  <script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="assets/plugins/jQuery/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <!-- Bootstrap 3.3.7 -->
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
  <!-- bootstrapt-growl -->
  <script src="assets/js/jquery.bootstrap-growl.js"></script>

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

  <!-- modal data tables -->
  <script type="text/javascript">     
  var a = "<?php echo $_GET["err"];?>";
    if(a==1){
      setTimeout(function() {
        $.bootstrapGrowl("Request Sent!", { type: 'success' });
      }, 1000); 
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