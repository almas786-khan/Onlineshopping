<!--
this is php Page to show receiptPrint
Created By: Almas khan
Created on: August 8, 2016-->

<?php

    echo '<link href="style.css" rel="stylesheet">';

	$name = $_POST["name"];                          //for name
	$email = $_POST["email"];                        //for email
	$address = $_POST["address"];					 //for address
	$city = $_POST["city"];							 //for city
	$pCode = $_POST["pCode"];						 //for postal code
	$sunglassQuantity =$_POST["sunglassQuantity"];	//for sunglass quantity
	$bagQuantity=$_POST["bagQuantity"];				 //for bag quantity
	$sunglassCharge=10 * $sunglassQuantity;			//for Sunglass charge multiplied its quantity with cost
	$bagCharge=20 * $bagQuantity;	                 //for bag charge multiplied its quantity with cost
	$totalCharge=0;	                               
	$amount = 0;									 //for total price of Bag and Sunglass with tax
	$finalAmount=0;									 //for final amount with charge and shipping cost
	$totalTax= 0;		                           //for total tax 
	$selectedProvince = $_POST["provinceRadio"];
			
// Array of provinces with their tax rate
	$provinceTaxArray = array("Alberta" => 0.13, "British Columbia" => 0.4, "Manitoba" => 0.5 , "New Brunswick" => 0.6, "Newfoundland" => 0.6, "Northwest Territories" => 0.7, "Nova Scotia" => 0.10 , "Nunavut" => 0.8, "Ontario" => 0.13 , "Quebec" => 0.9, "Saskatchewan" => 0.8, "Yukon" => 0.7);
	$tax = $provinceTaxArray[$selectedProvince];
	
// Validations

	if ($name == null || $name== "")
	{
		print"Please enter your name<br>";
	}
	if ($email == null || $email== "")
	{
		print"Please enter your email<br>";
	}
	if ($address == null || $address== "")
	{
		print"Please enter your address<br>";
	}
	if ($city == null || $city== "")
	{
		print"Please enter your city<br>";
	}
	if ($pCode == null || $pCode== "")
	{
		print"Please enter your name<br>";
	}
	if($bagQuantity == null && $sunglassQuantity == null)
	{
		print"Please enter quantity in one of the products<br>";
	}
	if($bagQuantity == "" && $sunglassQuantity =="")
	{
		print"Please enter quantity in one of the products<br>";
	}
	else
	{	
		$totalCharge = $bagCharge + $sunglassCharge;
		$totalTax = $totalCharge * $tax;
		$amount = $totalTax + $totalCharge;
		if($amount==0 && $amount <=25)
			{
					$finalAmount = $amount + 3;
					$deliveryCharge=3;
					$days= 1;
					receiptPrint($name, $address, $city, $selectedProvince, $pCode, $totalTax, $finalAmount, $deliveryCharge, $days, $bagQuantity, $sunglassQuantity, $totalCharge);
			}
		else if($amount>= 25.01 && $amount <=50)
			{
					$finalAmount = $amount + 4;
					$deliveryCharge=4;
					$days= 1;
					receiptPrint($name, $address, $city, $selectedProvince, $pCode, $totalTax, $finalAmount, $deliveryCharge, $days, $bagQuantity, $sunglassQuantity, $totalCharge);
				
			}
		else if($amount>=50.1 && $amount <=75)
			{
					$finalAmount = $amount + 5;
					$deliveryCharge=5;
					$days= 3;
					receiptPrint($name, $address, $city, $selectedProvince, $pCode, $totalTax, $finalAmount, $deliveryCharge, $days, $bagQuantity, $sunglassQuantity, $totalCharge);
			}
		else
			{
					$finalAmount = $amount + 6;
					$deliveryCharge=6;
					$days= 4;
					receiptPrint($name, $address, $city, $selectedProvince, $pCode, $totalTax, $finalAmount, $deliveryCharge, $days, $bagQuantity, $sunglassQuantity, $totalCharge);
			}
	}

	// Function to print receipt with order details
	
	function receiptPrint($name, $address, $city, $selectedProvince, $pCode, $totalTax, $finalAmount, $deliveryCharge, $days, $bagQuantity, $sunglassQuantity, $totalCharge)
		{
			print "<b>Shipping To:</b> $name<br> $address<br> $city, $selectedProvince<br> $pCode<br>";
			print"<b>Your Order is Processed. Please verify the information<br></b>";
			print "<b>Order Information:</b>";
			print " $sunglassQuantity Sunglass at $10.00 each<br> $bagQuantity Bag at $20.00 each<br> Cost of your order = $$totalCharge <br>Tax = $$totalTax<br> Delivery charge = $$deliveryCharge <br> Total Cost of your Order = $$finalAmount <br> 
						You will receive your order in $days days.";
		}
	
?>