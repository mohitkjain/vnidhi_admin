<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>View Incentive Schemes </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Incentive</a></li>
        <li class="active">View Incentives Schemes</li>
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
                    <th>S. No. </th>
                    <th>Scheme Type</th>
                    <th>Lead Type</th>
                    <th>Duration</th>
                    <th>Incentive</th>
                    <th class="sorting_disabled">Action</th>
                  </tr>
                </thead>
                <tbody id="incentive_body">
                  
                </tbody>
                <tfoot>
                  <tr>
                    <th>S. No. </th>
                    <th>Scheme Type</th>
                    <th>Lead Type</th>
                    <th>Duration</th>
                    <th>Incentive</th>
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
      <div class="row" id="telecaller_condition" style="display:none;">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-body">
              <p class="text-muted" >*For Fixed Deposit Schemes, incentive will be calculated from principal amount in multilples of 10,000. </p>
              <p class="text-muted" >*For Recurring Deposit Schemes, incentive will be calculated from principal amount in multilples of 1,000. </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
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
          url: 'http://test.vaibhavnidhi.com/api/admin/incentive/schemes/'+ usertype,
          success: function (data) 
          {             
            var masterScheme = [];  
                    
            Object.keys(data).forEach(function(i) 
            {
                var scheme = [];
                var incentive, lead_type;
                if(usertype == 'Telecaller')
                {
                  incentive = data[i].incentive.substring(1);
                }
                else
                {
                  incentive = data[i].incentive.slice(0, -1);
                }
                if(data[i].schemeType == 'FD')
                {
                  schemeType = 'Fixed Deposit';
                }
                else
                {
                  schemeType = 'Recurring Deposit';
                }
                if(data[i].leadType == 'company_lead')
                {
                  leadType = 'Company Lead';
                  lead_type = 'company';
                }
                else
                {
                  leadType = 'Direct Lead';
                  lead_type = 'direct';
                }
                var id = $.base64.encode('incentive_'+ lead_type + '_' + data[i].schemeType + '_' + usertype + '_' + data[i].duration + '_' + incentive);
                scheme.push(data[i].no);
                scheme.push(schemeType);
                scheme.push("<span class='label label-" + lead_type + "'>" + leadType + "</span>");
                scheme.push(data[i].duration);
                scheme.push(data[i].incentive);
                scheme.push("<a href='edit_incentive_scheme.php?data=" + id + "' class='edit_incentive_btn' id='edit_' data-toggle='tooltip' title='Edit'><i class='fa fa-edit'></i>Edit</a>");
                masterScheme.push(scheme);
            });
            myTable.clear();
            myTable.rows.add(masterScheme); // add to DataTable instance
            myTable.draw(); // always redraw
          } //end of success
        });//end of ajax      
        $('#container_incentive').show();
        if(usertype == 'Telecaller')
        {
          $('#telecaller_condition').show();
        }
        else
        {
          $('#telecaller_condition').hide();
        }
    });

    
  })
</script>
</body>
</html>
