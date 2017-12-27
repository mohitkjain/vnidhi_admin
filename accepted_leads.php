<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Accepted Leads </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Leads</a></li>
        <li class="active">Accepted Leads</li>
      </ol>
    </section>

    <?php
      $url = "http://test.vaibhavnidhi.com/api/admin/accepted_leads";
      header('Content-type: application/json');
      $data = file_get_contents($url);
      $accepted_leads_data = json_decode($data);

      if(isset($accepted_leads_data))
      {
    ?>
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
                    <th>Lead ID</th>
                    <th>Customer Name</th>
                    <th>Creator Name</th>
                    <th>Assignee Name</th>
                    <th>Date Created</th>
                    <th>Date Accepted</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php foreach($accepted_leads_data as $lead_data):?>
                      <td><a href="leads_details.php"><?php echo $lead_data->lead_id; ?></a></td>
                      <td><?php echo $lead_data->c_name; ?></td>
                      <td><?php echo $lead_data->creator_name; ?></td>
                      <td><?php echo $lead_data->assignee_name; ?></td>
                      <td><?php echo $lead_data->date_created; ?></td>
                      <td><?php echo $lead_data->closing_date; ?></td>
                  </tr>
                  <?php endforeach; } ?> 
                </tbody>
                <tfoot>
                  <tr>
                    <th>Lead ID</th>
                    <th>Customer Name</th>
                    <th>Creator Name</th>
                    <th>Assignee Name</th>
                    <th>Date Created</th>
                    <th>Date Accepted</th>
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

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
