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
      //header('Content-type: application/json');
      $data = file_get_contents($url);
      $lead_data = json_decode($data);
      $lead_arrays = array('telecalling_done' => 0,'home_meeting' => 0,'follow_up' => 0,'request_pending' => 0,'accepted' => 0,'declined' => 0);
      $active_leads = 0;
      $total_leads = 0;
      if(isset($lead_data))
      {
        foreach($lead_data as $leads)
        {
          $lead_arrays[$leads->status] = $leads->leads;
          if($leads->status != 'accepted' && $leads->status != 'declined')
          {
            $active_leads += $leads->leads;
          }
          $total_leads += $leads->leads;
        }
      }
      else
      {
          echo '<script> window.location = "error.php"; </script>';
      }
    ?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $total_leads; ?></h3>
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
              <h3><?php echo $active_leads; ?></h3>
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
              <h3><?php echo $lead_arrays['accepted']; ?></h3>
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
              <h3><?php echo $lead_arrays['declined']; ?></h3>
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
        </div>
		    <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Leads Stats</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" ></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-telecalling"></i> Telecalling Done</li>
                    <li><i class="fa fa-circle-o text-home-meeting"></i> Home Meeting</li>
                    <li><i class="fa fa-circle-o text-follow-up"></i> Follow Up</li>
                    <li><i class="fa fa-circle-o text-request-pending"></i> Request Pending</li>
                    <li><i class="fa fa-circle-o text-accepted"></i> Accepted</li>
                    <li><i class="fa fa-circle-o text-declined"></i> Declined</li>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
		    </div>
      </div>
      <?php
              $url = "http://test.vaibhavnidhi.com/api/admin/employee_teams_stats";
              //header('Content-type: application/json');
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
              <span class="info-box-text">Total Active Employees</span>
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
      <?php
        $url = "http://test.vaibhavnidhi.com/api/admin/top_performer/Salaried";
        //header('Content-type: application/json');
        $data = file_get_contents($url);
        $top_salaried_data = json_decode($data);
      ?>
      <div class="row">
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Top Salaried Employee</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 200px">User Name</th>
                  <th style="width: 100px">Total Leads</th>
                  <th style="width: 200px">Total Business</th>
                  <th>Ratio </th>
                </tr>
                <tbody>
                  <tr>
                    <?php
                     if(count($top_salaried_data) > 0)
                     {
                        $no = 0;
                        foreach($top_salaried_data as $top_salaried)
                        {
                          $percent = round(($top_salaried->total_leads/$lead_arrays['accepted'])*100 , 2);
                    ?>
                          <td> <?php echo ++$no; ?>. </td>
                          <td> <?php echo $top_salaried->user_name; ?></td>
                          <td> <?php echo $top_salaried->total_leads; ?></td>
                          <td>
                            <span class="badge bg-<?php  
                              if($percent <= 25)
                              {
                                echo 'red';
                              }
                              else if($percent > 25 && $percent <= 50)
                              {
                                echo 'yellow';
                              }
                              else if($percent > 50 && $percent <= 75)
                              {
                                echo 'light-blue';
                              }
                              else if($percent > 75 && $percent <= 100)
                              {
                                echo 'green';
                              }                            
                            ?>">
                              <script>
                                var a = <?php echo $top_salaried->total_business; ?>;
                                document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                              </script>                            
                            </span>
                          </td>
                          <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-<?php  
                                  if($percent <= 25)
                                  {
                                    echo 'danger';
                                  }
                                  else if($percent > 25 && $percent <= 50)
                                  {
                                    echo 'yellow';
                                  }
                                  else if($percent > 50 && $percent <= 75)
                                  {
                                    echo 'primary';
                                  }
                                  else if($percent > 75 && $percent <= 100)
                                  {
                                    echo 'success';
                                  }                            
                                  ?>" style="width: <?php echo $percent; ?>%"></div>
                            </div>
                          </td>
                  </tr>
                  <?php
                        }
                    }
                  else
                  {
                  ?>
                  <td colspan="5"> No Data Available </td>
                  <?php
                  }
                  ?>
                  </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <?php
          $url = "http://test.vaibhavnidhi.com/api/admin/top_performer/Telecaller";
          //header('Content-type: application/json');
          $data = file_get_contents($url);
          $top_telecaller_data = json_decode($data);
        ?>
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Top Telecaller Employee</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 200px">User Name</th>
                  <th style="width: 100px">Total Leads</th>
                  <th style="width: 200px">Total Business</th>
                  <th>Ratio </th>
                </tr>
                <tbody>
                  <tr>
                    <?php
                     if(count($top_telecaller_data) > 0)
                     {
                        $no = 0;
                        foreach($top_telecaller_data as $top_telecaller)
                        {
                          $percent = round(($top_telecaller->total_leads/$lead_arrays['accepted'])*100 , 2);
                    ?>
                          <td> <?php echo ++$no; ?>. </td>
                          <td> <?php echo $top_telecaller->user_name; ?></td>
                          <td> <?php echo $top_telecaller->total_leads; ?></td>
                          <td>
                            <span class="badge bg-<?php  
                              if($percent <= 25)
                              {
                                echo 'red';
                              }
                              else if($percent > 25 && $percent <= 50)
                              {
                                echo 'yellow';
                              }
                              else if($percent > 50 && $percent <= 75)
                              {
                                echo 'light-blue';
                              }
                              else if($percent > 75 && $percent <= 100)
                              {
                                echo 'green';
                              }                            
                            ?>">
                              <script>
                                var a = <?php echo $top_telecaller->total_business; ?>;
                                document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                              </script>                            
                            </span>
                          </td>
                          <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-<?php  
                                  if($percent <= 25)
                                  {
                                    echo 'danger';
                                  }
                                  else if($percent > 25 && $percent <= 50)
                                  {
                                    echo 'yellow';
                                  }
                                  else if($percent > 50 && $percent <= 75)
                                  {
                                    echo 'primary';
                                  }
                                  else if($percent > 75 && $percent <= 100)
                                  {
                                    echo 'success';
                                  }                            
                                  ?>" style="width:<?php echo $percent; ?>%"></div>
                            </div>
                          </td>
                  </tr>
                  <?php
                        }
                    }
                  else
                  {
                  ?>
                  <td colspan="5"> No Data Available </td>
                  <?php
                  }
                  ?>
                  </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
        value    : <?php echo $lead_arrays['telecalling_done']; ?>,
        color    : '#A9A9A9',
        highlight: '#d3d3d3',
        label    : 'Telecalling Done'
      },
      {
        value    : <?php echo $lead_arrays['home_meeting']; ?>,
        color    : '#c96116',
        highlight: '#f18435',
        label    : 'Home Meeting'
      },
      {
        value    : <?php echo $lead_arrays['follow_up']; ?>,
        color    : '#0386c1',
        highlight: '#21aae7',
        label    : 'Follow Up'
      },
      {
        value    : <?php echo $lead_arrays['request_pending']; ?>,
        color    : '#d4b115',
        highlight: '#fdd835',
        label    : 'Request Pending'
      },
      {
        value    : <?php echo $lead_arrays['accepted']; ?>,
        color    : '#00c853',
        highlight: '#17ed85',
        label    : 'Accepted'
      },
      {
        value    : <?php echo $lead_arrays['declined']; ?>,
        color    : '#b70a2c',
        highlight: '#ec274d',
        label    : 'Declined'
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

  // The Calender
  $('#calendar').datepicker();
</script>	
</body>
</html>