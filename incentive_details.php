<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>

<?php

if($_SERVER['REQUEST_METHOD']=='GET')
{
  //getting the request values 
  $user_id = trim($_REQUEST['id']);
  $user_id = base64_decode($user_id);
  list($val, $user_id, $user_type) = preg_split('[_]', $user_id);
  //preg_match('/_(\d+)_/', $user_id, $matches);
  //$user_id = (int) $matches[1];

  $yearArray = range(2017, 2100);
  $monthArray = range(1, 12);

  // set the month array
  $formattedMonthArray = array("1" => "January", "2" => "February", "3" => "March", "4" => "April",
    "5" => "May", "6" => "June", "7" => "July", "8" => "August",
    "9" => "September", "10" => "October", "11" => "November", "12" => "December",
  );
  $current_month = date("m");
  $current_year = date("Y");
}
else
{
    echo '<script> window.location = "error.php"; </script>';
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Incentive Details</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Incentive</a></li>
        <li><a href="view_incentives.php">View Incentive</a></li>
        <li class="active">Incentive Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select Month and Year</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="user_form" method="post">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Month:*</label>
                  <select class="form-control select2" style="width: 100%;" id="month">
                    <option selected="selected" disabled>Select Month </option>
                    <?php
                      foreach ($monthArray as $month) 
                      {                    
                    ?>
                        <option value="<?php echo $month;?>" ><?php echo $formattedMonthArray[$month];?></option>
                    <?php 
                      }
                    ?>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Year:*</label>
                  <select class="form-control select2" data-placeholder="Select a Month" style="width: 100%;" id="year">
                    <option selected="selected" disabled>Select Year</option>
                    <?php
                      foreach ($yearArray as $year) 
                      {                    
                    ?>
                        <option value="<?php echo $year;?>" ><?php echo $year;?></option>
                    <?php 
                      }
                    ?>
                  </select>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group go_btn">
                <input class="btn btn-success pull-right" type="submit" id = "btn_go" name="form_post" value="GO">
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- /.box -->

      <div class="row" id="container_incentive_stats" style="display:none;">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-rupee"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Incentive</span>
                <span class="info-box-number" id="total_incentive_span"></span>
              </div>
              <!-- /.info-box-content -->
          </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><img src="dist/img/incentive_rd.png" width="45px" height="45px" alt=""></span>
            <div class="info-box-content">
              <span class="info-box-text">RD Incentive</span>
              <span class="info-box-number" id="rd_incentive_span"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><img src="dist/img/incentive_fd.png" width="45px" height="45px" alt=""></span>
            <div class="info-box-content">
              <span class="info-box-text">FD Incentive</span>
              <span class="info-box-number" id="fd_incentive_span"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-check-square-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Status</span>
              <span class="info-box-number" id="incentive_status_span"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>	
      <!-- /.row -->

      <div class="row" id="container_incentive_table" style="display:none;">
        <div class="col-xs-12">      
          <div class="box box-info">            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Lead ID</th>
                    <th>Customer Name</th>
                    <th>Installment No</th>
                    <th>Incentive</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Duration</th>
                  </tr>
                </thead>
                <tbody>
                      
                </tbody>
                <tfoot>
                  <tr>
                    <th>Lead ID</th>
                    <th>Customer Name</th>
                    <th>Installment No</th>
                    <th>Incentive</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Duration</th>
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
</div>
<!-- ./wrapper -->
<!-- page script -->
<script>
$(function () 
{
  myTable = $('#example1').DataTable(
  {
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
  })

  $('#btn_go').on('click', function (e) 
  {
	 	e.preventDefault();
    var user_id = <?php echo $user_id; ?>;
    var usertype = '<?php echo $user_type;?>';
	 	var month=$('#month').val();
    var year=$('#year').val();

    var master_incentive = [];
    if(month != null)
    {
      $('#span_month_error').remove();
      if(year != null)
      {
        $('#span_year_error').remove();
        var data = 
        {
          user_id: user_id,
          usertype: usertype,
          year: year,
          month: month
        };              
        $.ajax(
        {
          type: 'post',
          url: 'http://test.vaibhavnidhi.com/api/admin/incentive_details',
          data: data,
          success: function (data) 
          {   
            var unpaid_status = "incentive_unpaid";

            var incentive_status = data.incentive_status;
            var total_incentive = parseInt(data.total_incentive);
            var total_fd_incentive = parseInt(data.total_fd_incentive);
            var n = incentive_status.localeCompare(unpaid_status);

            if(n == 0)
            {
              incentive_status = "Unpaid";
            }
            else
            {
              incentive_status = "Paid";
            }
            if(total_incentive == 0)
            {
              incentive_status = "NA";
            }
            else
            {
              if(total_fd_incentive != 0)
              {
                Object.keys(data.incentive["fd_incentive"]).forEach(function(i) 
                {
                    var incentive = [];
                    incentive.push(data.incentive["fd_incentive"][i].lead_id);
                    incentive.push("<a href='leads_details.php?lead_id=" + data.incentive["fd_incentive"][i].lead_id + "'>" + data.incentive["fd_incentive"][i].c_name + "</a>");
                    incentive.push("Fixed Deposit");
                    incentive.push("<b>" + parseInt(data.incentive["fd_incentive"][i].incentive).toLocaleString("en-IN",{style:"currency",currency:"INR"}) + "</b>");               
                    incentive.push(data.incentive["fd_incentive"][i].date);
                    incentive.push(parseInt(data.incentive["fd_incentive"][i].amount).toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                    incentive.push(data.incentive["fd_incentive"][i].duration);
                    master_incentive.push(incentive);
                });
              }
              Object.keys(data.incentive["rd_incentive"]).forEach(function(i) 
              {
                var incentive = [];
                incentive.push(data.incentive["rd_incentive"][i].lead_id);
                incentive.push("<a href='leads_details.php?lead_id=" + data.incentive["rd_incentive"][i].lead_id + "'>" + data.incentive["rd_incentive"][i].c_name + "</a>");
                if(usertype == "Telecaller")
                {
                  incentive.push("Recurring Deposit");
                }
                else
                {
                  incentive.push(data.incentive["rd_incentive"][i].installment_no);
                }
                incentive.push("<b>" + parseInt(data.incentive["rd_incentive"][i].incentive).toLocaleString("en-IN",{style:"currency",currency:"INR"}) + "</b>");               
                incentive.push(data.incentive["rd_incentive"][i].date);
                incentive.push(parseInt(data.incentive["rd_incentive"][i].amount).toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                incentive.push(data.incentive["rd_incentive"][i].duration);
                master_incentive.push(incentive);
              });
              myTable.clear();
              myTable.rows.add(master_incentive); // add to DataTable instance
              myTable.draw(); // always redraw
            }            
            $("#total_incentive_span").html(data.total_incentive);
            $("#rd_incentive_span").html(data.total_rd_incentive);
            $("#fd_incentive_span").html(data.total_fd_incentive);
            $("#incentive_status_span").html(incentive_status);
          }//end of success
        });//end of ajax  
        $('#container_incentive_stats').show();
        $('#container_incentive_table').show();
      }
      else
      {
        $('#span_year_error').remove();
        $('#year').after('<span id="span_year_error" class="error error-keyup-1">Please Select Year</span>');
      }
    }
    else
    {
      $('#span_month_error').remove();
      $('#month').after('<span id="span_month_error" class="error error-keyup-1">Please Select Month</span>');
    }

  });
});
</script>
</body>
</html>
