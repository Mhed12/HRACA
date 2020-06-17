<?php
session_start();
include 'backend/PHPtoMySQL.php';

   // Check user login or not
   if (!isset($_SESSION["unameMobBook"])) {
    // logged in
     header('Location: index4.php');
     }
$order_ID = $_GET['order_ID'];
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
<div class="box">
        <div class="box-header">
        <a type="button" href="mobile_home.php?ID=<?php echo $guest_ID; ?>&booking_ID=<?php echo $booking_ID; ?>&room_ID=<?php echo $room_ID; ?>" class="btn btn-primary">Home</a>
        </div>
        <h4 class="box-title">Order Details</h4>
          </a>
         <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>Food Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Sub Total</th>
                </tr>
                </thead>
                <tbody>   
                  <?php
            //for the details
            $sql    = "SELECT p.product_name, f.food_price, ol.quantity, ol.subtotal
            FROM food f, product p, order_line ol, orders o 
            WHERE o.order_ID = $order_ID
            AND o.order_ID = ol.order_ID
            AND f.product_ID = p.product_ID 
            AND p.product_ID = ol.product_ID  
            AND p.product_type = \"food\" ";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_name        = $row['product_name'];
                    $food_price          = $row['food_price'];
                    $quantity            = $row['quantity'];
                    $subtotal            = $row['subtotal'];

                   echo" <tr>
                            <td>$product_name</td>
                            <td>$quantity</td>
                            <td>₱$food_price</td>
                            <td>₱$subtotal</td>
                        </tr>";
                }
            }    
      
           echo" </tbody>";
          echo" <tfoot>
           <tr>";
             echo"<th id=\"total\" colspan=\"3\">Total :</th>";
                        //for total

                        $sql2    = "SELECT  SUM(ol.subtotal) as 'total' 
                        FROM food f, product p, order_line ol, orders o 
                        WHERE o.order_ID = $order_ID
                        AND o.order_ID = ol.order_ID
                        AND f.product_ID = p.product_ID 
                        AND p.product_ID = ol.product_ID  
                        AND p.product_type = \"food\" ";
            
                        $result2 = mysqli_query($conn, $sql2);
            
                        if (mysqli_num_rows($result2) > 0) {
                            // output data of each row
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $total               = $row2['total'];
            
                               echo" <td><b>₱$total</b></td> ";
                            }
                        }
     echo"</tbody>
                 <tfoot>
                <tr>
                <th>Food Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Sub Total</th>
                </tr>
                </tfoot>
              </table>";
              echo"<div class=\"modal-footer\">";
                
              echo"<a type=\"button\" href=\"order_tracker.php?booking_ID=" . $booking_ID . "&room_ID=" . $room_ID . "&ID=".$guest_ID."\" class=\"btn btn-primary\">Close</a>
              </div>";


              mysqli_close($conn);
              ?>
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