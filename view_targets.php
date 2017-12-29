<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <?php
      $url = "http://test.vaibhavnidhi.com/api/admin/get_targets";
      header('Content-type: application/json');
      $data = file_get_contents($url);
      $targets_data = json_decode($data);

      if(isset($targets_data))
      {
        $user_name; $position; $current_target; $current_achieved; $pre_target; $pre_achieved; 
    ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>View Targets </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Targets</a></li>
        <li class="active">View Target</li>
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
                  <th>User Name</th>
                  <th>Position</th>
                  <th>Current Month Target</th>
                  <th>Current Month Achieved</th>
                  <th>Previous Month Target</th>
                  <th>Previous Month Achieved</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($targets_data as $key=>$target_data):?>
                  <tr>
                    <td><?php echo $target_data->user_name; ?></td>
                    <td><?php echo $target_data->position; ?></td>
                    <td><?php echo $target_data->current_month_target; ?></td>
                    <td><?php echo $target_data->current_month_achieved; ?></td>
                    <td><?php echo $target_data->pre_month_target; ?></td>
                    <td><?php echo $target_data->pre_month_achieved; ?></td>
                  </tr>
                  <?php endforeach; } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>User Name</th>
                    <th>Position</th>
                    <th>Current Month Target</th>
                    <th>Current Month Achieved</th>
                    <th>Previous Month Target</th>
                    <th>Previous Month Achieved</th>
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
