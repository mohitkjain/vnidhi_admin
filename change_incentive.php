<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Change Incentive</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Incentive</a></li>
        <li class="active">Change Incentive</li>
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
                  <label>Select Scheme:*</label>
                  <select class="form-control select2" placeholder="Select Scheme" style="width: 100%;">
                    <option>RD</option>
                    <option>FD</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Select User Type:*</label>
                  <select class="form-control select2" placeholder="Select User Type" style="width: 100%;">
                    <option>Salaried</option>
                    <option>Telecaller</option>
                    <option>Head</option>
                    <option>Teamleader</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Select Type of Lead:*</label>
                  <select class="form-control select2" placeholder="Select Type of Lead" style="width: 100%;">
                    <option>Company Lead</option>
                    <option>Direct Lead</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Select Months:*</label>
                  <select class="form-control select2" placeholder="Select Months" style="width: 100%;">
                    <option>6</option>
                    <option>12</option>
                    <option>24</option>
                    <option>36</option>
                    <option>48</option>
                    <option>60</option>
                  </select>
                </div>
                <div class="form-group">
                    <label>Set Incentive(%):*</label>
                    <input type="text" class="form-control" placeholder="Set Incentive(%)">
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
