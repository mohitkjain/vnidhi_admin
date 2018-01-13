<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>

<?php 

if($_SERVER['REQUEST_METHOD']=='GET')
{
  //getting the request values 
  $data = trim($_REQUEST['data']);
  $data = base64_decode($data);
  list($val, $user_id, $user_type, $total_rewards, $redeem_points, $available_points) = preg_split('[_]', $data);

  $url = 'http://test.vaibhavnidhi.com/api/rewards';
  $ch = curl_init();

  $post_data = "user_id=".$user_id."&usertype=".$user_type;
                                
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_VERBOSE, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, 0);// No header in the result
  
  // Fetch and return content, save it.
  $output_data= curl_exec($ch);
  curl_close($ch);

  if(!empty($output_data))
  {
    $json_data = json_decode($output_data);
  }
}
else
{
    echo '<script> window.location = "error.php"; </script>';
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Rewards Details</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Rewards</a></li>
        <li><a href="view_rewards.php">View Rewards</a></li>
        <li class="active">Rewards Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-trophy"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">FD Rewards Point</span>
              <span class="info-box-number">
                <script>
                  var a = <?php echo $json_data->total_fd_reward; ?>;
                  document.write(a.toLocaleString("en-IN"));
                </script>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-trophy"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">RD Rewards Point</span>
              <span class="info-box-number">
                <script>
                  var a = <?php echo $json_data->total_rd_reward; ?>;
                  document.write(a.toLocaleString("en-IN"));
                </script>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-star-half-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Redeem Rewards</span>
              <span class="info-box-number"><?php echo $redeem_points; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Available Rewards Point</span>
              <span class="info-box-number"><?php echo $available_points; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>		
      <!-- /.row -->

      <div class="row">
        <div class="col-xs-12">      
          <div class="box">            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Lead ID</th>
                    <th>Customer Name</th>
                    <th>Installment No</th>
                    <th>Date </th>
                    <th>Amount </th>
                    <th>Reward Points</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  
                  if(count($json_data->reward->rd_reward) > 0)
                  {
                    foreach($json_data->reward->rd_reward as $rd_data)
                    {                  
                ?>
                <tr>
                  <td><?php echo $rd_data->lead_id; ?></td>
                  <td><a href="leads_details.php?lead_id=<?php echo $rd_data->lead_id; ?>"><?php echo $rd_data->c_name; ?></a></td>
                  <td><?php echo $rd_data->installment_no; ?></td>            
                  <td><?php echo $rd_data->date; ?></td>
                  <td>
                    <script>
                      var a = <?php echo $rd_data->amount;  ?>;
                      document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                    </script>
                  </td>
                  <td>
                    <script>
                      var a = <?php echo $rd_data->current_reward;  ?>;
                      document.write(a.toLocaleString("en-IN"));
                    </script> 
                  </td>
                </tr>
                <?php
                    }
                  }
                  if(count($json_data->reward->fd_reward) > 0)
                  {
                    foreach($json_data->reward->fd_reward as $fd_data)
                    {                  
                ?>
                <tr>
                  <td><?php echo $fd_data->lead_id; ?></td>
                  <td><a href="leads_details.php?lead_id=<?php echo $rd_data->lead_id; ?>"><?php echo $fd_data->c_name; ?></td>
                  <td><?php echo 'Fixed Deposit'; ?></td>            
                  <td><?php echo $fd_data->date; ?></td>
                  <td>
                    <script>
                      var a = <?php echo $fd_data->amount;  ?>;
                      document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                    </script> 
                  </td>
                  <td>
                    <script>
                      var a = <?php echo $fd_data->current_reward;  ?>;
                      document.write(a.toLocaleString("en-IN"));
                    </script> 
                  </td>
                </tr>
                <?php
                    }
                  } 
                ?>
                </tbody>
                <tfoot>  
                  <tr>
                    <th>Lead ID</th>
                    <th>Customer Name</th>
                    <th>Installment No</th>
                    <th>Date </th>
                    <th>Amount </th>
                    <th>Reward Points</th>
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
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
	  <span>Made by <a href="https://www.techradius.net/" target="_blank">Techradius Hitech Pvt. Ltd.</a> All Rights Reserved. A part of   <a href="http://www.vaibhv.com/" target="_blank">Vaibhav Group</a>.</span>
  </footer>
  
</div>
<!-- ./wrapper -->


<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
