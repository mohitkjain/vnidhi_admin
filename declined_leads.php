<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Declined Leads </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Leads</a></li>
        <li class="active">Declined Leads</li>
      </ol>
    </section>
    <?php
      $url = "http://test.vaibhavnidhi.com/api/admin/declined_leads";
      header('Content-type: application/json');
      $data = file_get_contents($url);
      $declined_leads_data = json_decode($data);

      if(isset($declined_leads_data))
      {
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">      

          <div class="box">            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped leads_table">
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
                    <?php foreach($declined_leads_data as $lead_data):?>
                      <td><?php echo $lead_data->lead_id; ?></td>
                      <td><?php echo '<a href="leads_details.php?lead_id=' .$lead_data->lead_id.'">'.$lead_data->c_name.'</a>'; ?></td>
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
