<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
<?php $timestamp = time(); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add Gold Loan</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Loans</a></li>
        <li class="active">Add Gold Loan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">    
          <div class="box">
            <div class="box-body">
              <form role="form" id="gold_loan_form" name="gold_loan_form" method="post">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="form_no">Form No:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-hashtag"></i>
                        </div>
                        <input type="text" class="form-control" id="form_no" placeholder="Form No" required>
                      </div>                         
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="customer_id">Customer ID:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-odnoklassniki"></i>
                        </div>
                        <input type="text" class="form-control" id="customer_id" placeholder="Customer ID" required>
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label for="customer_name">Customer Name:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="customer_name" placeholder="Customer Name" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="customer_address">Customer Address:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-home"></i>
                        </div>
                        <input type="text" class="form-control" id="customer_address" placeholder="Customer Address" required>
                      </div>   
                    </div>
                    <div class="form-group">
                      <label for="customer_image">Customer Image: *</label>
                      <form id="customer_image_form" name="customer_image_form" action="upload_customer.php" method="post" enctype="multipart/form-data">
                        <input type="file" class="form-control" accept="image/*" name="customer_image" id="customer_image" />
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-primary" id="cust_upload_button">Upload</button>
                        </span>
                      </form>
                      <div id="customer_img_preview"></div>
                    </div>
                    <div class="form-group">
                      <label for="no_of_items">Number of Items:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-hand-o-right"></i>
                        </div>
                        <input type="text" class="form-control" id="no_of_items" placeholder="Total Number of Items" required>
                      </div>   
                    </div>
                    <div class="form-group">
                      <label for="total_weight">Total Weight:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-cog"></i>
                        </div>
                        <input type="text" class="form-control" id="total_weight" placeholder="Total Weight (In Grams)" required>
                        <span class="input-group-addon">Grams</span>
                      </div>                        
                    </div>
                    <div class="form-group">
                      <label for="processing_charges">Processing Charges:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-rupee"></i>
                        </div>
                        <input type="text" class="form-control" id="processing_charges" placeholder="Processing Charges" required>
                      </div>                        
                    </div>
                    <div class="form-group">
                      <label for="valuation_charges">Valuation Charges:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-rupee"></i>
                        </div>
                        <input type="text" class="form-control" id="valuation_charges" placeholder="Valuation Charges" required>
                      </div>                         
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="loan_date">Loan Date:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control" id="loan_date" name="loan_date" placeholder="yyyy-mm-dd" required>
                      </div>
                      <!-- /.input group -->
                    </div>                                   
                    <div class="form-group">
                      <label for="loan_number">Loan Account Number:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-hashtag"></i>
                        </div>
                        <input type="text" class="form-control" id="loan_number" placeholder="Loan Account Number" required>
                      </div>                         
                    </div>
                    <div class="form-group">
                      <label for="loan_scheme">Loan Scheme:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-book"></i>
                        </div>
                        <input type="text" class="form-control" id="loan_scheme" placeholder="Loan Scheme" required>
                      </div>                         
                    </div>
                    <div class="form-group">
                      <label for="loan_amount">Loan Amount:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-rupee"></i>
                        </div>
                        <input type="text" class="form-control" id="loan_amount" placeholder="Loan Amount" required>
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label for="loan_period">Loan Period:*</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" id="loan_period" placeholder="Loan Period (In Months)" required>
                        <span class="input-group-addon">Months</span>
                      </div>                   
                    </div>
                    <div class="form-group">
                      <label for="interest_rate">Interest Rate:*</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pinterest"></i></span>
                        <input type="text" class="form-control" id="interest_rate" placeholder="Interest Rate" required>
                        <span class="input-group-addon">%</span>
                      </div>                        
                    </div>
                    <div class="form-group">
                      <label for="gold_image">Gold Image: *</label>
                      <form id="gold_image_form" name="gold_image_form" action="upload_gold_loan.php" method="post" enctype="multipart/form-data">
                        <input type="file" class="form-control" accept="image/*" name="gold_image" id="gold_image" />
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-primary" id="gold_upload_button">Upload</button>
                        </span>
                      </form>
                      <div id="gold_img_preview"></div>
                    </div>
                    <div class="form-group">
                      <label for="peenal_interest">Penal Interest:*</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pinterest"></i></span>
                        <input type="text" class="form-control" id="peenal_interest" placeholder="Penal Interest" required>
                        <span class="input-group-addon">%</span>
                      </div>                       
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="radio_payment_mode">Payment Mode:*</label>
                        <input type="radio" name="radio_payment_mode" class="minimal-red"  value="Cash" checked> Cash 
                        <input type="radio" name="radio_payment_mode" class="minimal-red"  value="Cheque"> Cheque
                        <input type="radio" name="radio_payment_mode" class="minimal-red"  value="Bank Transfer">Bank Transfer 
                    </div>
                    <div class="form-group">
                      <label for="gold_description">Description:*</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-edit"></i>
                        </div>
                        <input type="text" class="form-control" id="gold_description" placeholder="Gold Description" required>
                      </div> 
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="btn btn-success" type="submit" id = "btn_submit" name="form_post" value="Submit"> 
                      <button class="btn btn-default pull-right"><a href="home.php">Cancel</a></button>
                    </div>
                  </div>
                </div>
              </form> 
            </div>           
					</div>
				</div>           
      </div>
    </section>
    <!-- /.content -->
  </div>
   <!-- /.content-wrapper -->

   <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="window.location='view_gold_loans.php';" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success</h4>
        </div>
        <div class="modal-body">
          <p> You have added successfully Gold Loan.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="window.location='view_gold_loans.php';">OK</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal modal-danger fade" id="modal_error">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="window.location='add_gold_loan.php';" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Error</h4>
        </div>
        <div class="modal-body">
          <p>There is some error, Please provide correct details in provided format. If error persists, please contact Techradius Hitech Pvt Ltd.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onclick="window.location='add_gold_loan.php';">Ok</button>
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

