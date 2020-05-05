<?php

include_once("header.php");

if(!isset($_SESSION["LoggedIn"])){
		header("Location: login.php");
	}

?>
<?php

$allbills = scandir("db/bill/");
	$countAllbills = count($allbills);
	

	for($counter = 0; $counter < $countAllbills; $counter++) {
		if($allbills[$counter] !=="." && $allbills[$counter] !==".."){

				$currentbill = $allbills[$counter];

			$bills = file("db/bill/".$currentbill);

//print_r($bills) ;

//echo $users;'

foreach ($bills as $bills_file => $bill) {


echo "<table>
<tr>
<th>TRANSACTION HISTORY</th>
</tr>";


	echo '<tr>
	<td>'.$bill.'</td>

	</tr>';
	
}
echo "</table>";      

}
	



}
?>
<?php include_once("footer.php"); ?>