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
  list($id, $user_type, $lead_type, $year, $reward_per) = preg_split('[_]', $data); 
  echo $data;

}

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Rewards Scheme</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
		    <li><a href="#">Rewards</a></li>
        <li><a href="rewards_policy.php">Rewards Policy</a></li>
        <li class="active">Edit Rewards Scheme</li>
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
                    <label>User Type:</label>
                    <input type="text" class="form-control" placeholder="User Type" id="user_type" name="user_type" value = "<?php echo $user_type;?>" disabled>
                </div>
                <div class="form-group">
                    <label>Lead Type:</label>
                    <input type="text" class="form-control" placeholder="Lead Type" id="lead_type" name="lead_type" value = "<?php if($lead_type === 'company')
                                                                                                                                    {
                                                                                                                                      $lead_type = 'company_lead';                                                                                                                              
                                                                                                                                      echo 'Company Lead';
                                                                                                                                    } 
                                                                                                                                    else 
                                                                                                                                    {
                                                                                                                                      $lead_type = 'direct_lead';                                                                                                                                    
                                                                                                                                      echo 'Direct Lead';
                                                                                                                                    } 
                                                                                                                              ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Year:</label>
                    <input type="text" class="form-control" placeholder="Year" id="year" name="year" value = "<?php if($year == 1)
                                                                                                                    {                                                                                                                              
                                                                                                                      echo '1st Year';
                                                                                                                    } 
                                                                                                                    else 
                                                                                                                    {                                                                                                                                    
                                                                                                                      echo 'More than One Year';
                                                                                                                    } 
                                                                                                                ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Rewards %:*</label>
                    <input type="text" class="form-control" placeholder="Rewards" id="rewards" name="rewards" value = "<?php echo $reward_per; ?>" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="form-group">
                <input class="btn btn-success" type="submit" id = "btn_rewards_scheme" name="form_post" value="Submit"> 
                <button class="btn btn-default pull-right"><a href="rewards_policy.php">Cancel</a></button>
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
          <p>You have successfuly updated rewards for <?php echo $user_type; ?> user type.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="window.location='rewards_policy.php';">OK</button>
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
    $("#rewards").focus();
    $("#rewards").blur(function()
    {
      if($(this).val().length == 0)
      {
        $(this).next('#span_rewards_error').remove();
        $(this).after('<span id="span_rewards_error" class="error error-keyup-1">Please Set Rewards for this usertype.</span>');
        $(this).focus();
      } 
      else
      {
        $(this).next('#span_rewards_error').remove();
      }
    });
});



  $('#btn_rewards_scheme').on('click', function (e) 
  {
	 	e.preventDefault();
    var id= '<?php echo $id; ?>';
    var reward_per = parseFloat($('#rewards').val());
    var numericReg = /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:(\.|,)\d+)?$/;
    if(!numericReg.test(reward_per))
    {
        $('#span_reward_numeric_error').remove();
        $('#rewards').after('<span id="span_reward_numeric_error" class="error error-keyup-1">Numeric characters only.</span>');
    }
    else
    {
      $('#span_reward_numeric_error').remove();
      var data = 
      {
        id: id,
        reward_per: reward_per
      };               
      $.ajax(
      {
        type: 'post',
        url: 'http://test.vaibhavnidhi.com/api/admin/rewards/change_data',
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