<script type="text/javascript">
$(document).ready(function (e) {
	$("#gold_upload_button").on('click',(function(e) {
    e.preventDefault();
    var timestamp = <?php echo $timestamp; ?>;
    var file_data = $("#gold_image").prop("files")[0];   // Getting the properties of file from file field
	  var form_data = new FormData();                         // Creating object of FormData class
	  form_data.append("gold_image", file_data);                 // Appending parameter named file with properties of file_field to form_data
    form_data.append("timestamp", timestamp);
		$.ajax({
        	url: "upload_gold_loan.php",
          type: "POST",
          enctype: 'multipart/form-data',
          dataType: 'script',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
			    success: function(data)
		      {
			      $("#gold_img_preview").html(data);
		      },
          error: function() 
          {
          } 	        
	   });
	}));
});
</script>

<script type="text/javascript">
$(document).ready(function (e) {
	$("#cust_upload_button").on('click',(function(e) {
    e.preventDefault();
    var timestamp = <?php echo $timestamp; ?>;
    var file_data = $("#customer_image").prop("files")[0];   // Getting the properties of file from file field
	  var form_data = new FormData();                         // Creating object of FormData class
	  form_data.append("customer_image", file_data) ;                // Appending parameter named file with properties of file_field to form_data
    form_data.append("timestamp", timestamp);
		$.ajax({
        	url: "upload_customer.php",
          type: "POST",
          enctype: 'multipart/form-data',
          dataType: 'script',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
			    success: function(data)
		      {
			      $("#customer_img_preview").html(data);
		      },
          error: function() 
          {
          } 	        
	   });
	}));
});
</script>


<script>
$(document).ready(function () 
{
    $("#form_no").focus();
    $("#form_no, #customer_id, #customer_name, #customer_address, #no_of_items, #gold_description, #total_weight, #processing_charges, #loan_period, #valuation_charges, #loan_date, #loan_number, #loan_scheme, #loan_amount, #interest_rate, #peenal_interest" ).blur(function()
    {
      if($(this).val().length == 0)
      {
        $(this).next('#span_field_error').remove();
        $(this).after('<span id="span_field_error" class="error error-keyup-1">This field is required.</span>');
        $(this).css('border', 'solid 1px red');
        $(this).focus();
      } 
      else
       {
        $(this).next('#span_field_error').remove();
        $(this).css('border', 'solid 1px #d2d6de');
      }
    });
});
$(document).ready(function () 
{
    $("#customer_id, #no_of_items, #loan_amount, #loan_period").blur(function()
    {
      var numericReg = /^([1-9][0-9]*)$/;
      if(!numericReg.test($(this).val()))
      {
        $(this).next('#span_field_error').remove();
        $(this).after('<span id="span_field_error" class="error error-keyup-1">Numeric characters only.</span>');
        $(this).css('border', 'solid 1px red');
        $(this).focus();
      } 
      else
       {
        $(this).next('#span_field_error').remove();
        $(this).css('border', 'solid 1px #d2d6de');
      }
    });
});

