<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <?php
  
  if($_SERVER['REQUEST_METHOD']=='GET')
  {
    //getting the request values 
    $lead_id = trim($_REQUEST['lead_id']);
  }
    $url = "http://test.vaibhavnidhi.com/api/leads/info/".$lead_id;
    header('Content-type: application/json');
    $data = file_get_contents($url);
    $leads_data = json_decode($data);
    $lead_type; $c_name; $c_address; $c_mobile; $c_email; $description;
    $status; $assignee_name; $creator_name; $converted; $date_created;
    $scheme_name; $duration; $amount; $aadhar_no; $closing_date;

    if(!empty($leads_data->lead_id))
    {
      $lead_type = $leads_data->lead_type;
      $c_name = $leads_data->c_name;
      $c_address = $leads_data->c_address;
      $c_mobile = $leads_data->c_mobile;
      $c_email = $leads_data->c_email;
      $description = $leads_data->description;
      $status = $leads_data->status;
      $assignee_name = $leads_data->assignee_name;
      $creator_name = $leads_data->creator_name;
      $date_created = $leads_data->date_created;
      $scheme_name = $leads_data->scheme_name;
      $duration = $leads_data->duration;
      $amount = $leads_data->amount;
      $aadhar_no = $leads_data->aadhar_no;
      $closing_date = $leads_data->closing_date;

    }
    else
    {
        echo '<script> window.location = "error.php"; </script>';
    }
  
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Leads Info</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Leads</a></li>
        <li class="active">Leads Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class ="row">
      <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <i class="fa fa-check-circle"></i>

              <h3 class="box-title"> Status</h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <?php
                  if($status === 'accepted')
                  { 
                ?>
                    <div class="callout callout-accepted">
                    <h4><?php echo " Accepted";?></h4>
                <?php 
                  }
                  else if($status === 'declined')
                  { 
                ?>
                    <div class="callout callout-declined">
                    <h4><?php echo " Declined";?></h4>
                <?php 
                  }
                  else if($status === 'request_pending')
                  {
                ?>
                    <div class="callout callout-request">
                    <h4><?php echo " Request Pending";?></h4>
                <?php    
                  }
                  else if($status === 'telecalling_done')
                  {
                ?>
                    <div class="callout callout-telecalling">
                    <h4><?php echo " Telecalling Done";?></h4>
                <?php    
                  }
                  else if($status === 'home_meeting')
                  {
                ?>
                  <div class="callout callout-home">
                  <h4><?php echo " Home Meeting";?></h4>
                <?php
                  }
                  else if($status === 'follow_up')
                  {
                ?>
                    <div class="callout callout-followup">
                    <h4><?php echo " Follow Up";?></h4>
                <?php   
                  }
                ?>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <i class="fa fa-crosshairs"></i>

              <h3 class="box-title"> Type of Lead</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
                  if($lead_type === 'direct_lead')
                  { 
              ?>
                      <div class="callout callout-directlead">
                      <h4><?php echo " Direct Lead";?></h4>
              <?php
                  }
                  else
                  {
              ?>
                    <div class="callout callout-companylead">
                    <h4><?php echo " Company Lead";?></h4>
              <?php   
                  }
              ?>           
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">      
			    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lead Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-user margin-r-5"></i> Customer Name</strong>
              <p class="text-muted"><?php echo  $c_name;?></p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
              <p class="text-muted"><?php echo  $c_address;?></p>              
              <hr>
              <strong><i class="fa fa-mobile margin-r-5"></i> Mobile</strong>
              <p class="text-muted"><?php echo  $c_mobile;?></p>
              <hr>
              <strong><i class="fa fa-envelope-square margin-r-5"></i> Email-ID</strong>
              <p class="text-muted"><?php if($c_email == NULL) echo 'Email ID doesn\'t exist'; else echo  $c_email;?></p>            
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-6 date_people_section">      
          <div class="row">
            <div class="col-md-6">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"> Date</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-calendar margin-r-5"></i> Start Date</strong>
                  <p class="text-muted"> <?php echo  $date_created;?></p>
                  <hr>
                  <strong><i class="fa fa-calendar margin-r-5"></i> End Date</strong>
                  <p class="text-muted"><?php if($closing_date != NULL) echo  $closing_date; else echo "This lead is still active"?></p>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title"> People</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-user margin-r-5"></i> Creator Name</strong>
                  <p class="text-muted"> <?php echo  $creator_name;?></p>
                  <hr>
                  <strong><i class="fa fa-user margin-r-5"></i> Assignee Name</strong>
                  <p class="text-muted"><?php echo  $assignee_name;?></p>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box box-success <?php if($status !='accepted') echo 'scheme_accepted'?>">
                <div class="box-header with-border">
                  <h3 class="box-title"> Scheme Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                   <div class="box_50">
                      <strong><i class="fa fa-list margin-r-5"></i> Scheme Name</strong>
                      <p class="text-muted"> <?php if($scheme_name == NULL) echo "NA"; else echo $scheme_name;?></p>
                      <hr>
                      <strong><i class="fa fa-rupee margin-r-5"></i> Amount</strong>
                      <p class="text-muted"><?php 
                                              if($amount == NULL) 
                                              {  echo "NA"; }
                                              else
                                              {
                                            ?>
                                                <script>
                                                  var a = <?php echo  $amount; ?>;
                                                  document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                                                </script>
                                              <?php } ?></p>
                   </div>
                   <div class="box_50">
                      <strong><i class="fa fa-calendar margin-r-5"></i> Duration</strong>
                      <p class="text-muted"> <?php if($duration == NULL) echo "NA"; echo  $duration;?></p>
                      <hr>
                      <strong><i class="fa fa-credit-card margin-r-5"></i> Aadhar No</strong>
                      <p class="text-muted"><?php if($aadhar_no == NULL) echo "NA";echo  $aadhar_no;?></p>
                   </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          </div>
        </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class ="row">
         <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <i class="fa fa-file"></i>

              <h3 class="box-title"> Description</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div>
                <p class="text-muted"><?php echo  $description;?></p>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <?php
        $url = "http://test.vaibhavnidhi.com/api/leads/comments/".$lead_id;
        header('Content-type: application/json');
        $data = file_get_contents($url);
        $comments_data = json_decode($data);
        
        if(isset($comments_data))
        {
      ?>
      <div class ="row">
         <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-commenting"></i>

              <h3 class="box-title"> Comments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-footer box-comments">
            <?php foreach($comments_data as $comment_data):?>
              <div class="box-comment">
                <!-- User image -->    
                <?php $letter = substr($comment_data->commentator_name, 0, 1); 
                    $letter_low = strtolower($letter);
                    $letter = strtoupper($letter);
                    $css_class = $letter_low.'_circle';
                ?>           
                <span class="img-circle <?php echo $css_class?>"><?php echo $letter; ?></span>
                <div class="comment-text">
                      <span class="username">
                      <?php echo $comment_data->commentator_name; ?>
                        <span class="text-muted pull-right"><?php echo $comment_data->comment_date; ?></span>
                      </span><!-- /.username -->
                      <?php echo $comment_data->comment; ?>
                </div>
                <!-- /.comment-text -->
              </div>
            <?php endforeach; } ?>
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

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- page script -->
<script>
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
