<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <?php
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
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add a New User</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Users</a></li>
        <li class="active">Add User</li>
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
                      <label for="firstname">First Name:*</label>
                      <input type="text" class="form-control" id="firstname" placeholder="First Name" required>
                    </div>
				            <div class="form-group">
                      <label for="lastname">Last Name:*</label>
                      <input type="text" class="form-control" id="lastname" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                      <label for="login_id">Login ID:*</label>
                      <input type="text" class="form-control" id="login_id" placeholder="Login ID" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password:*</label>
                      <input type="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
				            <div class="form-group">
                      <label>User Type:*</label>
                      <select class="form-control select2" style="width: 100%;" id="usertype" required>
                        <option value="" selected="selected" disabled>Select User Type</option>
                        <?php 
                              foreach($tl_data as $key=>$data)
                              {
                        ?>
                        <option value="<?php echo $key;?>" ><?php echo $key;?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="position">Position:*</label>
                      <input type="text" class="form-control" id="position" placeholder="Position" required>
                    </div>
                    <div class="form-group">
                      <label for="employee_id">Employee ID:*</label>
                      <input type="text" class="form-control" id="employee_id" placeholder="Employee ID (Please Enter Numeric)" required>
                    </div>
                    <div class="form-group">
                      <label>Teamleader:*</label>
                      <select class="form-control select2" style="width: 100%;" id="teamleader" required>
                        <option value="" selected="selected" disabled>Select Teamleader</option>                     
                      </select>
                    </div>          
                  </div>
                  <!-- /.box-body -->
                  <div class="form-group">
                    <input class="btn btn-success" type="submit" id = "btn_submit" name="form_post" value="Submit"> 
                    <button class="btn btn-default pull-right"><a href="home.php">Cancel</a></button>
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

  $('#password').on('blur', function(){
    if(this.value.length < 5){ 
        $('#span_error').remove();
        $('#password').after('<span id="span_error" class="error error-keyup-1">Password, at least 5 characters required!</span>');
       $(this).focus();
       return false; 
    }
    else
    {
      $('#span_error').remove();
    }
  });

$(document).ready(function () 
{
    $("#firstname").focus();
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
	 	var fname=$('#firstname').val();
    var lname=$('#lastname').val();
    var login=$('#login_id').val();
    var password=$('#password').val();
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
          fname: fname,
          lname: lname,
          login: login,
          password: password,
          usertype: usertype,
          position: position,
          empid: empid,
          tl_id: tl_id
        };              
        $.ajax(
        {
          type: 'post',
          url: 'http://test.vaibhavnidhi.com/api/users/user_add',
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
