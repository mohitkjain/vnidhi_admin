<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <?php
      $url = "http://test.vaibhavnidhi.com/api/admin/get_targets";
      header('Content-type: application/json');
      $data = file_get_contents($url);
      $targets_data = json_decode($data);

      if(isset($targets_data))
      {
        $target_users_data = array();
        foreach($targets_data as $key=>$target_data)
        {
            $target_users_data[$key]['user_id'] = $key; 
            $target_users_data[$key]['user_name'] = $target_data->user_name;            
            $target_users_data[$key]['user_type'] = $target_data->usertype;
            $target_users_data[$key]['pre_target'] = $target_data->pre_month_target;
            $target_users_data[$key]['pre_achieved'] = $target_data->pre_month_achieved;
            $target_users_data[$key]['current_target'] = $target_data->current_month_target;
        }
      }
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Set Target</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Targets</a></li>
        <li class="active">Set Target</li>
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
            <form role="form" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label>Select User:*</label>
                  <select class="form-control select2" style="width: 100%;" id="user">
                      <option value="" selected="selected" disabled>Select User</option>
                      <?php 
                        foreach($target_users_data as $key=>$data)
                        {
                      ?>
                      <option value="<?php echo $data['user_id'];?>" ><?php echo $data['user_name'];?></option>
                       <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                    <label>User Type:</label>
                    <input type="text" class="form-control" placeholder="User Type" id="user_type" name="user_type" readonly>
                </div>
                <div class="form-group">
                    <label>Target of Previous Month:</label>
                    <input type="text" class="form-control" placeholder="Target of Previous Month" id="pre_target" name="pre_target" readonly>
                </div>
                <div class="form-group">
                    <label>Target Achiceved of Previous Month:</label>
                    <input type="text" class="form-control" placeholder="Target Achiceved of Previous Month" id="pre_achieved" name="pre_achieved" readonly>
                </div>
                <div class="form-group">
                    <label>Set Target for Current Month:*</label>
                    <input type="text" class="form-control" placeholder="Set Target for Current Month" id="current_target" name="current_target">
                </div>
              </div>
              <!-- /.box-body -->
			<div class="form-group">
				<input class="btn btn-success" type="submit" id = "btn_submit" name="form_post" value="Submit"> 
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
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success</h4>
        </div>
        <div class="modal-body">
          <p>Target is successfully Set</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="window.location='view_targets.php';">OK</button>
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
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
  $(function () 
  {
    $('#user').change(function()
    {
     var id = $(this).val();
      var targets = JSON.parse('<?php echo json_encode($target_users_data); ?>');
      $('#user_type').val(targets[id].user_type);
      $('#pre_target').val(targets[id].pre_target);
      $('#pre_achieved').val(targets[id].pre_achieved);
      $('#current_target').val(targets[id].current_target);
   })
  });

  $('#btn_submit').on('click', function (e) 
  {
	 	e.preventDefault();
	 	var user_id=$('#user').val();
	 	var current_target=$('#current_target').val();
    var numericReg = /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:(\.|,)\d+)?$/;
    if(!numericReg.test(current_target)) 
    {
        $('#current_target').after('<span class="error error-keyup-1">Numeric characters only.</span>');
    }
    else
    {
      current_target=parseInt(current_target.replace(/,/g , ''));
      if(current_target=='')
      {
        alert('Please Set Target for this month');
      }
      else
      {
          var data = {
                        user_id: user_id,
                        target_amount: current_target
                    };
                
              $.ajax({
                type: 'post',
                url: 'http://test.vaibhavnidhi.com/api/admin/set_target/current_month',
                data: data,
                success: function (data) {   
                  $('#modal-default').modal('show');
                }//end of success
              });//end of ajax
      }
    }
	 });
</script>
</body>
</html>
