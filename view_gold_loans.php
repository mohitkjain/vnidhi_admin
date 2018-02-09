<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>View Gold Loans </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Loans</a></li>
        <li class="active">View Gold Loans</li>
      </ol>
    </section>
    <?php
      $url = "http://test.vaibhavnidhi.com/api/admin/gold_loans";
      //header('Content-type: application/json');
      $data = file_get_contents($url);
      $view_gold_loans = json_decode($data);

      if(isset($view_gold_loans))
      {
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">      

          <div class="box box-danger">            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped leads_table">
                <thead>
                  <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Loan Account</th>
                    <th>Date</th>
                    <th>Loan Amount</th>
                    <th>Loan Period</th>
                    <th>Interest Rate</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php foreach($view_gold_loans as $loan_data):?>
                      <td><?php echo $loan_data->customer_id; ?></td>
                      <td><?php echo '<a href="gold_loan_invoice.php?loan_id='.$loan_data->id.'">'.$loan_data->c_name.'</a>'; ?></td>
                      <td><?php echo $loan_data->loan_number; ?></td>
                      <td><?php echo $loan_data->loan_date; ?></td>
                      <td><?php echo $loan_data->loan_amount; ?></td>
                      <td><?php echo $loan_data->loan_period; ?></td>
                      <td><?php echo $loan_data->loan_interest; ?></td>
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
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Loan Account</th>
                        <th>Date</th>
                        <th>Loan Amount</th>
                        <th>Loan Period</th>
                        <th>Interest Rate</th>
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
