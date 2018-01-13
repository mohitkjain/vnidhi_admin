<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
<?php 
  if($_SERVER['REQUEST_METHOD']=='GET')
  {
    //getting the request values 
    $data = trim($_REQUEST['id']);
    $data = base64_decode($data);
    list($scheme_id, $scheme_name, $scheme_type, $minimum_amount, $rate_exists, $multiple_amount) = preg_split('[_]', $data);
   
    $url = "http://test.vaibhavnidhi.com/api/admin/schemes/".$scheme_id."/".$rate_exists;
    //header('Content-type: application/json');
    $data = file_get_contents($url);
    $schemes_data = json_decode($data);
   
    if(isset($schemes_data))
    {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Scheme Info</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="view_schemes.php">View Schemes</a></li>
        <li class="active">Scheme Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">      
			    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Basic Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-info"></i> Scheme Name</strong>
              <p class="text-muted"><?php echo $scheme_name; ?></p>
              <hr>
              <strong><i class="fa fa-folder"></i> Scheme Type</strong>
              <p class="text-muted"><?php if($scheme_type === 'FD'){ echo 'Fixed Deposit';} else { echo 'Recurring Deposit';}?></p>
              <hr>
              <strong><i class="fa fa-rupee"></i> Minimum Amount &amp; Multiple Amount</strong>
              <p class="text-muted">
              <script>
                  var a = <?php echo $minimum_amount; ?>;
                  var b = <?php echo $multiple_amount; ?>;
                  var a = a.toLocaleString("en-IN",{style:"currency",currency:"INR"});
                  var b = b.toLocaleString("en-IN",{style:"currency",currency:"INR"});
                  document.write(a + " & " + b);
              </script>
               </p>
              <hr>
              <strong><i class="fa fa-hand-o-right"></i> Rate Exists</strong>
              <p><?php if($rate_exists == 1){ echo 'Yes';} else { echo 'No';}?></p>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-6">      
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Scheme Rates</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-striped">
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Scheme ID</th>
                        <th>Months</th>
                        <th><?php if($rate_exists == 1){ echo 'Interest Rate';} else { echo 'Amount';}?></th>                  
                      </tr>
                      <?php 
                        $no = 0;
                        foreach($schemes_data as $data) 
                        {
                          $no++;
                      ?>
                          <tr>
                            <td><?php echo $no; ?>.</td>
                            <td><?php echo $scheme_id; ?></td>
                            <td><?php echo $data->months. " Months"; ?></td>
                            <td><span class="badge bg-light-blue"> 
                            <?php
                              if($rate_exists == 1)
                              {
                                  echo $data->interset_rate_amount."%";
                              }
                              else
                              {
                                if($scheme_id == 8)
                                {
                                  echo "1.5 * Amount";
                                }
                                else
                                {
                            ?>
                                <script>
                                  var a = <?php echo $data->interset_rate_amount; ?>;
                                  document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                                </script>
                            
                            <?php
                                } 
                              }
                            ?>
                            </td>
                          </tr>
                      <?php
                          }
                        }
                      } 
                      else
                      {
                          echo '<script> window.location = "error.php"; </script>';
                      }
                      ?>
                    </table>
                  </div>
                  <!-- /.box-body -->
              </div>
            </div>
            <?php 
              if($rate_exists == 0)
              {
            ?>
                <div class="col-md-12">
                  <div class="box box-solid">
                    <div class="box-body">
                      <p class="text-muted" ><script>
                                      var b = '*The amount will be addded into maturity amount in multilples of';
                                      var a = <?php echo $multiple_amount; ?>;
                                      document.write(b + " " + a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                                    </script> </p>
                    </div>
                    <!-- /.box-body -->
                  </div>
                </div>
            <?php   
              }
            ?>
          </div>
        </div>
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
