<?php

foreach ($customer as $key => $value) {
	$reserve_id = $value->id;
	$reservation_code = $value->reservation_code;
	$reservation_date = $value->reservation_date ;
	$customerid = $value->customerid ;
	$depart_date = $value->depart_date ;
	$seat_code = $value->seat_code ;
	$price = $value->price ;
	$ruteid = $value->ruteid ;

	$identity_card_no = $value->identity_card_no;
	$name = $value->name;
	$address = $value->address;

	$rute_from = $value->rute_from;
	$rute_to = $value->rute_to;
	$depart = $value->depart;
	$arrive = $value->arrive;



}

	 $getRuteAliases2 = \App\TransactionModel::getRuteFromAliases($rute_from,$title);
     $getRuteAliases3 = \App\TransactionModel::getRuteFromAliases($rute_to,$title);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TICKET</title>
</head>
<body onload="window.print()">
	<table class="table table-bordered">
		<tr>
			<th colspan="7">TICKET MASTAH
				<br/>
				TRAINS AND AIRPLANES TICKET
			</th>	
		</tr>
		<tr>
			<td colspan="7"><center>BOOKING TICKET</center></td>
		</tr>
		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>

		<tr>
			<td>Reservation Date :</td>
			<td><b><?php echo $reserve_id ?></b></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>Depart Date :</td>
			<td><b><?php echo $depart_date ?></b></td>
		</tr>

		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>
		
		<tr>
			<td>ID Customer :</td>
			<td><b><?php echo $customerid ?></b></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>ID Reserve :</td>
			<td><?php echo $reserve_id ?></td>
		</tr>
		<tr>
			<td>Identity Card ID :</td>
			<td><b><?php echo $identity_card_no ?></b></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>Reservation Code :</td>
			<td><?php echo $reservation_code ?></td>
		</tr>
		<tr>
			<td>Name :</td>
			<td><b><?php echo $name ?></b></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>Seat Code :</td>
			<td><b><?php echo $seat_code ?></b></td>
		</tr>
		<tr>
			<td>Address :</td>
			<td><b><?php echo $address ?></b></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>

		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>

		<tr>
			<td>Rute From :</td>
			<td><b><?php echo $getRuteAliases2; ?></b></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>Rute To :</td>
			<td><b><?php echo $getRuteAliases3?></b></td>
		</tr>

		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>

		<tr>
			<td>Time Depart :</td>
			<td><b><?php echo $depart ?></b></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>Time Arrive :</td>
			<td><b><?php echo $arrive ?></b></td>
		</tr>

		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>

		<tr>
			<td colspan="7"><hr></td>
		</tr>

		<tr>
			<td>Price</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td id="showedThing">Rp. <?php echo $price ?></td>
		</tr>
		


	</table>
</body>


</html>