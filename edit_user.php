<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit User</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Users</a></li>
        <li class="active">Edit User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">      

            <div class="box box-primary">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
					 <div class="box-header with-border">
       
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="user_id">User ID:</label>
                  <input type="text" class="form-control" id="user_id" placeholder="First Name" value = <?php ?> disabled>
                </div>
				<div class="form-group">
                  <label for="FirstName">First Name:*</label>
                  <input type="text" class="form-control" id="FirstName" placeholder="First Name">
                </div>
				 <div class="form-group">
                  <label for="LastName">Last Name:*</label>
                  <input type="text" class="form-control" id="LastName" placeholder="Last Name">
                </div>
                <div class="form-group">
                  <label for="LoginID">Login ID:*</label>
                  <input type="text" class="form-control" id="LoginID" placeholder="Login ID">
                </div>
				<div class="form-group">
                <label>User Type:*</label>
                <select class="form-control select2" style="width: 100%;">
                  <option>Head</option>
				  <option>Teamleader</option>  
                  <option>Telecaller</option>                                  
				  <option selected="selected">Salaried</option>
                </select>
              	</div>
                 <div class="form-group">
                  <label for="Position">Position:*</label>
                  <input type="text" class="form-control" id="Position" placeholder="Position">
                </div>
				<div class="form-group">
                  <label for="EmployeeID">Employee ID:*</label>
                  <input type="text" class="form-control" id="EmployeeID" placeholder="Employee ID (Please Enter Numeric)">
                </div>
				<div class="form-group">
                <label>Teamleader:*</label>
                <select class="form-control select2" style="width: 100%;">
                  <option>Head</option>
				  <option>Teamleader</option>  
                  <option>Telecaller</option>                                  
                </select>
              	</div>          
              </div>
              <!-- /.box-body -->
			<div class="form-group">
				<input class="btn btn-success" type="submit" value="Submit"> 
				<button class="btn btn-default pull-right"><a href="#">Cancel</a></button>
			</div>
  
            </form>
					</div>
				</div>
           
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
    
  })
</script>
</body>
</html>
