<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <?php
      session_start();
      $user_id = $_SESSION['pay_user_id'];
      $usertype = $_SESSION['pay_usertype'];
      $month = $_SESSION['pay_month'];
      $year = $_SESSION['pay_year'];
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pay Incentive</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
		    <li><a href="#">Incentive</a></li>
        <li><a href="unpaid_incentives.php">Unpaid Incentive</a></li>
        <li class="active">Pay Incentive</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                    <label>User Name:</label>
                    <input type="text" class="form-control" placeholder="User Name" id="user_name" name="user_name" value = "<?php echo $_SESSION['pay_username']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Position:</label>
                    <input type="text" class="form-control" placeholder="Position" id="position" name="position" value = "<?php echo $_SESSION['pay_position']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>User Type:</label>
                    <input type="text" class="form-control" placeholder="User Type" id="user_type" name="user_type" value = "<?php echo $_SESSION['pay_usertype']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Month &amp; Year:</label>
                    <input type="text" class="form-control" placeholder="Month and Year" id="month" name="month" value = "<?php echo $_SESSION['pay_monthName'].', '.$_SESSION['pay_year'] ; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Incentive Amount:</label>
                    <input type="text" class="form-control" placeholder="Incentive Amount" id="incentive" name="incentive" value = "<?php echo $_SESSION['pay_incentive']; ?>" disabled>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="form-group">
                <input class="btn btn-success" type="submit" id = "btn_pay" name="form_post" value="Submit"> 
                <button class="btn btn-default pull-right"><a href="unpaid_incentives.php">Cancel</a></button>
              </div>  
            </form>
					</div>
				</div>
      </div>
      <!-- /.row -->
    </section>
  </div>
   <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success</h4>
        </div>
        <div class="modal-body">
          <p>You have successfuly paid incentive.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="window.location='unpaid_incentives.php';">OK</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
	  <span>Made by <a href="https://www.techradius.net/" target="_blank">Techradius Hitech Pvt. Ltd.</a> All Rights Reserved. A part of   <a href="http://www.vaibhv.com/" target="_blank">Vaibhav Group</a>.</span>
  </footer>
</div>
<!-- ./wrapper -->
<script>

  $('#btn_pay').on('click', function (e) 
  {
	 	e.preventDefault();
    var user_id= <?php echo $user_id; ?>;
    var usertype = '<?php echo $usertype; ?>';
    var month= <?php echo $month; ?>;
    var year = <?php echo $year; ?>;
    var data = 
    {
      user_id: user_id,
      usertype: usertype,
      year: year,
      month: month
    };
    console.log(data);                
    $.ajax(
    {
      type: 'post',
      url: 'http://test.vaibhavnidhi.com/api/admin/pay/incentive',
      data: data,
      success: function (data) 
      {   
        $('#modal-default').modal('show');
      }//end of success
    });//end of ajax
  });
</script>
</body>
</html>
