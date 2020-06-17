<?php
session_start();
include 'backend/PHPtoMySQL.php';

   // Check user login or not
   if (!isset($_SESSION["unameMobBook"])) {
    // logged in
     header('Location: index4.php');
     }
$guest_ID = $_GET['ID'];
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
<div class="box">
        <div class="box-header">
        <a type="button" href="mobile_home_booking.php?ID=<?php echo $guest_ID; ?>" class="btn btn-primary">Home</a>
        </div>
        <h4 class="box-title">Booking Tracker</h4>
            <a type="button" href="booking_mob.php?ID=<?php echo $guest_ID; ?>" id="btnAddroom" class="btn btn-small btn-primary dropdown-toggle">
              <i class="glyphicon glyphicon-plus"></i>Book a Room
          </a>
         <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="3%">Room Name</th>
                  <th width="3%">Status</th>
                  <th width="7%">Approve/Not Approved?</th>
                  <th width="3%">Action</th>
                </tr>
                </thead>
                <tbody>   
                  <?php
                    $sql = "SELECT r.room_ID, b.booking_ID, r.room_name, b.number_guest, b.booking_approve, b.status, b.booking_approve_time FROM guest g, room r, booking b WHERE g.guest_id=b.guest_id AND r.room_ID=b.room_ID AND b.status = 1 AND g.guest_id=".$guest_ID;
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) { 
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                    $room_ID          = $row['room_ID'];
                    $booking_ID       = $row['booking_ID'];
                    $room_name        = $row['room_name'];
                    $booking_approve  = $row['booking_approve'];
                    $status           = $row['status'];

          echo "<tr>";
            echo "<td>".$room_name."</td>";
        //booking status
          if($status == 0){
            echo "<td class=\" btn-danger\">Not Active</td>";
            }else{
              echo "<td class=\" btn-success\">Active</td>";
            }

            if($booking_approve == 0){
                echo "<td class=\" btn-danger\">Not Approved</td>";
                }else{
                  echo "<td class=\" btn-success\">Approved</td>";
                }

            if($booking_approve == 1){    
                if($status == 1){
                  echo"<td><a type=\"button\" href=\"mobile_home.php?booking_ID=" . $booking_ID . "&room_ID=" . $room_ID . "&ID=".$guest_ID."\" class=\"btn btn-small btn-primary\">Make Order</a><td>";
                }else{
                  echo"<td></td>";
                }
            }else{
              echo"<td></td>";
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
                  <th width="3%">Room Name</th>
                  <th width="3%">Status</th>
                  <th width="7%">Approve/Not Approved?</th>
                  <th width="3%">Action</th>
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
    }else if(a==2){
        setTimeout(function() {
        $.bootstrapGrowl("Booking Deleted!", { type: 'success' });
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