<?php
$name = $_POST["name"];
$procedure = $_POST["procedure"];
$num_appointments = $_POST["num-appointments"];
$cost = $_POST["cost"];
$tax = $_POST["tax"];

function calcTotalCost($num_appts, $proc_cost, $tax_rate){
	$total_cost = ($num_appts * $proc_cost);
	return $total_cost + ($total_cost * ($tax_rate / 100));
}

$final_cost = calcTotalCost($num_appointments, $cost, $tax);

echo "<strong>${name}</strong>, you have <strong>${num_appointments}</strong> appointments for the following procedure: 
	<strong>${procedure}</strong> at the price of <strong>$${cost}</strong> per visit, with a tax rate of <strong>${tax}%</strong>. 
	The total cost including tax is <strong>$${final_cost}</strong>.";
?>
