<?php
ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
include('connection.php');

//$result = mysqli_query($conn, $sql);
$itemsHTML = '';

$sql = "SELECT * FROM events WHERE employee LIKE 'Supaporn'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{

$itemsHTML .= '<tr><td>'.date("W", strtotime($row['end_event'])).'</td>
<td>'.$row['title'].'</td>
<td>'.$row['description'].'</td>
<td> '.$row['start_event'].'</td>
<td>'.$row['end_event'].' </td>
<td> '.$row['hours'].'</td>
</tr>';   
}

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 12,
	'default_font' => 'Arial'
]);

$nokhtml = '

<style>
body {
	font-family: Arial;
	font-size: 14px;
	padding :0; margin: 0;
}

.col1, .col2, .col3, .col4, .col5, .col6{
	float:left;
	width:40%
}
h1, h2, h3, h4, h5, h6 {
padding: 0;
margin : 0;
}

.floatleft{
	float:left;
}

.floatright{
	float:right;
}
table {
	font-family: Arial;
	border-collapse: collapse;
	width: 100%;
  }
  
  th ,td{
    border-bottom: 2px solid #f5f5f5;
    text-align: center;
	padding: 8px;
  }

img{
    padding-right:10px;
}
</style>



<body>
<div class="row">
<div class="col1 ">
<img src="img/ts.png" width="240" />
</div>
<div class="col2 floatright">
<h4>Supaporn Chongwarin <br /> 617 m.10 Detudom<br />Ubonratchatany,34160 <br />Tel: 087 6547219<br />Email: supawarin8@gmail.com</h4>
</div>
</div>
<hr>



<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #333333; font-size: 9pt; text-align: center; padding-top: 1mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />

<div class="row" style="background-color: #f5f5f5;">
<div class="col1" style="padding:15px;">
<h3>Customer :</h3>
<div class="name"><b> Name :...</b></div>
<div class="address"><b>Address....</b></div>
<div class="tel"><b>Tel: 000 000 0000</b></div>
<div class="email"><b>Email: customers@gmail.com</b></div>
</div>

<div class="col2 floatright" style="padding:15px;">
<div class="Employee"><h3>Employee : Supaporn </h3></div>
<div class="date"><h3>DATE : 25/04/2022</h3></div>
<div class="due date"><h3>DUE DATE :11/10/2021</h3></div>
<div class="project"><h3>PROJECT : Web Design</h3></div>
</div>
</div>

<hr>
<!-- INVOICE ITEMS HERE -->

<table class="items" style="magin: top 25px;">

<tr>
<td width="10%"><b>Week</b></td>
<td width="10%"><b>Title</b></td>
<td width="20%"><b>Description</b></td>
<td width="15%"><b>Start</b></td>
<td width="15%"><b>End</b></td>
<td width="15%"><b>Hours</b></td>
</tr>';

$nokhtml .= $itemsHTML; 

$nokhtml .= '<tr>
<td class="blanktotal" colspan="4" rowspan="6">
</td>
</tr>


<tr>
<td class="totals" style="background-color: #f5f5f5;"><b>Total hours:</b></td>
<td class="totals" style="background-color: #f5f5f5;"><b>00</b></td>
</tr>
<tr>
<td class="totals" style="background-color: #f5f5f5;"><b>Total Day:</b></td>
<td class="totals" style="background-color: #f5f5f5;"><b>00</b></td>
</tr>

</table>

  <!-- END ITEMS HERE -->

  ';

$termsHTML = '
<div class="tenthmatrixlogo">
<ximg src="/Volumes/GoogleDrive/.shortcut-targets-by-id/1-9_ANNWeOpmVIwN01qqEiImCs6RH8tks/WorkstationSolsGoogleDrive/Shared_TenthMatrix_CRM_DEV/Tenthmatrixv18/TENTHMATRIX_CRM_DATA/php_components/mpdf60/examples/mysignature.png" width="150" />
</div>
</p>
<br />
<h3><i>Thank you for your business.</i></h3>
<p>I certify that this claim is in all respects true, correct, supportable by available documentation, and in compliance with all the terms and
conditions, laws and regulations governing its payments.</p>



</div>
</body>';


//

$mpdf->WriteHTML($nokhtml . $termsHTML);


//

$mpdf->Output();


?>