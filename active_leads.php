<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Active Leads </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Leads</a></li>
        <li class="active">Active Leads</li>
      </ol>
    </section>
    <?php
      $url = "http://test.vaibhavnidhi.com/api/admin/active_leads";
      //header('Content-type: application/json');
      $data = file_get_contents($url);
      $active_leads_data = json_decode($data);

      if(isset($active_leads_data))
      {
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">      

          <div class="box box-warning">            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped leads_table">
                <thead>
                  <tr>
                    <th>Lead ID</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                    <th>Creator Name</th>
                    <th>Assignee Name</th>
                    <th>Date Created</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php foreach($active_leads_data as $lead_data):?>
                    <td><?php echo $lead_data->lead_id; ?></td>
                    <td><?php echo '<a href="leads_details.php?lead_id=' .$lead_data->lead_id.'">'.$lead_data->c_name.'</a>'; ?></td>
                    <td><span class="label label-<?php 
                                                    if($lead_data->status === 'Telecalling Done') 
                                                    {
                                                      echo 'telecalling';
                                                    }
                                                    else if($lead_data->status === 'Home Meeting')
                                                    {
                                                      echo 'home-meeting';
                                                    }
                                                    else if($lead_data->status === 'Follow Up')
                                                    {
                                                      echo 'follow-up';
                                                    }
                                                    else if($lead_data->status === 'Request Pending')
                                                    {
                                                      echo 'request-pending';
                                                    }                                                                    
                                                  ?>"><?php echo $lead_data->status; ?></span>
                    </td>
                    <td><?php echo $lead_data->creator_name; ?></td>
                    <td><?php echo $lead_data->assignee_name; ?></td>
                    <td><?php echo $lead_data->date_created; ?></td>
                  </tr>
                  <?php endforeach; } 
                   else
                   {
                       echo '<script> window.location = "error.php"; </script>';
                   }
                  ?> 
                </tbody>
                <tfoot>
                 <tr>
                    <th>Lead ID</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                    <th>Creator Name</th>
                    <th>Assignee Name</th>
                    <th>Date Created</th>
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
