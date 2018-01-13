<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>

<?php
   session_start();
    $url = "http://test.vaibhavnidhi.com/api/teamleaders";
    //header('Content-type: application/json');
    $data = file_get_contents($url);
    $teamleaders_data = json_decode($data);
    $tl_data = array();
    if(!empty($teamleaders_data))
    {       
      foreach($teamleaders_data as $key=>$teamleader_data)
      {
        foreach($teamleader_data as $user_key=>$user_data)
        {
          $tl_data[$key][$user_key]['tl_id'] = $user_data->tl_id; 
          $tl_data[$key][$user_key]['tl_name'] = $user_data->tl_name;       
        }
      }
    } 
    else
    {
        echo '<script> window.location = "error.php"; </script>';
    }
     $tl_id = $_SESSION['edit_tl_id'];
?>
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
                <form role="form" id="user_form" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="user_id">User ID:</label>
                      <input type="text" class="form-control" id="user_id" placeholder="First Name" value = "<?php echo $_SESSION['edit_user_id']; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="firstname">First Name:*</label>
                      <input type="text" class="form-control" id="firstname" placeholder="First Name" value = "<?php echo $_SESSION['edit_fname']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="lastname">Last Name:*</label>
                      <input type="text" class="form-control" id="lastname" placeholder="Last Name" value = "<?php echo $_SESSION['edit_lname']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="login_id">Login ID:*</label>
                      <input type="text" class="form-control" id="login_id" placeholder="Login ID" value = "<?php echo $_SESSION['edit_login']; ?>" >
                    </div>
                    <div class="form-group">
                      <label>User Type:*</label>
                      <select class="form-control select2" style="width: 100%;" id ="usertype">
                        <option value="Telecaller" <?php if($_SESSION['edit_usertype'] === 'Telecaller') echo 'selected';?> >Telecaller</option>
                        <option value="Salaried" <?php if($_SESSION['edit_usertype'] === 'Salaried') echo 'selected';?> >Salaried</option>
                        <option value="Teamleader" <?php if($_SESSION['edit_usertype'] === 'Teamleader') echo 'selected';?> >Teamleader</option>
                        <option value="Head" <?php if($_SESSION['edit_usertype'] === 'Head') echo 'selected';?> >Head</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="position">Position:*</label>
                      <input type="text" class="form-control" id="position" placeholder="Position" value = "<?php echo $_SESSION['edit_position']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="employee_id">Employee ID:*</label>
                      <input type="text" class="form-control" id="employee_id" placeholder="Employee ID (Please Enter Numeric)" value = "<?php echo $_SESSION['edit_empid']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Teamleader:*</label>
                      <input type="hidden" id="tl_id" value="<?php echo  $_SESSION['edit_tl_id']; ?>">
                      <select class="form-control select2" style="width: 100%;" id="teamleader">
                                               
                      </select>
                    </div>          
                  </div>
                  <!-- /.box-body -->
                  <div class="form-group">
                    <input class="btn btn-success" type="submit" id = "btn_submit" name="form_post" value="Submit"> 
                    <button class="btn btn-default pull-right"><a href="view_users.php">Cancel</a></button>
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
          <button type="button" class="close" onclick="window.location='view_users.php';" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success</h4>
        </div>
        <div class="modal-body">
          <p> You have added successfully User.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="window.location='view_users.php';">OK</button>
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

(function($)
{
    $.fn.setCursorToTextEnd = function() 
    {
        $initialVal = this.val();
        this.val($initialVal + ' ');
        this.val($initialVal);
    };
})(jQuery);

  $(function () 
  {
    $('#usertype').change(function()
    {
      var usertype = $(this).val();
      var teamleaders = JSON.parse('<?php echo json_encode($tl_data); ?>');

      var options = '';
      for(var i = 0; i < teamleaders[usertype].length; i++) 
      {        
          options += '<option value="' + teamleaders[usertype][i].tl_id + '">' + teamleaders[usertype][i].tl_name + '</option>';
      }
    $("select#teamleader").html(options);
   })  
  });  

  $(document).ready(function()
  {
      var tl_id = $('#tl_id').val();
      var usertype = $('#usertype').val();
      var teamleaders = JSON.parse('<?php echo json_encode($tl_data); ?>');
      //console.log(tl_id);
      var options = '';
      for(var i = 0; i < teamleaders[usertype].length; i++) 
      {
          if(teamleaders[usertype][i].tl_id == tl_id)        
          {
           options += '<option selected="selected" value="' + teamleaders[usertype][i].tl_id + '">' + teamleaders[usertype][i].tl_name + '</option>';
          }
          else
          {
            options += '<option value="' + teamleaders[usertype][i].tl_id + '">' + teamleaders[usertype][i].tl_name + '</option>';
          }
      }
    $("select#teamleader").html(options);
  });  

$(document).ready(function () 
{
    $("#firstname").focus();
    $("#firstname").setCursorToTextEnd();
    $("#firstname, #lastname, #login_id, #position" ).blur(function()
    {
      if($(this).val().length == 0)
      {
        $(this).next('#span_field_error').remove();
        $(this).after('<span id="span_field_error" class="error error-keyup-1">This field is required.</span>');
        $(this).focus();
      } 
      else
       {
        $(this).next('#span_field_error').remove();
      }
    });
});

$('#btn_submit').on('click', function (e) 
{
	 	e.preventDefault();
    var user_id=$('#user_id').val();
	 	var fname=$('#firstname').val();
    var lname=$('#lastname').val();
    var login=$('#login_id').val();
    var usertype=$('#usertype').val();
    var position=$('#position').val();
    var empid=$('#employee_id').val();
    var tl_id=$('#teamleader').val();
    if(usertype != null)
    {
      var numericReg = /^([1-9][0-9]*)$/;
      if(!numericReg.test(empid))
      {
        $('#span_usertype_error').remove();
          $('#span_empid_error').remove();
          $('#employee_id').after('<span id="span_empid_error" class="error error-keyup-1">Numeric characters only.</span>');
      }
      else
      {
        $('#span_usertype_error').remove();
        $('#span_empid_error').remove();
        var data = 
        {
          user_id: user_id,
          fname: fname,
          lname: lname,
          login: login,          
          usertype: usertype,
          position: position,
          empid: empid,
          tl_id: tl_id
        };              
        $.ajax(
        {
          type: 'post',
          url: 'http://test.vaibhavnidhi.com/api/admin/users/user_edit',
          data: data,
          success: function (data) 
          {   
            $('#modal-default').modal('show');
          }//end of success
        });//end of ajax      
      }
    }
    else
    {
      $('#span_usertype_error').remove();
      $('#usertype').after('<span id="span_usertype_error" class="error error-keyup-1">Please Select Usertype</span>');
    }
});
 
</script>
</body>
</html>
