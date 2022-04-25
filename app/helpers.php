<?php
  
function changeDateFormat($date,$date_format){

	 
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
 
}

function dateformatman($date){

	 


	return ($date==null) ? null :  \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');    	

}

function dateformatmonth($date){

	 


	return ($date==null) ? null :  \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('M-Y');    	

}


function dateformatpc($date){

	 
 


    	return ($date==null) ? null :  \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d'); 
   
 
}


// $check =  check_role($_SESSION['campus_id'],$_SESSION['user_role_id'],'Department','Create');
// if($check!='Y') {
// $url= $_SERVER['HTTP_REFERER']; 
// echo "Access Denied";
// exit();
// }


function check_role($UserID,$BranchID,$TableName,$Action)
{

		$check = DB::table('user_role')->where('UserID',$UserID)
										->where('BranchID',$BranchID)
										->where('Table',$TableName)
										->where('Action',$Action)
 										->get();

		 
			 return $check;
		 								
}

function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'KB', 'MB', 'GB', 'TB');   

    return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
}



function productImagePath($image_name)
{
    return public_path('images/products/'.$image_name);
}

function test()
{
	return 'hello';
}

function yarr() {
  return 'yarr';
}



function agent($client,$amount,$basic)
{

	if(($client==1) &&($client>0))
	{
		$comission1 = 100;
	}
	elseif ($client==2) {
		$comission1 = 200;	
	}
	elseif ($client==3) {
		$comission1 = 400;		
	}
	elseif ($client==4) {
		$comission1 = 500;	
	}
	elseif ($client==5) {
		$comission1 = 700;	
	}
	elseif ($client==6) {
		$comission1 = 900;	
	}
	elseif ($client==7) {
		$comission1 = 1100;	
	}
	elseif ($client==8) {
		$comission1 = 1300;	
	}
	elseif ($client==9) {
		$comission1 = 1500;	
	}
	elseif ($client==10) {
		$comission1 = 1800;	
	}
	elseif ($client>=11) {
		$comission1=(12*200)-200;
	}
	else{
		
		$comission1=0;
	}



	if(($client>=3) &&($client<=4))
	{
		$comission2=200;
	}
	elseif (($client>=5) &&($client<=6)) {
		$comission2=300;
	}
	elseif (($client>=7) &&($client<=8)) {
		$comission2=400;
	}
	elseif (($client>=9) &&($client<=10)) {
		$comission2=600;
	}
	elseif ($client>=11)  {
		$comission2=1000;
	}
	else{
		
		$comission2=0;
	}

	if($amount<=10000)
	{
		$comission3=$amount*0.02;
	}
	elseif ($amount>=10001) {
		$comission3=$amount*0.03;	
	}
 		
 		$data = array (

 			'comission1' => $comission1,
 			'comission2' => $comission2,
 			'comission3' => $comission3 * 3.6731,
 			'grand'=>($comission1+$comission2+($comission3*3.6731)+$basic),
 			);

	// $total = ($comission1+$comission2+($comission3*3.6731));
	return ($data);




}


function closeri($client,$amount,$basic)
{

	$comission1=0;	
	$comission2=0;	
	$comission3=0;	
	$comission4=0;	
	if(($client<=5) &&($client>=3))
	{
		$comission1=0.03 * $amount;
	}
	elseif (($client<=9) &&($client>=6)) {
		$comission1=0.05 * $amount;
	}
	elseif (($client<=12) &&($client>=10)) {
		$comission1=0.06 * $amount;
	}
	elseif (($client<=15) &&($client>=13)) {
		$comission1=0.07 * $amount;
	}
	elseif (($client<=19) &&($client>=16)) {
		$comission1=0.08 * $amount;
	}
	elseif ($client>=20)  {
		$comission1=0.1 * $amount;
	}
	

	if(($client<=5) &&($client>=3))
	{
		$comission2=10 * $client;
	}
	elseif (($client<=9) &&($client>=6)) {
		$comission2=13 * $client;
	}
	elseif (($client<=12) &&($client>=10)) {
		$comission2=15 * $client;
	}
	elseif (($client<=15) &&($client>=13)) {
		$comission2=20 * $client;
	}
	elseif (($client<=19) &&($client>=16)) {
		$comission2=30 * $client;
	}
	elseif ($client>=20)  {
		$comission2=35 * $client;
	}
	
	 

	if(($client>=6) &&($client<=7))
	{
		$comission3=50;
	}
	elseif (($client>=8) &&($client<=9)) {
		$comission3=60;
	}
	elseif (($client>=10) &&($client<=12)) {
		$comission3=75;
	}
	elseif (($client>=13) &&($client<=14)) {
		$comission3=125;
	}
	elseif (($client>=15) &&($client<=17)) {
		$comission3=150;
	}
	elseif (($client>=18) &&($client<=19)) {
		$comission3=200;
	}
	elseif ($client>=20)  {
		$comission3=250;
	}
	



	if(($amount>=5000) &&($amount<=7499))
	{
		$comission4=75;
	}
	elseif (($amount>=7500) &&($amount<=9999)) {
		$comission4=150;
	 }
	elseif ($amount>10000)  {
		$comission4=200;
	}

 

		$data = array (

 			'comission1' => $comission1 ,
 			'comission2' => $comission2 ,
 			'comission3' => $comission2 ,
 			'comission4' => $comission4 ,
 			'grand' =>  ((($comission1+$comission2+$comission3+$comission4) * 3.67 )+ $basic)
 			);

 
	// $total = ($comission1+$comission2+($comission3*3.6731));
	return ($data);



}

