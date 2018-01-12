<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
<?php 
   $url = "http://test.vaibhavnidhi.com/api/admin/redemption/policy";
   header('Content-type: application/json');
   $data = file_get_contents($url);
   $redemption_data = json_decode($data);
   $no = 0;
   if(count($redemption_data) > 0)
   {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Redemption Policy </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Rewards</a></li>
        <li class="active">Redemption Policy</li>
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
                    <th>S. No.</th>
                    <th>Rewards Points</th>
                    <th>Reward</th>
                    <th class="sorting_disabled">Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach($redemption_data as $redemption):
                      $data = base64_encode($redemption->id.'_'.$redemption->rewards_points.'_'.$redemption->reward);
                  ?>
                  <tr>
                    <td><?php echo ++$no;  ?></td>
                    <td>
                      <script>
                        var a = <?php echo $redemption->rewards_points;  ?>;
                        document.write(a.toLocaleString("en-IN"));
                      </script> 
                    </td>
                    <td><?php echo $redemption->reward;  ?></td>
                    <td><a href='edit_redemption_policy.php?data="<?php echo $data; ?>"' class='edit_redemption_btn' id='edit_' data-toggle='tooltip' title='Edit'><i class='fa fa-edit'></i>Edit</a></td>
                  </tr>
                  <?php endforeach; } ?> 
                </tbody>
                </tfoot>
                  <tr>
                    <th>S. No.</th>
                    <th>Rewards Points</th>
                    <th>Reward</th>
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
