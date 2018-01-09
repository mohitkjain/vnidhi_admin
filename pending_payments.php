<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
<?php 
   $url = "http://test.vaibhavnidhi.com/api/admin/rd/due";
   header('Content-type: application/json');
   $data = file_get_contents($url);
   $rd_due_data = json_decode($data);

   if(isset($rd_due_data))
   {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>RD Due Till Current Month </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pending Payments</li>
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
                    <th>Lead ID</th>
                    <th>Customer Name</th>
                    <th>Installment Number</th>
                    <th>Creator Name</th>
                    <th>Assignee Name</th>
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th class="sorting_disabled">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($rd_due_data as $rd_data):?>
                  <tr>
                    <td><?php echo $rd_data->lead_id;  ?></td>
                    <td id="cname_<?php echo $rd_data->lead_id;  ?>"><?php echo $rd_data->c_name;  ?></td>
                    <td id="installment_<?php echo $rd_data->lead_id;  ?>"><?php echo $rd_data->installment_no;  ?></td>
                    <td id="creator_<?php echo $rd_data->lead_id;  ?>"><?php echo $rd_data->creator_name;  ?></td>
                    <td id="assignee_<?php echo $rd_data->lead_id;  ?>"><?php echo $rd_data->assignee_name;  ?></td>
                    <td id="amount_<?php echo $rd_data->lead_id;  ?>"><?php echo $rd_data->amount;  ?></td>
                    <td id="due_<?php echo $rd_data->lead_id; ?>"><?php echo $rd_data->due_date;  ?></td>
                    <td><a href="#" class="amount_recieve_btn"><i class="fa fa-edit"></i>Amount Received</a></td>
                  </tr>
                  <?php endforeach; } ?>  
                </tbody>
                <tfoot>
                  <tr>
                    <th>Lead ID</th>
                    <th>Customer Name</th>
                    <th>Installment Number</th>
                    <th>Creator Name</th>
                    <th>Assignee Name</th>
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th>Action</th>
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
