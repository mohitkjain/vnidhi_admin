<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
<?php 
   $url = "http://test.vaibhavnidhi.com/api/admin/schemes";
   //header('Content-type: application/json');
   $data = file_get_contents($url);
   $schemes_data = json_decode($data);
   
   if(isset($schemes_data))
   {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>View Schemes </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Schemes</li>
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
                    <th>Scheme ID</th>
                    <th>Scheme Name</th>
                    <th>Scheme Type</th>
                    <th>Minimum Amount</th>                  
                    <th>Rate Exist</th>
                    <th>Multiple Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($schemes_data as $scheme_data):
                      $id = base64_encode($scheme_data->scheme_id.'_'.$scheme_data->scheme_name.'_'.$scheme_data->scheme_type.'_'.$scheme_data->minimum_amount.'_'.$scheme_data->rate_exists.'_'.$scheme_data->multiple_amount);
                    ?>
                    <tr>
                      <td><?php echo $scheme_data->scheme_id;  ?></td>
                      <td><a href="scheme_details.php?id=<?php echo $id; ?>"><?php echo $scheme_data->scheme_name;  ?></a></td>
                      <td>
                        <?php 
                          if($scheme_data->scheme_type === 'FD')
                          {
                            echo 'Fixed Deposit';
                          }
                          else
                          {
                            echo 'Recurring Deposit';
                          }
                        ?>
                      </td>
                      <td>
                        <script>
                          var a = <?php echo $scheme_data->minimum_amount; ?>;
                          document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                        </script>
                      </td>
                      <td>
                        <?php 
                          if($scheme_data->rate_exists == 1)
                          {
                            echo 'Yes';
                          }
                          else
                          {
                            echo 'No';
                          }
                        ?>
                      </td>
                      <td>
                        <script>
                          var a = <?php echo $scheme_data->multiple_amount; ?>;
                          document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                        </script>
                      </td>
                    </tr>
                  <?php endforeach; 
                  }
                  else
                  {
                      echo '<script> window.location = "error.php"; </script>';
                  }
                  ?> 
                </tbody>
                <tfoot>
                  <tr>
                    <th>Scheme ID</th>
                    <th>Scheme Name</th>
                    <th>Scheme Type</th>
                    <th>Minimum Amount</th>                  
                    <th>Rate Exist</th>
                    <th>Multiple Amount</th>
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
