<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
	<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <?php
      $url = "http://test.vaibhavnidhi.com/api/admin/leads_stats";
      header('Content-type: application/json');
      $data = file_get_contents($url);
      $lead_data = json_decode($data);
      $active_leads;
      $accepted_leads;
      $declined_leads;
      if(isset($lead_data))
      {
    ?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $lead_data->total_leads; ?></h3>
              <p>Total Leads</p>
            </div>
            <div class="icon">
              <div class="ion dashboard_icon"><img src="dist/img/total_icon.png" alt=""></div>
            </div>
            <a href="total_leads.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		    <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $active_leads =  $lead_data->active_leads; ?></h3>
              <p>Active Leads</p>
            </div>
            <div class="icon">
              <div class="ion dashboard_icon"><img src="dist/img/active_icon.png" alt=""></div>
            </div>
            <a href="active_leads.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $accepted_leads = $lead_data->accepted_leads; ?></h3>
              <p>Accepted Leads</p>
            </div>
            <div class="icon">
              <div class="ion dashboard_icon"><img src="dist/img/accepted_icon.png" alt=""></div>
            </div>
            <a href="accepted_leads.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $declined_leads = $lead_data->declined_leads; ?></h3>
              <p>Declined Leads</p>
            </div>
            <div class="icon">
              <div class="ion dashboard_icon"><img src="dist/img/decline_icon.png" alt=""></div>
            </div>
            <a href="declined_leads.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <?php } ?>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-6">
          <div class="box box-solid bg-green-gradient calendar_box">
              <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title">Calendar</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
          </div>
          <?php
              $url = "http://test.vaibhavnidhi.com/api/admin/employee_teams_stats";
              header('Content-type: application/json');
              $data = file_get_contents($url);
              $employee_team_data = json_decode($data);

              if(isset($employee_team_data))
              {
          ?>
          <div class="row">
            <div class="col-md-6">
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Employees</span>
                  <span class="info-box-number"><?php echo $employee_team_data->total_employees; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>          
            </div>
            <div class="col-md-6">
              <!-- /.info-box -->
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Teams</span>
                  <span class="info-box-number"><?php echo $employee_team_data->total_teams; ?></span>
                </div>
              <!-- /.info-box-content -->
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
		    <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Donut Chart</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="box-body">
                <canvas id="pieChart" style="height:250px"></canvas>
              </div>
              <!-- /.box-body -->
          </div>
		    </div>
	    </div>
		  <div class="row">
        <div class="col-md-12">
				  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Misc</td>
                  <td>Links</td>
                  <td>Text only</td>
                  <td>-</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Misc</td>
                  <td>Lynx</td>
                  <td>Text only</td>
                  <td>-</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Misc</td>
                  <td>IE Mobile</td>
                  <td>Windows Mobile 6</td>
                  <td>-</td>
                  <td>C</td>
                </tr>
                <tr>
                  <td>Misc</td>
                  <td>PSP browser</td>
                  <td>PSP</td>
                  <td>-</td>
                  <td>C</td>
                </tr>
                <tr>
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td>-</td>
                  <td>U</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
			</div>
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
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : <?php echo $declined_leads; ?>,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Declined'
      },
      {
        value    : <?php echo $accepted_leads; ?>,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Accepted'
      },
      {
        value    : <?php echo $active_leads; ?>,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'Active'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

   
  })
	
$(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>	
</body>
</html>