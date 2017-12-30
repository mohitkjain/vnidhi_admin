<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Reset Password</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reset Password</li>
      </ol>
    </section>
    <?php
        session_start();
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
                <div class="col-xs-12">    
                    <div class="box box-primary">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="box-header with-border"></div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                        <label for="UserName">User Name:</label>
                                        <input type="text" class="form-control" id="UserName" placeholder="User Name" value="<?php echo $_SESSION['reset_name'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                        <label for="Password">Password:*</label>
                                        <input type="password" class="form-control" id="Password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                        <label for="ConfirmPassword">Confirm Password:*</label>
                                        <input type="password" class="form-control" id="ConfirmPassword" onChange="checkPasswordMatch();" placeholder="Retype Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="error error-keyup-1" id="divCheckPasswordMatch">
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="form-group">
                                        <input class="btn btn-success" type="submit" id = "btn_submit" value="Submit"> 
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success</h4>
              </div>
              <div class="modal-body">
                <p>Password is sucessfully Set</p>
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
  function checkPasswordMatch() {
    var password = $("#Password").val();
    var confirmPassword = $("#ConfirmPassword").val();

    if (password != confirmPassword)
        $('#divCheckPasswordMatch').html("Passwords does not match");
    else
        $('#divCheckPasswordMatch').html("");
}

$(document).ready(function () 
{
   $("#ConfirmPassword").keyup(checkPasswordMatch);
});

$('#btn_submit').on('click', function (e) 
{
	 	e.preventDefault();
	 	var user_id= <?php echo $_SESSION['reset_id']; ?>;
	 	var password=$('#Password').val();
        if(password=='')
        {
            $('#divCheckPasswordMatch').html("Please Type Password");
        }
        else
        {
          var data = {
                        user_id: user_id,
                        password: password
                    };
                
              $.ajax({
                type: 'post',
                url: 'http://test.vaibhavnidhi.com/api/admin/users/update/password',
                data: data,
                success: function (data) {   
                  $('#modal-default').modal('show');
                }//end of success
              });//end of ajax
        }
    });

</script>


</body>
</html>
