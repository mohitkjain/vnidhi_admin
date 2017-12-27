<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>View Users </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">View Users</li>
      </ol>
    </section>

    <?php
      $url = "http://test.vaibhavnidhi.com/api/users";
      header('Content-type: application/json');
      $data = file_get_contents($url);
      $user_data = json_decode($data);

      if(isset($user_data))
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
                  <th>User ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Login ID</th>
                  <th>User Type</th>
                  <th>Employee ID</th>
                  <th>Position</th>
                  <th>Teamleader</th>
                  <th>Status</th>
                  <th class="sorting_disabled">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($user_data as $user):?>
                  <tr>
                    <td><?php echo $user->user_id;  ?></td>
                    <td><?php echo $user->fname;  ?></td>
                    <td><?php echo $user->lname;  ?></td>
                    <td><?php echo $user->loginid;  ?></td>
                    <td><?php echo $user->usertype;  ?></td>
                    <td><?php echo $user->empid;  ?></td>
                    <td><?php echo $user->position;  ?></td>
                    <td><?php echo $user->tl_name;  ?></td>
                    <td><?php if($user->active == 1)
                              {
                                  echo 'Active';
                              }
                              else
                              {
                                  echo 'Inactive';
                              }  ?>
                    </td>
                    <td>
                    <?php  if($user->active == 1) {?>
                        <a href="user.php" class="edt_btn"><i class="fa fa-edit"></i></a>
                      <?php }else{ ?>
                        <a href="#" class="not_active"><i class="fa fa-edit"></i></a>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php endforeach; } ?>                
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