$(document).ready(function () 
{
    $("#total_weight, #processing_charges, #valuation_charges, #peenal_interest, #interest_rate").blur(function()
    {
      var floatReg = /^\d+(\.\d{0,9})?$/;
      if(!floatReg.test($(this).val()))
      {
        $(this).next('#span_field_error').remove();
        $(this).after('<span id="span_field_error" class="error error-keyup-1">Numeric/Decimal characters only.</span>');
        $(this).css('border', 'solid 1px red');
        $(this).focus();
      } 
      else
       {
        $(this).next('#span_field_error').remove();
        $(this).css('border', 'solid 1px #d2d6de');
      }
    });
});



$('#btn_submit').on('click', function (e) 
{
	 	e.preventDefault();
    var timestamp = <?php echo $timestamp; ?>;
    var form_no=$('#form_no').val();
	 	var customer_id=$('#customer_id').val();
    var c_name=$('#customer_name').val();
    var c_address=$('#customer_address').val();
    var no_of_items=$('#no_of_items').val();
    var total_weight=$('#total_weight').val();
    var processing_charges=$('#processing_charges').val();
    var valuation_charges=$('#valuation_charges').val();
    var myDate=$('#loan_date').val();
    var loan_number=$('#loan_number').val();
    var loan_scheme=$('#loan_scheme').val();
    var loan_amount=$('#loan_amount').val();
    var loan_period=$('#loan_period').val();
    var loan_interest=$('#interest_rate').val();
    var gold_description=$('#gold_description').val();    
    var peenal_interest=$('#peenal_interest').val();
    var payment_mode=$('input[name=radio_payment_mode]:checked').val();

    var gold_data = $("#gold_image").prop("files")[0];   // Getting the properties of file from file field
    var customer_data = $("#customer_image").prop("files")[0];   // Getting the properties of file from file field

    

    var cust_image_data = customer_data['name'];
    var gold_image_data =gold_data['name'];

    var cust_n = cust_image_data.indexOf(".");
    var cust_img_name = cust_image_data.substring(0, cust_n);
    var cust_img_ext = cust_image_data.substring(cust_n);
    var c_image = cust_img_name + '_' + timestamp + cust_img_ext;

    var gold_n = gold_image_data.indexOf(".");
    var gold_img_name = gold_image_data.substring(0, gold_n);
    var gold_img_ext = gold_image_data.substring(gold_n);
    var gold_image = gold_img_name + '_' + timestamp + gold_img_ext;

    var myDate = new Date(myDate);
    var loan_date = myDate.getFullYear() + '-' + (myDate.getMonth() + 1) + '-' +  myDate.getDate();
    loan_period = loan_period + " Months";
    total_weight = total_weight + " Grams";
    var data = 
        {
          form_no: form_no,
          customer_id: customer_id,
          c_name: c_name,
          c_address: c_address,
          loan_date: loan_date,
          loan_number: loan_number,
          loan_scheme: loan_scheme,
          loan_period: loan_period,
          loan_amount: loan_amount,
          loan_interest: loan_interest,
          gold_description: gold_description,
          c_image: c_image,
          gold_image: gold_image,
          no_of_items: no_of_items,
          total_weight: total_weight,
          processing_charges: processing_charges,
          valuation_charges: valuation_charges,
          peenal_interest: peenal_interest,
          payment_mode : payment_mode
        };     
        $.ajax(
        {
          type: 'post',
          url: 'http://test.vaibhavnidhi.com/api/admin/gold_loans/add',
          data: data,
          success: function (data) 
          {   
            $('#modal-default').modal('show');
          },//end of success
          error:function(data)
          {
            $('#modal_error').modal('show');
          }
        });//end of ajax    
	 });

</script>
</body>
</html>
