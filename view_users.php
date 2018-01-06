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
      session_start();
      if(isset($_SESSION['reset_id']))
      {
        unset($_SESSION['reset_id']);
        unset($_SESSION['reset_name']); 
      }

      if(isset($_SESSION['edit_user_id']))
      { 
        unset($_SESSION['edit_user_id']);
        unset($_SESSION['edit_fname']);
        unset($_SESSION['edit_lname']);
        unset($_SESSION['edit_login']);
        unset($_SESSION['edit_usertype']);
        unset($_SESSION['edit_empid']);
        unset($_SESSION['edit_position']);
        unset($_SESSION['edit_tl_id']);
        unset($_SESSION['edit_tl_name']);
      }
           
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
                    <input type="hidden" id="tl_id_<?php echo $user->user_id; ?>" value="<?php echo $user->tl_id;  ?>">
                    <td><?php echo $user->user_id;  ?></td>
                    <td id="fname_<?php echo $user->user_id;  ?>"><?php echo $user->fname;  ?></td>
                    <td id="lname_<?php echo $user->user_id;  ?>"><?php echo $user->lname;  ?></td>
                    <td id="login_<?php echo $user->user_id;  ?>"><?php echo $user->loginid;  ?></td>
                    <td id="usertype_<?php echo $user->user_id;  ?>"><?php echo $user->usertype;  ?></td>
                    <td id="empid_<?php echo $user->user_id;  ?>"><?php echo $user->empid;  ?></td>
                    <td id="position_<?php echo $user->user_id; ?>"><?php echo $user->position;  ?></td>
                    <td id="tlname_<?php echo $user->user_id;  ?>"><?php echo $user->tl_name;  ?></td>
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
                        <a href="#" class="edit_user_btn" id="edit_<?php echo $user->user_id; ?>" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                        <a href="#" class="reset_pass_btn" id="reset_<?php echo $user->user_id; ?>" data-toggle="tooltip" title="Reset Password"><i class="fa fa-refresh"></i></a>&nbsp;&nbsp;
                        <a href="#" class="deactive_user_btn" id="deactivate_<?php echo $user->user_id; ?>" data-toggle="tooltip" title="Deactivate User"><i class="fa  fa-remove"></i></a>
                      <?php }else{ ?>
                        <a href="#" class="not_active"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                        <a href="#" class="not_active"><i class="fa fa-refresh"></i></a>&nbsp;&nbsp;
                        <a href="#" class="not_active"><i class="fa  fa-remove"></i></a>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php endforeach; } ?>  
                </tbody>
                <tfoot>
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
                    <th>Action</th>
                  </tr>
                </tfoot>              
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
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="window.location='view_users.php';" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success</h4>
        </div>
        <div class="modal-body">
          <p>User is successfully Deactivate</p>
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

  <div class="modal modal-danger fade" id="modal_deactivate">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Deactivate User</h4>
        </div>
        <div class="modal-body">
          <p>If you deactive this user then you can\'t edit this user and all records will be delete related to this user. Are you sure you want to deactive this?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
          <button type="button" id ="btn_confirm_deactivate" class="btn btn-outline">Yes</button>
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
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
    
  $('.reset_pass_btn').click(function()
  {
      var id=$(this).attr('id').split('_')[1];
      var name = $('#fname_'+id).html() + " " + $('#lname_'+id).html();
      $.ajax({
        url : "ajax.php",
        type : "POST",
        data : {id : id, name : name, action : "reset_session"},
        success : function(d)
        {
          //alert(data);
          window.location = "reset_password.php";
        }
      })
  });

  $('.edit_user_btn').click(function()
  {
      var user_id=$(this).attr('id').split('_')[1];
      var fname=$('#fname_'+user_id).html();
      var lname=$('#lname_'+user_id).html();
      var login=$('#login_'+user_id).html();
      var usertype=$('#usertype_'+user_id).html();
      var empid=$('#empid_'+user_id).html();
      var position=$('#position_'+user_id).html();
      var tl_id=$('#tl_id_'+user_id).val();
      var tl_name=$('#tlname_'+user_id).html();

      var data = 
      {
        user_id: user_id,
        fname: fname,
        lname: lname,
        login: login,
        usertype: usertype,
        empid: empid,
        position: position,
        tl_id: tl_id,
        tl_name:tl_name,
        action : "edit_session"
      }

      $.ajax({
        url : "ajax.php",
        type : "POST",
        data : data,
        success : function(d)
        {
          //alert(data);
          window.location = "edit_user.php";
        }
      })
  });

  $(".deactive_user_btn").click(function () 
  {
    var user_id=$(this).attr('id').split('_')[1];
    var usertype = $('#usertype_'+user_id).html();
    var tl_id = $('#tl_id_'+user_id).val();
    tl_id = parseInt(tl_id);
    user_id = parseInt(user_id);   
    
    var data = {
                  user_id: user_id,
                  usertype: usertype,
                  tl_id: tl_id
                };
    $('#modal_deactivate').modal({
      backdrop: 'static',
      keyboard: false
    })
    .one('click', '#btn_confirm_deactivate', function(e) 
    {
      $('#modal_deactivate').modal('hide');
      $.ajax({
              type: 'post',
              url: 'http://test.vaibhavnidhi.com/api/admin/deactivate_user',
              data: data,
              success: function (data) 
              {   
                $('#modal-default').modal('show');
              }//end of success
          });//end of ajax
    });    
  });

</script>
</body>
</html>
