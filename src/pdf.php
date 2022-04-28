<?php
ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
require_once 'connection.php';
//include('connection.php');


//$sql = "SELECT * FROM events";
$sql = "SELECT * FROM events WHERE employee LIKE 'Supaporn'";

$result = $conn->query($sql);
$today = date(" j / M / Y ");
$dm= date("F / Y");
$date=date("W");



$htmlheader = '<bookmark content="Start of the Document" /><div class="row">

<div class="col1 ">
<img src="img/ts.png" width="240" />
</div>
<div class="col2 floatright">
<h4>Supaporn Chongwarin <br /> 617 m.10 Detudom<br />Ubonratchatany,34160 <br />Tel: 087 6547219<br />Email: supawarin8@gmail.com</h4>
</div>
</div>

<div class="row" style="border: 1px solid #00a9d3; padding: 12px;">
<div class="col1">

<p>Customer :name customer</p>

<p>ADDRESS : Thai</p>
<p>TEL : 000 000 0000</p>
<p>EMAIL : customer@gmail.com</p>
</div>

<div class="col2 floatright">
<p>Employee: Supaporn Chongwarin</p>
<p>Timesheet date : '.$today.'</p>
<p>Timesheet Period : '.$dm.'</p>
<p>Project : Bookkeeping</p>
</div>
</div><br />

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>
<sethtmlpagefooter name="myfooter" value="on" />

<style>
.col1, .col2 {
	float:left;
	width:40%
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
</style>';

$html = '';

$html .= '

<table class="items">
  <thead >
  <tr style="background-color: #f5f5f5;">
<td width="10%"><b>Week</b></td>
<td width="10%"><b>Title</b></td>
<td width="20%"><b>Description</b></td>
<td width="15%"><b>Start</b></td>
<td width="15%"><b>End</b></td>
<td width="15%"><b>Hours</b></td>
</tr>
  </thead>';

  if (mysqli_num_rows($result) > 0){

    while ($row = mysqli_fetch_assoc($result) ){

      $html .='<tbody>

    <tr>
      <td width="10%">'.$date.'</td>
      <td width="10%">'.$row['title'].'</td>
      <td width="20%">'.$row['description'].'</td>
      <td width="15%">'.$row['start_event'].'</td>
      <td width="15%">'.$row['end_event'].'</td>
      <td width="15%">'.$row['hours'].'</td>
     
    </tr>
    

    

    
  </tbody>';
    }
  }else{
    $html = "No record found";
  }
  
  $html .='<tr>
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
</tr>';
 

 $html .="</table>" ;
  
   
 
 
 
  

   
                           
 
  
 

  



  

  

  
  








// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$mpdf->WriteHTML($htmlheader);
$mpdf->WriteHTML($html );
// Output a PDF file directly to the browser
$mpdf->Output();


?>