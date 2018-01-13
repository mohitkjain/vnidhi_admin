<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
<?php

if($_SERVER['REQUEST_METHOD']=='GET')
{
  //getting the request values 
  $data = trim($_REQUEST['data']);
  $data = base64_decode($data);
  list($id, $rewards_points, $reward) = preg_split('[_]', $data); 
}
else
{
    echo '<script> window.location = "error.php"; </script>';
}

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Redemption Policy</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
		    <li><a href="#">Rewards</a></li>
        <li><a href="redemption_policy.php">Rewards Policy</a></li>
        <li class="active">Edit Redemption Policy</li>
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
                    <label>Redemption ID:</label>
                    <input type="text" class="form-control" placeholder="Redemption ID" id="redemption_id" name="redemption_id" value = "<?php echo $id;?>" disabled>
                </div>
                <div class="form-group">
                    <label>Rewards Points:*</label>
                    <input type="text" class="form-control" placeholder="Rewards Points" id="rewards_points" name="rewards_points" value = "<?php echo $rewards_points; ?>" required>
                </div>
                <div class="form-group">
                    <label>Reward:*</label>
                    <input type="text" class="form-control" placeholder="Reward" id="reward" name="reward" value = "<?php echo $reward; ?>" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="form-group">
                <input class="btn btn-success" type="submit" id = "btn_redemption_policy" name="form_post" value="Submit"> 
                <button class="btn btn-default pull-right"><a href="redemption_policy.php">Cancel</a></button>
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
          <p>You have successfuly updated redemption policy.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="window.location='redemption_policy.php';">OK</button>
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

$(document).ready(function () 
{
    $("#rewards_points").focus();
    $("#rewards_points, #reward").blur(function()
    {
      if($(this).val().length == 0)
      {
        $(this).next('#span_redemption_error').remove();
        $(this).after('<span id="span_redemption_error" class="error error-keyup-1">This field is required.</span>');
        $(this).focus();
      } 
      else
      {
        $(this).next('#span_redemption_error').remove();
      }
    });
});



  $('#btn_redemption_policy').on('click', function (e) 
  {
	 	e.preventDefault();
    var id= '<?php echo $id; ?>';
    var reward = $('#reward').val();
    var rewards_points = parseInt($('#rewards_points').val());
    var numericReg = /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:(\.|,)\d+)?$/;
    if(!numericReg.test(rewards_points))
    {
        $('#span_redemption_numeric_error').remove();
        $('#rewards_points').after('<span id="span_redemption_numeric_error" class="error error-keyup-1">Numeric characters only.</span>');
    }
    else
    {
      $('#span_redemption_numeric_error').remove();
      var data = 
      {
        id: id,
        rewards_points: rewards_points,
        reward: reward
      };               
      $.ajax(
      {
        type: 'post',
        url: 'http://test.vaibhavnidhi.com/api/admin/redemption/policy_data',
        data: data,
        success: function (data) 
        {   
          $('#modal-default').modal('show');
        }//end of success
      });//end of ajax
    }
  });
</script>
</body>
</html>
