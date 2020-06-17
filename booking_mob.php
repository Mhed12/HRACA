<?php
session_start();
include 'backend/PHPtoMySQL.php';

   // Check user login or not
   if (!isset($_SESSION["unameMobBook"])) {
    // logged in
     header('Location: index4.php');
     }

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
            <a type="button" href="mobile_home_booking.php?ID=<?php echo $_GET["ID"]; ?>" class="btn btn-primary">Home</a>
          <h4 class="modal-title">Book a Room</h4>
          
        </div>

   <!-- form start -->
   <form role="form" action="backend/mobile/booking_insert_mob.php?ID=<?php echo $_GET["ID"];?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
<?php
              echo"<!-- select room name -->";
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
              <label for=\"number_guest\">Numeber of Guest</label>
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
                <button type=\"submit\" name=\"Submit\" class=\"btn btn-primary\" value=\"Submit\">Send Request</button>
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
    }else if(a==5){
        setTimeout(function() {
        $.bootstrapGrowl("The Number of Guest is Greater to the Room Capacity!", { type: 'danger' });
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