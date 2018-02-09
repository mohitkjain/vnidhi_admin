
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vaibhav Gold Loan Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
</head>
  <!-- Left side column. contains the logo and sidebar -->

<body>
<?php
  
  if($_SERVER['REQUEST_METHOD']=='GET')
  {
    $loan_id = trim($_REQUEST['loan_id']);
  }
    $url = "http://test.vaibhavnidhi.com/api/admin/gold_loans/".$loan_id;
    //header('Content-type: application/json');
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


    if ( !class_exists('NumbersToWords') )
    {  
      class NumbersToWords
      {     
        public static $hyphen      = '-';
        public static $dictionary  = array(
          0                   => 'zero',
          1                   => 'one',
          2                   => 'two',
          3                   => 'three',
          4                   => 'four',
          5                   => 'five',
          6                   => 'six',
          7                   => 'seven',
          8                   => 'eight',
          9                   => 'nine',
          10                  => 'ten',
          11                  => 'eleven',
          12                  => 'twelve',
          13                  => 'thirteen',
          14                  => 'fourteen',
          15                  => 'fifteen',
          16                  => 'sixteen',
          17                  => 'seventeen',
          18                  => 'eighteen',
          19                  => 'nineteen',
          20                  => 'twenty',
          30                  => 'thirty',
          40                  => 'fourty',
          50                  => 'fifty',
          60                  => 'sixty',
          70                  => 'seventy',
          80                  => 'eighty',
          90                  => 'ninety',
          100                 => 'hundred',
          1000                => 'thousand',
          1000000             => 'million',
          1000000000          => 'billion',
          1000000000000       => 'trillion',
          1000000000000000    => 'quadrillion',
          1000000000000000000 => 'quintillion'
        );
        public static function convert($number){
          if (!is_numeric($number) ) return false;
          $string = '';
          switch (true) {
            case $number < 21:
                $string = self::$dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = self::$dictionary[$tens];
                if ($units) {
                    $string .= self::$hyphen . self::$dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = self::$dictionary[$hundreds] . ' ' . self::$dictionary[100];
                if ($remainder) {
                    $string .= ' '. self::convert($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = self::convert($numBaseUnits) . ' ' . self::$dictionary[$baseUnit];
                if ($remainder) {
                    //$string .= $remainder < 100 ? self::$conjunction : self::$separator;
                    $string .= ' '.self::convert($remainder);
                }
                break;
          }
          return $string;
        }
      }//end class
    }//end if
    
?>
<div>
   
    <!-- Main content -->
    <section class="invoice invoice_print">
      <div class="invoice_header">
          <div class="invoice_logo"><img src="dist/img/vnidhi_logo.png" alt="Vaibhav Nidhi India Pvt. Ltd."></div>
          <div class="invoice_head_address">
              <div class="address">                    
                  515-516 5th Floor, Sunny Trade Center (STC), <br>
                  New Aatish Market, Mansarovar, <br>
                  Jaipur-302020 (India)<br>
                  Phone: (+91)141-298-1751<br>
                  Email: info@vaibhavnidhi.com
                </div>
          </div>
      </div>

      <div class="invoice_user_details">
          <h4>Company Copy</h4>      
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
        </div>
        <div class="gold_loan_details_right">
            <div class="jewellery_img"><img src="<?php echo $gold_image_src;?>" alt=""></div>
        </div>
        <div class="loan_description billed_section">
                <span>स्वर्ण आभूषणों का विवरण: </span><br><em><?php echo strtoupper($gold_description); ?></em>
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
      <div class="loan_grid">
          
          <div class="table-responsive">            
              <table class="table">
                <tr>
                  <td class="branch_manager">
                  आपके निजी ऋण आवेदन दिनांक <?php echo date('d-M-Y', strtotime($loan_date)); ?> स्वर्ण आभूषण के जमानत के एवज में, उपरोक्त अनुरोध अनुसार, एतद स्वीकृत किया जाता है! 
                    हालाँकि यह लोन कुछ नियमों और शर्तो पर दी जाएगी, जिनमें शामिल हैं, ब्याज दर शुल्क, पीनल ब्याज आदि जिनका लोन स्वीकृति के इस डॉक्यूमेंट में उल्लेख है!
                    <span class="sign_customer">शाखा प्रबन्धक</span>
                  </td>
                  <td class="debtor_section">
                  मैंने लोन के सभी नियमों और शर्तो को समझ लिया है और मुझे लोन की राशि मिल गयी है!<br><br>
                  <span class="sign_customer">ऋणी के हस्ताक्षर</span>
                  </td>
                </tr>               
              </table>
            </div>
            <div class="demand_note_section">
                <table class="table demand_note_tbl">
                    <tr>
                    <td>
                        <div class="billed_section">
                            <span>ब्याज दर:</span> <em><?php echo $loan_interest. '% P.A.'; ?></em>
                        </div>
                    </td>
                    <td>
                        <h3>डिमांड प्रॉमिसरी नोट</h3>
                    </td> 
                    <td>
                        <div class="billed_section text_right">
                            <span>तिथि:</span> <em><?php echo date('d-M-Y', strtotime($loan_date)); ?></em>
                        </div>
                    </td>
                    </tr>
                    
                    <tr>
                    <td colspan="3" class="branch_manager">
                    मैं वचन देता/देती हूँ कि मैं मांग किए जाने पर वैभव निधि इंडिया लि., को प्राप्त राशि  <b><script>
                                                  var a = <?php echo  $loan_amount; ?>;
                                                  document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                                                </script></b> (रु. <b> <?php echo strtoupper(NumbersToWords::convert(floatval($loan_amount)));
                                                                    ?></b> मात्र) का भुगतान करूंगा/करूंगी या धनादेश दूंगा/दूंगी! इसमें उल्लिखित दर से सालाना ब्याज के साथ आज कि तिथि से पूर्ण भुगतान होने की तिथि तक मासिक बकाया राशि भी शामिल होगी| <span class="sign_customer">ऋणी के हस्ताक्षर</span>
                    </td>
                    </tr>
                </table>
            </div>
            <div class="terms_condition_section">
                 <h3>नियम और शर्तें</h3>
                 <ol>
                   <li>लोन की राशि कोलेटरल सिक्यूरिटी (गिरवी रखे सामान) में दी गई ज्वैलरी मे सोने की शुद्धता (कैरेट) और ऋणी के चुने लोन स्कीम पर निर्भर करेगी। लोन की अवधि 12 माह है। </li>
                   <li>सालाना देय ब्याज पर ऋणी के चुने लोन स्कीम पर निर्भर करेगा। ब्याज मासिक चक्रवद्धि दर से लगेगा। लोन की 12 माह की अवधि के बाद की बकाया अवधि के लिए उल्लिखित दर से पीनल ब्याज लगेगा। ब्याज की गणना संपूर्ण वर्ष माह और दिन के आधार पर क्रम से की जाएगी। ईएमआई लोन से संबंधित ब्याज दर और अन्य नियम एवं शर्तो का उल्लेख ईएमआई चार्ट (संलग्न) मे कियागया है।</li>
                   <li>ब्याज वसूलने की अवधि 5 दिन के लिए होगी।</li>
                   <li>कम्पनी सभी संबंधित तथ्यो जैसे धन जुटाने की लागत की मद्देनजर रखते हुए कभी भी अपने विवेक से ब्याज दर मे परिवर्तन करने का अधिकार सुरक्षित रखती है। हालाँकि ब्याज दर मे कोई परिवर्तन आगामी अवधि पर लागू होगा।</li>
                   <li>लोन या उसके किसी हिस्से के ऋणी के पूर्व भुगतान करने की स्थिति मे इस राशि का समायोजन पहले लागत/शुल्क और ब्याज मद तब मूल लोन राशि मे होगा। पूर्व-भुगतान के लिए बकाया राशि पर 4% हर्जाना लगेगा।</li>
                   <li>कम्पनी की मांग पर लोन की राशि के साथ ब्याज और अन्य शुल्कों का भुगतान करना होगा। मांग नही किए जाने पर भी 12 माह की लोन अवधि मे ऋणी को ब्याज सहित लोन भुगतान करना होगा। यदि कोलेटरल सिक्यूरिटी मे रखे स्वर्ण आभूषणों की कीमत कुल बकाया राशि से कम हो जाए तो ऋणी तुरंत इस कमी की भरपाई के लिए नकद या वजन/ मूल्य के अनुपात मे अतिरिकत स्वर्ण आभूषण जमा करें। ऋणी के ऐसा करने मे विफल होने पर कम्पनी लोन वापस लेने का अधिकार रखती है और लोन की चालू अवधि मे कभी भी ऋणी से पूरे लोन राशि के साथ साथ ब्याज और अन्य शुल्क भी मांग सकती है।</li>
                   <li>यदि ऋणी नियत तिथी या कम्पनी की मांग पर उससे पहले ब्याज/शुल्क सहित लोन भुगतान नही कर पाता है तो कम्पनी को कानूनी अधिकार है कि ऋणी के खिलाफ कानूनी कार्यवाही आरंभ करे या गिरवी रखे आभूषणों को नीलामी मे बेच दे। हांलांकि कम्पनी 14 दिन की एक पूर्व सूचना ऋणी के लोन आवेदन मे लिखे पते पर भेजेगी। इस प्रक्रिया से प्राप्त राशि से कम्पनी लोन की राशि ब्याज और अन्य शुल्क हासिल करेगी। यदि नीलामी से मिली राशि कम्पनी की कुल बकाया राशि चुकानें के लिए कम हो तो यह कम पडी राशि ऋ़णी या उसकी निजी भूमि भवन या अन्य चल अचल संपति से वसूली जाएगी। यदि नीलामी से मिली राशि ऋणी से कुल बकाया राशि से अधिक होगी तो इस राशि के मिलने के 30 दिनो के अंदर अतिरिक्त राशि चेक से ऋणी को दे दी जाएगी हांलांकि यदि ऋणी से कुछ अन्य राशियां बकाया हो तो इस अतिरिक्त राशि से काट ली जाएगी और फिर भी कुछ बकाया राशि हो तो ऋणी को वह राशि वापस कर दी जाएगी।</li>
                   <li>मै इससे सहमत हूं कि कम्पनी द्वारा मुझे दिए गए ऋण की पूर्व शर्त के तौर पर यदि ऋण या उस पर लगे ब्याज के पुनर्भुगतान मे असफलता की स्थिति मे या सहमति के अनुसार ऋण के किसी किस्त (किस्तों) का सबद्ध नियत तिथी (तिथियों) पर भुगतान मे असफलता की स्थिती मे कम्पनी को बेहिचक डिफाॅल्टर के रूप मे मेरा नाम विवरण और मेरी तस्वीर किसी प्रकार और किसी भी माध्यम से जाहिर करने या प्रकाशित करने का अधिकार होगा जो कम्पनी अपने पूर्व विवेकाधिकार से उचित समझें ऋण की वसूली के लिए कम्पनी रोड शो (शाज) या सार्वजनिक मुनादी (लाउड स्पीकर से घोषणा) भी कर सकती है।</li>
                   <li>यदि कम्पनी किसी कारण से किसी लोन स्कीम को बंद करती है तो उस स्कीम के तहत अन्य लोन नही दिया जाएगा। यदि स्कीम बंद होने के बावजूद कोई ऋणी ब्याज भुगतान कर लोन जारी रखना चाहता है तो वह कथित लोन खाता बंद कर किसी अन्य मौजूदा/ नई स्कीम के तहत नया लोन ले सकता हे। जिसके तहत ऋणी को बंद की गई स्कीम के प्रति ग्राम सोने की दर से ही लोन उपलब्ध हो या नई स्कीम के तहत कम राशि मिल रही है तो उसे अंतर की राशि का भुगतान करना होगा।</li>
                   <li>ऋ़णी एतद्द्वारा कम्पनी को यह सहमति देता है कि यह ऋणी को दिए गए कथित ऋण संबंधी कोई भी जानकारी या आंकडा क्रेडिट इन्फाॅर्मेशन ब्यूरो ( इंडिया) लिमिटेड और/ या भारतीय रिजर्व बैंक या अन्य वैधानिक निकायोे द्वारा इस संदर्भ मे अधिकृत एंजेंसी को प्रदान करे। ऋणी को यह भी पता है कि कथित एजेंसी इस प्रकार की जानकारी का जैसा उचित समझे उपयोग या साझा कर सकती है।</li>
                   <li>ऋणी खुद लोन के साथ ब्याज और शुल्को का पूरा भुगतान कर बतौर सिक्यूूरिटी रखे आभूषणों को वापस प्राप्त कर सकता है। लोन खाता बंद करते समय इस स्वीकृति पत्र का डुप्लीकेट कम्पनी को सौंपना होगा। गिरवी रखे आभूषण वापस पाने के लिए यह अनिवार्य है।</li>
                   <li>सभी बकाया राशियों के भुगतान के बाद, ऋणी को ही गिरवी रखी चीजें वापस दी जाएगी। सेट आफ करने के अधिकार का प्रयोग होता हैे तो ऋणी को दावे/ दावा के विवरणी के साथ विधिवत सूचना दी जाएगी।</li>
                   <li>लोन का उपयोग किसी गैर कानूनी या अवैध कार्य मे नही किया जाएगा।</li>
                   <li>कम्पनी ऋणी का खाता एक शाखा से दूसरी शाखा मे स्थानांतरित करने के किसी आग्रह पर विचार नही करेगी। हालांकि कम्पनी लोन खाता और / या गिरवी रखे सामानों को कम्पनी की किसी अन्य शाखा मे स्थानांतरित कर सकती है।</li>
                   <li>कम्पनी हीरा आदि बहुमूल्य रत्न जडित आभूषणों को स्वीकार नही करेगी और न ही बाद मे कीमती पत्थरो से संबंद्व किसी दावे पर कोई विचार करेगी।</li>
                   <li>कम्पनी ऋणी द्वारा उपलब्ध कराए गए प्रमाणों या लोन आवेदन मे की गई घोषणाओं और कुछ मौलिक परीक्षण के आधार पर ही गिरवी रखे सामानों की शु़द्धता का सत्यापन करती है। यदि कम्पनी बाद मे पाती है या उसे पता लगता है कि बतौर सिक्यूरिटी गिरवी रखे सोने के आभुषण हानिकारक है या 22 कैरेट से कम शुद्ध है तो कम्पनी ऋणी के खिलाफ सिविल और क्रिमिनल कार्यवाही शुरू करेगी और इस मद मे कम्पनी के सारेे खर्चो और नुकसानों की भरपाई के लिए ऋणी जिम्मेदार होगा।</li>
                   <li>यदि चोरी सेंधमारी आदि के परिमाणस्वरूप गिरवी रखे सामान का नुकसान हो जाता है तो कम्पनी की जिम्मेदारी लोन राशि निर्धारण के समय आभूषण के निवल वजन के बराबर सोने के वर्तमान बाजार मूल्य अर्थात ऋणी के लिखित दावे की तिथि मे मुंबई एसोसिएशन से प्रकाशित 22 कैरेट सोने की दर से भुगतान करने तक सीमित होगी। यह भुगतान ऋणी के लिखित दावे की तिथि तक ब्याज सहित लोन की राशि काट कर किया जाएगा।</li>
                   <li>सभी पत्राचार लोन आवेदन पत्र मे लिखे ऋणी के पते पर किए जाएंगे। ऋणी अपना पता या फोन नंबर मे किसी परिवर्तन की सूचना अविलम्ब कम्पनी को देंगे। ऐसा नही करने पर यह समझा जाएगा कि कथित पते पर भेजा गया डिमांड नोटिस नीलामी सूचना आदि सारे पत्र ऋणी को मिल गए।</li>
                   <li>कम्पनी ब्याज/ मूलधन भुगतान की याद दिलाने या कम्पनी या अन्य संगठन के अन्य उत्पादों/सेवाओं की जानकारी देने या ऋणी को अन्य कोई सूचना देने के लिए एसएमएस या अन्य माध्यम से सूचना दे सकती हैे।</li>
                   <li>यह लोन कम्पनी की वेबसाइट www.vaibhavnidhi.com पर प्रकाशित कम्पनी के फेयर प्रैक्टिस कोड के नियमों के तहत स्वीकृत है।</li>
                   <li>कम्पनी के अधिकारी /अकेक्षक कोलेटरल सेक्यूरिटी मे रखे आभूषणो की शुद्धता का सत्यापन कर सकते है। वें जब भी जरूरत हो कम्पनी की मानक आंकलन पद्धतियों पर ऐसे सत्यापन कर सकते है।</li>
                   <li>ऋणी ही लोन की राशि पर लागू स्टाम्प ड्यूटी का भार लेंगे/ भुगतान करेंगे। इनमे लोन खाता संबंधी समय समय पर सरकार/प्राधिकरण से लागू अतिरिक्त स्टाम्प ड्यूटी कर हर्जाना आदि शामिल है।</li>
                   <li>यदि सोने की आभूषण की सिक्यूरिटी देकर लिए गए लोन के किसी मामले मे ऋणी को कोई शिकायत है तो ऋणी पहले संबंधित शाखा प्रबंधक को इसकी सूचना देंगे। शाखा प्रबंधक के शिकायत निपटाने मे असफल रहने पर ऋणी यह मामला क्षेत्रीय प्रबंधक के सामने रख सकता है जिसका पता परिसर मे लिखा है। यदि क्षेत्रीय प्रबंधक के समाधान से ऋणी संतुष्ट नही है तो ऋणी कम्पनी के शिकायत समाधान प्रकोष्ठ को निम्न पते पर लिख सकता है
                       शिकायत समाधान प्रकोष्ठ अधिकारी वैभव निधि इंडिया लिमिटेड ऑफिस न.515-516, 5th फ्लोर, न्यू आतिश मार्केट मानसरोवर, जयपुर- 302020</li>
                   <li>कम्पनी लोन स्वीकृति पत्र मे उल्लिखित नियमों और शर्तो के अतिरिक्त (ऋणी द्वारा अघोषित नई जानकारी लेने के सिवा) किसी उद्देश्य से ऋणी के मामलों मे दखल नही देगी।</li>
                   <li>ऋणी कम्पनी को मूल्य वृद्धि से सुरक्षा के उद्देश्य से गिरवी रखे कथित सामानों के लिए आप्शंस कॉन्ट्रैक्ट करने का अधिकार देता है जो इस लोन के बतौर कोलेटरल सिक्यूरिटी दिया जाता है और ऋणी आप्शंस कॉन्ट्रैक्ट के लिए आनुपातिक प्रीमियम देने को सहमत है।</li>
                   <li>कम्पनी अपने नियंत्रण से बाहर के कारणों जैस की आग लगने की दुर्घटना, बाढ, भूकंप आदि प्राकृतिक आपदाओं से गिरवी रखे सामानों के किसी नुकसान/क्षति के लिए जिम्मेदार नही है। ऐसे किसी मामले मे ऋणी को वही मुआवजा मिलेगा जो जब कम्पनी को बीमा के दावे से (यदि) मिलेगां।</li>
                   <li>लोन देने/ लोन वापस करने/ ब्याज देने और अन्य सभी लेन देन ऋणी को स्वयं किसी कार्य दिवस मे कार्य समय मे करना होगा। यदि किसी राशि के पुनर्भुगतान या भुगतान की नियत तिथि कार्य दिवस नही है तो यह कार्य उस दिन से ठीक पहले दिन होगा।</li>
                 </ol>
            </div>
            <div class="terms_condition_section">
                 <h3>घोषणा और वचन</h3>
                 <ol>
                   <li>मैं 12 माह के अंदर अपने द्वारा लिए गए ऋण समस्त ब्याज और अन्य शुल्को का भुगतान करने का वचन देता/ देती हूँ।</li>
                   <li>मैने, अपने द्वारा लिए गए ऋण पर लागू ब्याज दर यहाँ और आगे लिखे सभी नियमों और शर्तो को पूरी तरह समझ लिया है और मैं सभी से सहमत हूँ, और सभी को स्वीकार करता हूँ।</li>
                   <li>मै जो ऋ़ण ले रहा/रही हूँ, उसके लिए बतौर कोलेटरल सिक्यूरिटी दिए गए सभी आभूषणों को सही और लाभग्राही स्वामी हूँ। मैने कथित आभूषण कानूनी तौर पर हासिल किए है और इनके स्वामित्व पर किसी जीवित व्यक्ति या किसी मृत व्यक्ति के कानूनी उत्तराधिकारी का कोई दावा या कोई विवाद नही हैं</li>
                   <li>सिक्यूरिटी मे दिए आभूषण 22 कैरेट शुद्ध सोने का हैै।</li>
                   <li>ऋण, ब्याज के नियत पुनर्भुगतान के सिक्यूरिटी हेतू मैं स्वेच्छा से वैभव निधि इंडिया लिमिटेड के नाम डिमांड प्राॅमिसरी नोट बना रहा/ रही हूँ। मैने डिमांड प्राॅमिसरी नोट समेत ऋण देंने के सभी नियमों और शर्तो को पढ लिया है। मुझे ये अंग्रेजी/हिन्दी/गुजराती/ मराठी/ पंजाबी/बंगाली/ उडिया (भाषा) मे दिए गए जो मेरी समझ मे आती है और मेरे लिए सहज है। इसके अतिरिक्त मुझे मेरी समझ की भाषा मे उल्लिखित नियमो और शर्तो का बता दिया गया है और मैने विभिन्न क्लाॅज का पूरा अर्थ और प्रभाव समझ लिया है और तब मेरे सामने भरे गए इन दस्तावेजों को कार्यरूप दियाहै। ऋण हेतु और इससे सबंधित सभी दस्तावेजों मेरे द्वारा कार्यरत दिए गए की प्रति /प्रतियां मुझे मिल गई है।</li>
                   <li>यदि सोने के स्वामित्व और/या शुद्धता संबंधील मेरे कथन घोषणा गलत साबित होती है तो मैं वैभव निधि इंडिया लिमिटेड को गलत घोषणा से कम्पनी को हुई क्षति की सीमा तक जिम्मेदारी मुक्त रखुंगा/ रखुंगी और इस ऋण का ब्याज और अन्य शुल्को समेत पुनर्भुगतान करना होगा। इस ऋण करार से यदि कोई विवाद होता है तो दि आर्बिट्रेशन एण्ड रीकसलिएिशन एक्ट 1996 के प्रावधानों के अनुसार कम्पनी द्वारा नियुक्त एकल ऑर्बिटेटर के समक्ष सुनवाई के लिए प्रस्तुत किया जाएगा। आर्बिट्रेशन के तहत इस लेन देन (ट्रांज़ैक्शन) की जांच और सुनवाई करने का अधिकार केवल जयपुर के न्यायालयों को होगा।</br>
                       मैं आधार संख्या ................................. का धारक एतदद्वारा यूआईडीआई से सत्यापन के उद्देंश्यों से वैभव निधि इंडिया लिमिटेड को मेरी आधार नबंर, नाम और अंगुलियो/ आंखों की पुतिलयों के निशान लेने की सहमति देता/देती हूँ। वैभव निधि इंडिया लिमिटेड ने मुझे सुचित किया है कि मेरी पहचान संबंधी जानकारी का उपयोग केवल ई केवाईसी के लिए किया जाएगा ओर मुझे यह सूचित किया है कि मेरी बायोमैट्रिक को स्टोर/ शेयर नही किया जाएगा ओर केवल सत्यापन के उदेश्य से सीआईडीआर को भेजा जाएगां।</li>
                 </ol>
                 <div class="date_left billed_section"><span>तिथि:</span> <em><?php echo date('d-M-Y', strtotime($loan_date)); ?></em></div>
                 <div class="sign_right"><span class="sign_customer">ऋणी के हस्ताक्षर</span><br><br>
            </div>
            <div class="loan_grid">          
                <div class="table-responsive">            
                    <table class="table">
                        <tr>
                        <td class="branch_manager">
                        <h3>प्रमाण-पत्र</h3>
                        ऋण की सिक्यूरिटी के तोर पर रखे आभूषण की शुद्धता (निवल वजन) मे लगभग 22 कैरेट आंकी गई है। यह आकलन केवल ऋण की मान्य राशि और नीलामी की आरक्षित राशि के निर्धारण मात्र के उदेश्य से ऋणी द्वारा दिए गए प्रमाणों/ घोषणाओं पर आधारित है। इस प्रमाण के आधार पर सोने की शुद्धता के प्रति कम्पनी की कोई जिम्मेदारी नही है।
                            <span class="sign_customer">शाखा प्रबंधक के हस्ताक्षर</span>
                        </td>                        
                        </tr>
                        <tr>
                        <td class="debtor_section">
                        <h3>एक्नाॅलेजमेंट (ऋण खाता को बंद करने के समय)</h3>
                        मैने इस मंजूरी पत्र का डुप्लीकेट (टोकन) सौंप कर मेरे उल्लिखित ऋण के विरूद्ध बतौर कोलेटरल सिक्यूरिटी रखे आभुषण (आभुषणों) वापस मिल गया है/ गये हैं।<br><br>
                            <div class="date_left billed_section"><span>तिथि:</span> <em><?php echo date('d-M-Y', strtotime($loan_date)); ?></em></div>
                            <div class="sign_right"><span class="sign_customer">ऋणी के हस्ताक्षर</span>
                        </td>
                        </tr>               
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="invoice invoice_print">
      <div class="invoice_header">
          <div class="invoice_logo"><img src="dist/img/vnidhi_logo.png" alt="Vaibhav Nidhi India Pvt. Ltd."></div>
          <div class="invoice_head_address">
              <div class="address">                    
                  515-516 5th Floor, Sunny Trade Center (STC), <br>
                  New Aatish Market, Mansarovar, <br>
                  Jaipur-302020 (India)<br>
                  Phone: (+91)141-298-1751<br>
                  Email: info@vaibhavnidhi.com
                </div>
          </div>
      </div>

      <div class="invoice_user_details">
          <h4>Customer Copy</h4>      
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
                <span>फॉर्म संख्या:</span> <em><?php echo '#'.$id; ?></em>
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
        </div>
        <div class="gold_loan_details_right">
            <div class="jewellery_img"><img src="<?php echo $gold_image_src;?>" alt=""></div>
        </div>
        <div class="loan_description billed_section">
                <span>स्वर्ण आभूषणों का विवरण: </span><br><em><?php echo strtoupper($gold_description); ?></em>
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
      <div class="loan_grid">
          
          <div class="table-responsive">            
              <table class="table">
                <tr>
                  <td class="branch_manager">
                  आपके निजी ऋण आवेदन दिनांक <?php echo date('d-M-Y', strtotime($loan_date)); ?> स्वर्ण आभूषण के जमानत के एवज में, उपरोक्त अनुरोध अनुसार, एतद स्वीकृत किया जाता है! 
                    हालाँकि यह लोन कुछ नियमों और शर्तो पर दी जाएगी, जिनमें शामिल हैं, ब्याज दर शुल्क, पीनल ब्याज आदि जिनका लोन स्वीकृति के इस डॉक्यूमेंट में उल्लेख है!
                    <span class="sign_customer">शाखा प्रबन्धक</span>
                  </td>
                  <td class="debtor_section">
                  मैंने लोन के सभी नियमों और शर्तो को समझ लिया है और मुझे लोन की राशि मिल गयी है!<br><br>
                  <span class="sign_customer">ऋणी के हस्ताक्षर</span>
                  </td>
                </tr>               
              </table>
            </div>
            <div class="demand_note_section">
                <table class="table demand_note_tbl">
                    <tr>
                    <td>
                        <div class="billed_section">
                            <span>ब्याज दर:</span> <em><?php echo $loan_interest. '% P.A.'; ?></em>
                        </div>
                    </td>
                    <td>
                        <h3>डिमांड प्रॉमिसरी नोट</h3>
                    </td> 
                    <td>
                        <div class="billed_section text_right">
                            <span>तिथि:</span> <em><?php echo date('d-M-Y', strtotime($loan_date)); ?></em>
                        </div>
                    </td>
                    </tr>
                    
                    <tr>
                    <td colspan="3" class="branch_manager">
                    मैं वचन देता/देती हूँ कि मैं मांग किए जाने पर वैभव निधि इंडिया लि., को प्राप्त राशि  <b><script>
                                                  var a = <?php echo  $loan_amount; ?>;
                                                  document.write(a.toLocaleString("en-IN",{style:"currency",currency:"INR"}));
                                                </script></b> (रु. <b> <?php echo strtoupper(NumbersToWords::convert(floatval($loan_amount)));
                                                                    ?></b> मात्र) का भुगतान करूंगा/करूंगी या धनादेश दूंगा/दूंगी! इसमें उल्लिखित दर से सालाना ब्याज के साथ आज कि तिथि से पूर्ण भुगतान होने की तिथि तक मासिक बकाया राशि भी शामिल होगी| <span class="sign_customer">ऋणी के हस्ताक्षर</span>
                    </td>
                    </tr>
                </table>
            </div>
            <div class="terms_condition_section">
                 <h3>नियम और शर्तें</h3>
                 <ol>
                   <li>लोन की राशि कोलेटरल सिक्यूरिटी (गिरवी रखे सामान) में दी गई ज्वैलरी मे सोने की शुद्धता (कैरेट) और ऋणी के चुने लोन स्कीम पर निर्भर करेगी। लोन की अवधि 12 माह है। </li>
                   <li>सालाना देय ब्याज पर ऋणी के चुने लोन स्कीम पर निर्भर करेगा। ब्याज मासिक चक्रवद्धि दर से लगेगा। लोन की 12 माह की अवधि के बाद की बकाया अवधि के लिए उल्लिखित दर से पीनल ब्याज लगेगा। ब्याज की गणना संपूर्ण वर्ष माह और दिन के आधार पर क्रम से की जाएगी। ईएमआई लोन से संबंधित ब्याज दर और अन्य नियम एवं शर्तो का उल्लेख ईएमआई चार्ट (संलग्न) मे कियागया है।</li>
                   <li>ब्याज वसूलने की अवधि 5 दिन के लिए होगी।</li>
                   <li>कम्पनी सभी संबंधित तथ्यो जैसे धन जुटाने की लागत की मद्देनजर रखते हुए कभी भी अपने विवेक से ब्याज दर मे परिवर्तन करने का अधिकार सुरक्षित रखती है। हालाँकि ब्याज दर मे कोई परिवर्तन आगामी अवधि पर लागू होगा।</li>
                   <li>लोन या उसके किसी हिस्से के ऋणी के पूर्व भुगतान करने की स्थिति मे इस राशि का समायोजन पहले लागत/शुल्क और ब्याज मद तब मूल लोन राशि मे होगा। पूर्व-भुगतान के लिए बकाया राशि पर 4% हर्जाना लगेगा।</li>
                   <li>कम्पनी की मांग पर लोन की राशि के साथ ब्याज और अन्य शुल्कों का भुगतान करना होगा। मांग नही किए जाने पर भी 12 माह की लोन अवधि मे ऋणी को ब्याज सहित लोन भुगतान करना होगा। यदि कोलेटरल सिक्यूरिटी मे रखे स्वर्ण आभूषणों की कीमत कुल बकाया राशि से कम हो जाए तो ऋणी तुरंत इस कमी की भरपाई के लिए नकद या वजन/ मूल्य के अनुपात मे अतिरिकत स्वर्ण आभूषण जमा करें। ऋणी के ऐसा करने मे विफल होने पर कम्पनी लोन वापस लेने का अधिकार रखती है और लोन की चालू अवधि मे कभी भी ऋणी से पूरे लोन राशि के साथ साथ ब्याज और अन्य शुल्क भी मांग सकती है।</li>
                   <li>यदि ऋणी नियत तिथी या कम्पनी की मांग पर उससे पहले ब्याज/शुल्क सहित लोन भुगतान नही कर पाता है तो कम्पनी को कानूनी अधिकार है कि ऋणी के खिलाफ कानूनी कार्यवाही आरंभ करे या गिरवी रखे आभूषणों को नीलामी मे बेच दे। हांलांकि कम्पनी 14 दिन की एक पूर्व सूचना ऋणी के लोन आवेदन मे लिखे पते पर भेजेगी। इस प्रक्रिया से प्राप्त राशि से कम्पनी लोन की राशि ब्याज और अन्य शुल्क हासिल करेगी। यदि नीलामी से मिली राशि कम्पनी की कुल बकाया राशि चुकानें के लिए कम हो तो यह कम पडी राशि ऋ़णी या उसकी निजी भूमि भवन या अन्य चल अचल संपति से वसूली जाएगी। यदि नीलामी से मिली राशि ऋणी से कुल बकाया राशि से अधिक होगी तो इस राशि के मिलने के 30 दिनो के अंदर अतिरिक्त राशि चेक से ऋणी को दे दी जाएगी हांलांकि यदि ऋणी से कुछ अन्य राशियां बकाया हो तो इस अतिरिक्त राशि से काट ली जाएगी और फिर भी कुछ बकाया राशि हो तो ऋणी को वह राशि वापस कर दी जाएगी।</li>
                   <li>मै इससे सहमत हूं कि कम्पनी द्वारा मुझे दिए गए ऋण की पूर्व शर्त के तौर पर यदि ऋण या उस पर लगे ब्याज के पुनर्भुगतान मे असफलता की स्थिति मे या सहमति के अनुसार ऋण के किसी किस्त (किस्तों) का सबद्ध नियत तिथी (तिथियों) पर भुगतान मे असफलता की स्थिती मे कम्पनी को बेहिचक डिफाॅल्टर के रूप मे मेरा नाम विवरण और मेरी तस्वीर किसी प्रकार और किसी भी माध्यम से जाहिर करने या प्रकाशित करने का अधिकार होगा जो कम्पनी अपने पूर्व विवेकाधिकार से उचित समझें ऋण की वसूली के लिए कम्पनी रोड शो (शाज) या सार्वजनिक मुनादी (लाउड स्पीकर से घोषणा) भी कर सकती है।</li>
                   <li>यदि कम्पनी किसी कारण से किसी लोन स्कीम को बंद करती है तो उस स्कीम के तहत अन्य लोन नही दिया जाएगा। यदि स्कीम बंद होने के बावजूद कोई ऋणी ब्याज भुगतान कर लोन जारी रखना चाहता है तो वह कथित लोन खाता बंद कर किसी अन्य मौजूदा/ नई स्कीम के तहत नया लोन ले सकता हे। जिसके तहत ऋणी को बंद की गई स्कीम के प्रति ग्राम सोने की दर से ही लोन उपलब्ध हो या नई स्कीम के तहत कम राशि मिल रही है तो उसे अंतर की राशि का भुगतान करना होगा।</li>
                   <li>ऋ़णी एतद्द्वारा कम्पनी को यह सहमति देता है कि यह ऋणी को दिए गए कथित ऋण संबंधी कोई भी जानकारी या आंकडा क्रेडिट इन्फाॅर्मेशन ब्यूरो ( इंडिया) लिमिटेड और/ या भारतीय रिजर्व बैंक या अन्य वैधानिक निकायोे द्वारा इस संदर्भ मे अधिकृत एंजेंसी को प्रदान करे। ऋणी को यह भी पता है कि कथित एजेंसी इस प्रकार की जानकारी का जैसा उचित समझे उपयोग या साझा कर सकती है।</li>
                   <li>ऋणी खुद लोन के साथ ब्याज और शुल्को का पूरा भुगतान कर बतौर सिक्यूूरिटी रखे आभूषणों को वापस प्राप्त कर सकता है। लोन खाता बंद करते समय इस स्वीकृति पत्र का डुप्लीकेट कम्पनी को सौंपना होगा। गिरवी रखे आभूषण वापस पाने के लिए यह अनिवार्य है।</li>
                   <li>सभी बकाया राशियों के भुगतान के बाद, ऋणी को ही गिरवी रखी चीजें वापस दी जाएगी। सेट आफ करने के अधिकार का प्रयोग होता हैे तो ऋणी को दावे/ दावा के विवरणी के साथ विधिवत सूचना दी जाएगी।</li>
                   <li>लोन का उपयोग किसी गैर कानूनी या अवैध कार्य मे नही किया जाएगा।</li>
                   <li>कम्पनी ऋणी का खाता एक शाखा से दूसरी शाखा मे स्थानांतरित करने के किसी आग्रह पर विचार नही करेगी। हालांकि कम्पनी लोन खाता और / या गिरवी रखे सामानों को कम्पनी की किसी अन्य शाखा मे स्थानांतरित कर सकती है।</li>
                   <li>कम्पनी हीरा आदि बहुमूल्य रत्न जडित आभूषणों को स्वीकार नही करेगी और न ही बाद मे कीमती पत्थरो से संबंद्व किसी दावे पर कोई विचार करेगी।</li>
                   <li>कम्पनी ऋणी द्वारा उपलब्ध कराए गए प्रमाणों या लोन आवेदन मे की गई घोषणाओं और कुछ मौलिक परीक्षण के आधार पर ही गिरवी रखे सामानों की शु़द्धता का सत्यापन करती है। यदि कम्पनी बाद मे पाती है या उसे पता लगता है कि बतौर सिक्यूरिटी गिरवी रखे सोने के आभुषण हानिकारक है या 22 कैरेट से कम शुद्ध है तो कम्पनी ऋणी के खिलाफ सिविल और क्रिमिनल कार्यवाही शुरू करेगी और इस मद मे कम्पनी के सारेे खर्चो और नुकसानों की भरपाई के लिए ऋणी जिम्मेदार होगा।</li>
                   <li>यदि चोरी सेंधमारी आदि के परिमाणस्वरूप गिरवी रखे सामान का नुकसान हो जाता है तो कम्पनी की जिम्मेदारी लोन राशि निर्धारण के समय आभूषण के निवल वजन के बराबर सोने के वर्तमान बाजार मूल्य अर्थात ऋणी के लिखित दावे की तिथि मे मुंबई एसोसिएशन से प्रकाशित 22 कैरेट सोने की दर से भुगतान करने तक सीमित होगी। यह भुगतान ऋणी के लिखित दावे की तिथि तक ब्याज सहित लोन की राशि काट कर किया जाएगा।</li>
                   <li>सभी पत्राचार लोन आवेदन पत्र मे लिखे ऋणी के पते पर किए जाएंगे। ऋणी अपना पता या फोन नंबर मे किसी परिवर्तन की सूचना अविलम्ब कम्पनी को देंगे। ऐसा नही करने पर यह समझा जाएगा कि कथित पते पर भेजा गया डिमांड नोटिस नीलामी सूचना आदि सारे पत्र ऋणी को मिल गए।</li>
                   <li>कम्पनी ब्याज/ मूलधन भुगतान की याद दिलाने या कम्पनी या अन्य संगठन के अन्य उत्पादों/सेवाओं की जानकारी देने या ऋणी को अन्य कोई सूचना देने के लिए एसएमएस या अन्य माध्यम से सूचना दे सकती हैे।</li>
                   <li>यह लोन कम्पनी की वेबसाइट www.vaibhavnidhi.com पर प्रकाशित कम्पनी के फेयर प्रैक्टिस कोड के नियमों के तहत स्वीकृत है।</li>
                   <li>कम्पनी के अधिकारी /अकेक्षक कोलेटरल सेक्यूरिटी मे रखे आभूषणो की शुद्धता का सत्यापन कर सकते है। वें जब भी जरूरत हो कम्पनी की मानक आंकलन पद्धतियों पर ऐसे सत्यापन कर सकते है।</li>
                   <li>ऋणी ही लोन की राशि पर लागू स्टाम्प ड्यूटी का भार लेंगे/ भुगतान करेंगे। इनमे लोन खाता संबंधी समय समय पर सरकार/प्राधिकरण से लागू अतिरिक्त स्टाम्प ड्यूटी कर हर्जाना आदि शामिल है।</li>
                   <li>यदि सोने की आभूषण की सिक्यूरिटी देकर लिए गए लोन के किसी मामले मे ऋणी को कोई शिकायत है तो ऋणी पहले संबंधित शाखा प्रबंधक को इसकी सूचना देंगे। शाखा प्रबंधक के शिकायत निपटाने मे असफल रहने पर ऋणी यह मामला क्षेत्रीय प्रबंधक के सामने रख सकता है जिसका पता परिसर मे लिखा है। यदि क्षेत्रीय प्रबंधक के समाधान से ऋणी संतुष्ट नही है तो ऋणी कम्पनी के शिकायत समाधान प्रकोष्ठ को निम्न पते पर लिख सकता है
                       शिकायत समाधान प्रकोष्ठ अधिकारी वैभव निधि इंडिया लिमिटेड ऑफिस न.515-516, 5th फ्लोर, न्यू आतिश मार्केट मानसरोवर, जयपुर- 302020</li>
                   <li>कम्पनी लोन स्वीकृति पत्र मे उल्लिखित नियमों और शर्तो के अतिरिक्त (ऋणी द्वारा अघोषित नई जानकारी लेने के सिवा) किसी उद्देश्य से ऋणी के मामलों मे दखल नही देगी।</li>
                   <li>ऋणी कम्पनी को मूल्य वृद्धि से सुरक्षा के उद्देश्य से गिरवी रखे कथित सामानों के लिए आप्शंस कॉन्ट्रैक्ट करने का अधिकार देता है जो इस लोन के बतौर कोलेटरल सिक्यूरिटी दिया जाता है और ऋणी आप्शंस कॉन्ट्रैक्ट के लिए आनुपातिक प्रीमियम देने को सहमत है।</li>
                   <li>कम्पनी अपने नियंत्रण से बाहर के कारणों जैस की आग लगने की दुर्घटना, बाढ, भूकंप आदि प्राकृतिक आपदाओं से गिरवी रखे सामानों के किसी नुकसान/क्षति के लिए जिम्मेदार नही है। ऐसे किसी मामले मे ऋणी को वही मुआवजा मिलेगा जो जब कम्पनी को बीमा के दावे से (यदि) मिलेगां।</li>
                   <li>लोन देने/ लोन वापस करने/ ब्याज देने और अन्य सभी लेन देन ऋणी को स्वयं किसी कार्य दिवस मे कार्य समय मे करना होगा। यदि किसी राशि के पुनर्भुगतान या भुगतान की नियत तिथि कार्य दिवस नही है तो यह कार्य उस दिन से ठीक पहले दिन होगा।</li>
                 </ol>
            </div>
            <div class="terms_condition_section">
                <h3>घोषणा और वचन</h3>
                <ol>
                <li>मैं 12 माह के अंदर अपने द्वारा लिए गए ऋण समस्त ब्याज और अन्य शुल्को का भुगतान करने का वचन देता/ देती हूँ।</li>
                <li>मैने, अपने द्वारा लिए गए ऋण पर लागू ब्याज दर यहाँ और आगे लिखे सभी नियमों और शर्तो को पूरी तरह समझ लिया है और मैं सभी से सहमत हूँ, और सभी को स्वीकार करता हूँ।</li>
                <li>मै जो ऋ़ण ले रहा/रही हूँ, उसके लिए बतौर कोलेटरल सिक्यूरिटी दिए गए सभी आभूषणों को सही और लाभग्राही स्वामी हूँ। मैने कथित आभूषण कानूनी तौर पर हासिल किए है और इनके स्वामित्व पर किसी जीवित व्यक्ति या किसी मृत व्यक्ति के कानूनी उत्तराधिकारी का कोई दावा या कोई विवाद नही हैं</li>
                <li>सिक्यूरिटी मे दिए आभूषण 22 कैरेट शुद्ध सोने का हैै।</li>
                <li>ऋण, ब्याज के नियत पुनर्भुगतान के सिक्यूरिटी हेतू मैं स्वेच्छा से वैभव निधि इंडिया लिमिटेड के नाम डिमांड प्राॅमिसरी नोट बना रहा/ रही हूँ। मैने डिमांड प्राॅमिसरी नोट समेत ऋण देंने के सभी नियमों और शर्तो को पढ लिया है। मुझे ये अंग्रेजी/हिन्दी/गुजराती/ मराठी/ पंजाबी/बंगाली/ उडिया (भाषा) मे दिए गए जो मेरी समझ मे आती है और मेरे लिए सहज है। इसके अतिरिक्त मुझे मेरी समझ की भाषा मे उल्लिखित नियमो और शर्तो का बता दिया गया है और मैने विभिन्न क्लाॅज का पूरा अर्थ और प्रभाव समझ लिया है और तब मेरे सामने भरे गए इन दस्तावेजों को कार्यरूप दियाहै। ऋण हेतु और इससे सबंधित सभी दस्तावेजों मेरे द्वारा कार्यरत दिए गए की प्रति /प्रतियां मुझे मिल गई है।</li>
                <li>यदि सोने के स्वामित्व और/या शुद्धता संबंधील मेरे कथन घोषणा गलत साबित होती है तो मैं वैभव निधि इंडिया लिमिटेड को गलत घोषणा से कम्पनी को हुई क्षति की सीमा तक जिम्मेदारी मुक्त रखुंगा/ रखुंगी और इस ऋण का ब्याज और अन्य शुल्को समेत पुनर्भुगतान करना होगा। इस ऋण करार से यदि कोई विवाद होता है तो दि आर्बिट्रेशन एण्ड रीकसलिएिशन एक्ट 1996 के प्रावधानों के अनुसार कम्पनी द्वारा नियुक्त एकल ऑर्बिटेटर के समक्ष सुनवाई के लिए प्रस्तुत किया जाएगा। आर्बिट्रेशन के तहत इस लेन देन (ट्रांज़ैक्शन) की जांच और सुनवाई करने का अधिकार केवल जयपुर के न्यायालयों को होगा।</br>
                    मैं आधार संख्या ................................. का धारक एतदद्वारा यूआईडीआई से सत्यापन के उद्देंश्यों से वैभव निधि इंडिया लिमिटेड को मेरी आधार नबंर, नाम और अंगुलियो/ आंखों की पुतिलयों के निशान लेने की सहमति देता/देती हूँ। वैभव निधि इंडिया लिमिटेड ने मुझे सुचित किया है कि मेरी पहचान संबंधी जानकारी का उपयोग केवल ई केवाईसी के लिए किया जाएगा ओर मुझे यह सूचित किया है कि मेरी बायोमैट्रिक को स्टोर/ शेयर नही किया जाएगा ओर केवल सत्यापन के उदेश्य से सीआईडीआर को भेजा जाएगां।</li>
                </ol>
                <div class="date_left billed_section"><span>तिथि:</span> <em><?php echo date('d-M-Y', strtotime($loan_date)); ?></em></div>
                <div class="sign_right"><span class="sign_customer">ऋणी के हस्ताक्षर</span><br><br>
            </div>
            <div class="loan_grid">          
                <div class="table-responsive">            
                    <table class="table">
                        <tr>
                        <td class="branch_manager">
                        <h3>प्रमाण-पत्र</h3>
                        ऋण की सिक्यूरिटी के तोर पर रखे आभूषण की शुद्धता (निवल वजन) मे लगभग 22 कैरेट आंकी गई है। यह आकलन केवल ऋण की मान्य राशि और नीलामी की आरक्षित राशि के निर्धारण मात्र के उदेश्य से ऋणी द्वारा दिए गए प्रमाणों/ घोषणाओं पर आधारित है। इस प्रमाण के आधार पर सोने की शुद्धता के प्रति कम्पनी की कोई जिम्मेदारी नही है।
                            <span class="sign_customer">शाखा प्रबंधक के हस्ताक्षर</span>
                        </td>                        
                        </tr>
                        <tr>
                        <td class="debtor_section">
                        <h3>एक्नाॅलेजमेंट (ऋण खाता को बंद करने के समय)</h3>
                        मैने इस मंजूरी पत्र का डुप्लीकेट (टोकन) सौंप कर मेरे उल्लिखित ऋण के विरूद्ध बतौर कोलेटरल सिक्यूरिटी रखे आभुषण (आभुषणों) वापस मिल गया है/ गये हैं।<br><br>
                            <div class="date_left billed_section"><span>तिथि:</span> <em><?php echo date('d-M-Y', strtotime($loan_date)); ?></em></div>
                            <div class="sign_right"><span class="sign_customer">ऋणी के हस्ताक्षर</span>
                        </td>
                        </tr>               
                    </table>
                </div>
            </div>
        </div>
        <div class="row no-print">
          <div class="col-xs-12 text-center">
              <button type="button" class="invoice_print_btn" onclick="myPrint()">
                <i class="fa fa-print"></i> Print
              </button>
          </div>
        </div>
    </section>
  </div>
  <div class="clearfix"></div>
</div>
<!-- ./wrapper -->
</body>
<script>
function myPrint() {
    window.print();
}
</script>
</html>