<?php session_start();
 
if (isset($_POST["paybill"])) {


$first_name = $_POST["first_name"] != "" ? $_POST['first_name'] : $errorCount++;
$last_name = $_POST["last_name"] != "" ? $_POST['last_name'] : $errorCount++;
$email = $_POST["email"] != "" ? $_POST['email'] : $errorCount++;
$bill = $_POST["bill"] != "" ? $_POST['bill'] : $errorCount++;

$_SESSION["first_name"] = $first_name;
$_SESSION["last_name"] = $last_name;
$_SESSION["email"] = $email;
$_SESSION["bill"] = $bill;



if ($errorCount > 0) {
  //Display proper messages to the user
  //Give more accurate feedback to the user
   $_SESSION["error"] = "You have " . $errorCount . " errors in your form submission";
   header("Location: bill.php");
}else{

  




  $userObject =[
    'first_name'=>$first_name,
    'last_name'=>$last_name,
    'email'=>$email,
    'bill'=>$bill,


  ];

  file_put_contents("db/bill/".$email . ".json", json_encode($userObject));




$refno = "";

			$alphabets = ['a','b','c','d','e','f','g','h','A','B','C','D','E','F','G','H'];

			for($i = 0 ; $i < 26 ; $i++){

			$index = mt_rand(0,count($alphabets)-1);	
			$refno .= $alphabets[$index];
		}

//Bill payment process


$curl = curl_init();

$customer_email = $email;
$amount = $bill;  
$currency = "NGN";
$txref = $refno ; // ensure you generate unique references per transaction.
$PBFPubKey = "FLWPUBK_TEST-dd6f527bf0969d97d7252d3b0c3ab056-X"; // get your public key from the dashboard.
$redirect_url = "https://localhost/SNHV3/billsuccess.php";


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url,
  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// uncomment out this line if you want to redirect the user to the payment page
//print_r($transaction->data->message);


// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);


}
}
?>