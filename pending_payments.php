<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
<?php 
   $url = "http://test.vaibhavnidhi.com/api/admin/rd/due";
   header('Content-type: application/json');
   $data = file_get_contents($url);
   $rd_due_data = json_decode($data);

  
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>RD Due Till Current Month </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pending Payments</li>
      </ol>
    </section>

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
                    <th>Lead ID</th>
                    <th>Customer Name</th>
                    <th>Installment Number</th>
                    <th>Creator Name</th>
                    <th>Assignee Name</th>
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th class="sorting_disabled">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                     if(isset($rd_due_data))
                     {
                      foreach($rd_due_data as $rd_data):?>
                  <tr>
                    <td><?php echo $rd_data->lead_id;  ?></td>
                    <td><a href="leads_details.php?lead_id=<?php echo $rd_data->lead_id; ?>"><?php echo $rd_data->c_name; ?></a></td>
                    <td id="installment_<?php echo $rd_data->lead_id;  ?>"><?php echo $rd_data->installment_no;  ?></td>
                    <td id="creator_<?php echo $rd_data->lead_id;  ?>"><?php echo $rd_data->creator_name;  ?></td>
                    <td id="assignee_<?php echo $rd_data->lead_id;  ?>"><?php echo $rd_data->assignee_name;  ?></td>
                    <td id="amount_<?php echo $rd_data->lead_id;  ?>">
                      <script>
                          var a = <?php echo $rd_data->amount;  ?>;
                          document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                      </script>                    
                    </td>
                    <td id="due_<?php echo $rd_data->lead_id; ?>"><?php echo $rd_data->due_date;  ?></td>
                    <td><a href="#" id="amountreceived_<?php echo $rd_data->lead_id; ?>" class="amount_recieve_btn" data-toggle="tooltip" title="Installment Received"><i class="fa fa-money"></i>Installment Received</a></td>
                  </tr>
                  <?php endforeach; } ?>  
                </tbody>
                <tfoot>
                  <tr>
                    <th>Lead ID</th>
                    <th>Customer Name</th>
                    <th>Installment Number</th>
                    <th>Creator Name</th>
                    <th>Assignee Name</th>
                    <th>Amount</th>
                    <th>Due Date</th>
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

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="window.location='view_users.php';" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success</h4>
        </div>
        <div class="modal-body">
          <p>Installment succesfully received. And Incentive added on respective account of that lead id.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="window.location='pending_payments.php';">OK</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal modal-warning fade" id="modal_payment">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Receive Payment</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure that you have received this installment?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
          <button type="button" id ="btn_confirm_received" class="btn btn-outline">Yes</button>
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
    })
  })

  $(".amount_recieve_btn").click(function () 
  {
    var lead_id=$(this).attr('id').split('_')[1];
    var installment_no = $('#installment_'+lead_id).html();
    lead_id = parseInt(lead_id);
    installment_no = parseInt(installment_no);   
    
    var data = {
      lead_id: lead_id,
      installment_no: installment_no
                };
    console.log(data);
    $('#modal_payment').modal({
      backdrop: 'static',
      keyboard: false
    })
    .one('click', '#btn_confirm_received', function(e) 
    {
      $('#modal_payment').modal('hide');
      $.ajax({
              type: 'post',
              url: 'http://test.vaibhavnidhi.com/api/admin/rd/installment',
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
