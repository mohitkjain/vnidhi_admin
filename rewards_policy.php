<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
<?php 
   $url = "http://test.vaibhavnidhi.com/api/admin/rewards/schemes";
   //header('Content-type: application/json');
   $data = file_get_contents($url);
   $rewards_data = json_decode($data);
   
   if(count($rewards_data) > 0)
   {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Rewards Policy </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Rewards</a></li>
        <li class="active">Rewards Policy</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">      

          <div class="box">            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>User Type</th>
                    <th>Lead Type</th>
                    <th>Year</th>
                    <th>Rewards Percent</th>
                    <th class="sorting_disabled">Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($rewards_data as $reward_data):?>
                  <tr>
                    <td><?php echo $reward_data->user_type;  ?></td>
                    <td><span class="label label-<?php 
                                                    if($reward_data->lead_type === 'company_lead') 
                                                    {
                                                      echo 'company';
                                                    }
                                                    else
                                                    {
                                                      echo 'direct';
                                                    }                                                                      
                                                  ?>">
                      <?php 
                          if($reward_data->lead_type === 'company_lead')
                          {
                            $lead_type = 'company';
                            echo 'Company Lead';
                          }
                          else
                          {
                            $lead_type = 'direct';
                            echo 'Direct Lead';
                          }
                          $data = base64_encode($reward_data->id.'_'.$reward_data->user_type.'_'.$lead_type.'_'.$reward_data->year_wise.'_'.$reward_data->reward_per);
                      ?>
                      </span>
                    </td>
                    <td>
                      <?php 
                          if($reward_data->year_wise == 1)
                          {
                            echo '1st Year';
                          }
                          else
                          {
                            echo 'More than One Year';
                          }
                      ?>
                    </td>
                    <td><?php echo $reward_data->reward_per;  ?>%</td>
                    <td><a href='edit_reward_scheme.php?data="<?php echo $data; ?>"' class='edit_rewards_btn' id='edit_' data-toggle='tooltip' title='Edit'><i class='fa fa-edit'></i>Edit</a></td>
                  </tr>
                  <?php endforeach; 
                }
                else
                {
                    echo '<script> window.location = "error.php"; </script>';
                }
                ?> 
                </tbody>
                </tfoot>
                  <tr>
                    <th>User Type</th>
                    <th>Lead Type</th>
                    <th>Year</th>
                    <th>Rewards Percent</th>
                    <th>Action </th>
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
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
