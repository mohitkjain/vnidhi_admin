<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <?php
     if(isset($_SESSION['pay_user_id']))
     { 
       unset($_SESSION['pay_user_id']);
       unset($_SESSION['pay_usertype']);
       unset($_SESSION['pay_month']);
       unset($_SESSION['pay_year']);
       unset($_SESSION['pay_username']);
       unset($_SESSION['pay_position']);
       unset($_SESSION['pay_incentive']);
      }
    
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Unpaid Incentives </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Incentive</a></li>
        <li class="active">Unpaid Incentives</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Select Usertype : </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="form-group">
                <select class="form-control select2" style="width: 100%;" id="select_usertype">
                  <option selected="selected" disabled>Select Usertype</option>
                  <option id="Telecaller">Telecaller</option>
                  <option id="Salaried">Salaried</option>
                  <option id="Teamleader">Teamleader</option>
                  <option id="Head">Head</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <div class="row" id="container_incentive" style="display:none;">
        <div class="col-xs-12">
          <div class="box box-primary">            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped incentive_table">
                <thead>
                  <tr>
                    <th>User Name</th>
                    <th>Position</th>
                    <th>Incentive Month</th>
                    <th>Incentive Year</th>
                    <th>Incentive Amount</th>
                    <th class="sorting_disabled">Action</th>
                  </tr>
                </thead>
                <tbody id="incentive_body">
                  
                </tbody>
                <tfoot>
                  <tr>
                    <th>User Name</th>
                    <th>Position</th>
                    <th>Incentive Month</th>
                    <th>Incentive Year</th>
                    <th>Incentive Amount</th>
                    <th>Action</th>
                  </tr>       
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

    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    myTable =  $('#example1').DataTable({
      'paging'      : true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    $('#select_usertype').on('change', function() 
    {          
        var usertype=$('#select_usertype').val();
        $.ajax(
        {
          type: 'get',
          url: 'http://test.vaibhavnidhi.com/api/admin/incentive/unpaid/'+ usertype,
          success: function (data) 
          {             
            var master = [];          
            Object.keys(data).forEach(function(i) 
            {
                var user = [];
                var month = data[i].month;
                
                var id = $.base64.encode('incentive_'+ data[i].user_id + '_' + usertype);
                user.push("<a href='incentive_details.php?id=" + id +"'>" +data[i].user_name +"</a>");
                user.push(data[i].position);
                user.push(monthNames[month-1]);
                user.push(data[i].year);               
                user.push(parseInt(data[i].user_incentive).toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                user.push("<a href='#' id='pay_" + data[i].user_id + "' class='paid_btn' ><i class='fa fa-paypal'></i>Pay</a>");
                master.push(user);
            });
            myTable.clear();
            myTable.rows.add(master); // add to DataTable instance
            myTable.draw(); // always redraw
          } //end of success
        });//end of ajax      
        $('#container_incentive').show();
    });

    $(document.body).on( 'click','.paid_btn', function()
    {
      var usertype=$('#select_usertype').val();
      var user_id=$(this).attr('id').split('_')[1];
      var user_name = $(this).closest('tr').find('td:eq(0)').text();
      var position = $(this).closest('tr').find('td:eq(1)').text();
      var monthName = $(this).closest('tr').find('td:eq(2)').text();
      var year = $(this).closest('tr').find('td:eq(3)').text();
      var incentive = $(this).closest('tr').find('td:eq(4)').text();

      var month = monthNames.indexOf(monthName);
      month++;
      var data = 
      {
        user_id: user_id,
        usertype: usertype,
        month: month,
        monthName: monthName,
        year: year,
        position: position,
        user_name:user_name,
        incentive:incentive,   
        action : "incentive_session"
      }

      $.ajax({
        url : "ajax.php",
        type : "POST",
        data : data,
        success : function(d)
        {
          window.location = "pay_incentive.php";
        }
      })
    });
  })
 
</script>
</body>
</html>