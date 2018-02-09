<?php require 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require 'include/sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->

<?php
  
  if($_SERVER['REQUEST_METHOD']=='GET')
  {
    $loan_id = trim($_REQUEST['loan_id']);
  }
    $url = "http://test.vaibhavnidhi.com/api/admin/gold_loans/".$loan_id;
    header('Content-type: application/json');
    $data = file_get_contents($url);
    $loans_data = json_decode($data);
    $id; $customer_id; $c_name; $c_address; $loan_date; $loan_number; $loan_scheme;
    $loan_period; $loan_amount; $loan_interest; $gold_description; $c_image;
    $gold_image; $no_of_items; $total_weight; $processing_charges; $valuation_charges;
    $peenal_interest; $payment_mode; $created_date; $form_no;
    $date = date('d-m-Y');
    if(!empty($loans_data[0]->id))
    {
      $id = $loans_data[0]->id;
      $form_no = $loans_data[0]->form_no;
      $customer_id = $loans_data[0]->customer_id;
      $c_name = $loans_data[0]->c_name;
      $c_address = $loans_data[0]->c_address;
      $loan_date = $loans_data[0]->loan_date;
      $loan_number = $loans_data[0]->loan_number;
      $loan_scheme = $loans_data[0]->loan_scheme;
      $loan_period = $loans_data[0]->loan_period;
      $loan_amount = $loans_data[0]->loan_amount;
      $loan_interest = $loans_data[0]->loan_interest;
      $gold_description = $loans_data[0]->gold_description;
      $c_image = $loans_data[0]->c_image;
      $gold_image = $loans_data[0]->gold_image;
      $no_of_items = $loans_data[0]->no_of_items;
      $total_weight = $loans_data[0]->total_weight;
      $processing_charges = $loans_data[0]->processing_charges;
      $valuation_charges = $loans_data[0]->valuation_charges;
      $peenal_interest = $loans_data[0]->peenal_interest;
      $payment_mode = $loans_data[0]->payment_mode;
      $created_date = $loans_data[0]->created_date;

      $gold_image_src = "http://localhost/vnidhi_admin/uploaded_images/gold_images/".$gold_image;
      $c_image_src = "http://localhost/vnidhi_admin/uploaded_images/customer/".$c_image;
    }
    else
    {
      echo '<script> window.location = "error.php"; </script>';
    }
    
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gold Loan Invoice
        <small><?php echo '#'.$id; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="view_gold_loans.php">View Gold Loans</a></li>
        <li class="active">Gold Loan Invoice</li>
      </ol>
    </section>
    <div class="pad margin no-print">
      <!-- Main content -->
      <section class="invoice">
        <div class="invoice_user_details">   
          <div class="user_address_section">
          <div class="user_img"><img src="<?php echo $c_image_src;?>" alt=""></div>
          <div class="billedto_section billed_section">
            <address>
              <strong><?php echo strtoupper($c_name); ?></strong><br>
              <?php echo strtoupper($c_address); ?>
            </address>
          </div>
        </div>
        <div class="user_invoice_details">
          <ul>
            <li class="billed_section">
                <span>फॉर्म संख्या:</span> <em><?php echo '#'.$form_no; ?></em>
            </li>
            <li class="billed_section">
              <span>कस्टमर आईडी:</span> <em><?php echo $customer_id; ?></em>             
            </li>
            <li class="billed_section">
                <span>लोन अकाउंट न.:</span> <em><?php echo $loan_number; ?></em>
            </li>
            <li class="billed_section">
                <span>लोन तिथि:</span> <em><?php echo date('d-M-Y', strtotime($loan_date)); ?></em>
            </li> 
          </ul>
        </div>
      </div>

      <div class="gold_loan_details">
        <div class="gold_loan_details_left">          
            <div class="gold_loan_list">
                <ul>
                <li class="billed_section">
                    <span>सामानों की संख्या: </span><em><?php echo $no_of_items; ?></em>
                </li>
                <li class="billed_section">
                    <span>कुल वजन: </span><em><?php echo strtoupper($total_weight); ?></em>
                </li>
                <li class="billed_section">
                    <span>लोन राशि: </span><em><script>
                                                  var a = <?php echo  $loan_amount; ?>;
                                                  document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                                                </script></em>
                </li>
                <li class="billed_section">
                    <span>लोन ब्याज: </span><em><?php echo $loan_interest. '% P.A.'; ?></em>
                </li>
                <li class="billed_section">
                    <span>लोन स्कीम :</span> <em><?php echo strtoupper($loan_scheme); ?></em>
                </li>
                <li class="billed_section">
                    <span>लोन अवधि:</span> <em><?php echo strtoupper($loan_period); ?></em>
                </li>
                </ul>
            </div> 
            <div class="loan_description billed_section">
                <span>स्वर्ण आभूषणों का विवरण: </span><br><em><?php echo strtoupper($gold_description); ?></em>
            </div>         
        </div>
        <div class="gold_loan_details_right">
            <div class="jewellery_img"><img src="<?php echo $gold_image_src;?>" alt=""></div>
        </div>
        </div>

        <div class="loan_payment_section">
            <div class="payment_option_left">
                <div class="billed_section payment_lead"><span>पेमेंट करने का तरीका:</span> <em><?php echo strtoupper($payment_mode);?></em></div>
            </div>
            <div class="payment_option_right">
            <ul>
                <li class="billed_section">
                    <span>प्रोसेसिंग चार्जेज: </span><em><script>
                                                  var a = <?php echo  $processing_charges; ?>;
                                                  document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                                                </script></em>
                </li>
                <li class="billed_section">
                    <span>वैल्यूएशन चार्जेज: </span><em><script>
                                                  var a = <?php echo  $valuation_charges; ?>;
                                                  document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                                                </script></em>             
                </li>
                <li class="billed_section">
                    <span>पीनल ब्याज: </span> <em><script>
                                                  var a = <?php echo  $peenal_interest; ?>;
                                                  document.write(a.toLocaleString("en-IN") + "%");
                                                </script></em>
                </li>
                <li class="billed_section">
                    <span>लोन राशि: </span> <em><script>
                                                  var a = <?php echo  $loan_amount; ?>;
                                                  document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                                                </script></em>
                </li> 
                </ul>
            </div>
        </div>
        <!-- /.row -->
        
        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <a href="gold_loan_invoice_print.php?loan_id=<?php echo $id; ?>">
              <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-print"></i> Print Preview
              </button>
            </a>
          </div>
        </div>
      </section>
      <!-- /.content -->    
    </div>
    <div class="clearfix"></div>
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

</body>
</html>