function noel($client,$amount,$basic)
{

	$comission1=0;
	$comission2=0;
		if(($client>=0) &&($client<=9))
	{
		$comission1=0.03 * $amount;
	}
	elseif (($client>=10) &&($client<=19)) {
		$comission1=0.05 * $amount;
	}
	elseif (($client>=20) &&($client<=29)) {
		$comission1=0.06 * $amount;
	}
	elseif (($client>=30) &&($client<=39)) {
		$comission1=0.07 * $amount;
	}
	elseif (($client>=40) &&($client<=49)) {
		$comission1=0.08 * $amount;
	}
	elseif ($client>=50)  {
		$comission1=0.1 * $amount;
	}
	


	if($client<=10) 
	{
		$comission2=300;
	}
	elseif (($client>=15) &&($client<=24)) {
		$comission2=500;
	}
	elseif (($client>=25) &&($client<=29)) {
		$comission2=1000;
	}
	elseif (($client>=30) &&($client<=34)) {
		$comission2=1300;
	}
	elseif (($client>=35) &&($client<=44)) {
		$comission2=1500;
	}
	elseif (($client>=45) &&($client<=49)) {
		$comission2=2000;
	}
	elseif (($client>=50) &&($client<=55)) {
		$comission2=2500;
	}
	elseif (($client>=56) &&($client<=60)) {
		$comission2=3500;
	}
	elseif (($client>=61) &&($client<=65)) {
		$comission2=4000;
	}
	elseif (($client>=66) &&($client<=71)) {
		$comission2=5000;
	}
	elseif (($client>=72) &&($client<=80)) {
		$comission2=6000;
	}
	elseif (($client>=81) &&($client<=71)) {
		$comission2=7000;
	}
	elseif (($client>=92) &&($client<=100)) {
		$comission2=10000;
	}

	$comission2 = $comission2*0.272253;
	$tot= ($comission1+$comission2)+817;
 
	 
	$USD=$tot;
	$EUR = $tot*0.84137;
	$RON = $tot*4.40669;
	$AED = $tot*3.6732;
	$grand = $AED;

	
	 
	$data = array (

 			'comission1' => round( $comission1,2) ,
 			'comission2' => round($comission2,2) ,
 			'USD' => round($USD) ,
 			'EUR' => round($EUR),
 			'RON' => round($RON) ,
 			'AED' => round($AED) ,
  			'grand' =>  round($grand)
 			);

	 
return ($data);
}


function eu($no,$sum,$netdeposit,$ftd,$per,$total)
{


$comission1=0;
	if($no<=5 && $no>=0)
	{
		$comission1=$sum*0.03;
	}
	elseif ($no>=6 && $no <=10) {
		
		$comission1=$sum*0.05;

	}
	elseif ($no>=11 && $no <=15) {
		
		$comission1=$sum*0.06;

	}
	elseif ($no>=16 && $no <=20) {
		
		$comission1=$sum*0.07;

	}
	elseif ($no>=21 && $no <=25) {
		
		$comission1=$sum*0.08;

	}
	elseif ($no>=26 ) {
		
		$comission1=$sum*0.1;

	}

/////////////////////
	if($no<=3 && $no>=2)
	{
		$comission2=100*0.272253;
	}
	elseif ($no==4) {
		
		$comission2=300*0.272253;

	}
	elseif ($no==5) {
		
		$comission2=500*0.272253;

	}
	elseif ($no>=6 && $no <=7) {
		
		$comission2=700*0.272253;
	}
	elseif ($no>=8 && $no <=9) {
		
		$comission2=900*0.272253;

	}
	elseif ($no>=10 && $no <=11) {
		
		$comission2=1100*0.272253;

	}
	elseif ($no>=12 ) {
		
		$comission2=1300*0.272253;

	}


////////////////

	if($netdeposit<=25000 && $no>=10)
	{
		$comission3=$netdeposit*0.005;

	}
	elseif ($netdeposit>25000 && $netdeposit<50000 && $no>=10) {
		$comission3=$netdeposit*0.0075;
	}
	elseif ($netdeposit>=50000 && $netdeposit<100000 && $no>=10) {
		$comission3=$netdeposit*0.01;
	}
	elseif ($netdeposit>=100000 && $netdeposit<150000 && $no>=10) {
		$comission3=$netdeposit*0.0125;
	}
	elseif ($netdeposit>=150000 && $netdeposit<250000 && $no>=10) {
		$comission3=$netdeposit*0.015;
	}
	elseif ($netdeposit>=250000 && $no>=10) {
		$comission3=$netdeposit*0.02;
	}



	$tot= ($comission1+$comission2)+$comission3;
 
	 
	$USD=$tot+3089;
	$EUR = $USD*0.82825;
	$RON = $USD*4.0822;
	$AED = $USD*3.6703;
	$grand = $AED-3000;


$data = array (

 			'comission1' => round( $comission1,2) ,
 			'comission2' => round($comission2,2) ,
 			'comission3' => round($comission3,2) ,
 			'USD' => round($USD) ,
 			'EUR' => round($EUR),
 			'RON' => round($RON) ,
 			'AED' => round($AED) ,
  			'grand' =>  round($grand)
 			);

	 
return ($data);

  



}


function supervisor_name($SupervisorID)
{	
 	if($SupervisorID>0)
 	{
	$supervisor_name = DB::table('employee')->where('EmployeeID',$SupervisorID)->get();
	return ($supervisor_name[0]->FirstName .' '. $supervisor_name[0]->MiddleName .' '. $supervisor_name[0]->LastName);
	}
	else
	{
		return ('No Supervisor');
	}

}