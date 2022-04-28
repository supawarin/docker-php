<?php

require_once 'FPDF/fpdf.php';
require_once 'connection.php';
$sql = "SELECT * FROM events";
$data = mysqli_query($conn,$sql);




if(isset($_POST['btn_pdf']))
{
    

    $pdf = new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','11');
    $pdf->AddPage();
    //$pdf->cell(80,20,'Timesheet',1,1,'C');
    $pdf->Image('img/ts.png',80,10,50);
   
    
    $pdf->Ln(15);//Line break

    $pdf->cell('10','10','week','1','0','C');
    $pdf->cell('25','10','title','1','0','C');
    $pdf->cell('30','10','employee','1','0','C');
    $pdf->cell('40','10','description','1','0','C');
    $pdf->cell('35','10','start','1','0','C');
    $pdf->cell('35','10','end','1','0','C');
    $pdf->cell('15','10','hours','1','1','C');


    


    $pdf->SetFont('arial','','10');
    $date=date("W");
    while($row = mysqli_fetch_assoc($data))
    {
        $pdf->cell('10','10', $date,'1','0','C');
                             
    $pdf->cell('25','10',$row["title"],'1','0','C');
    $pdf->cell('30','10',$row["employee"],'1','0','C');
    $pdf->cell('40','10',$row["description"],'1','0','C');
    $pdf->cell('35','10',$row["start_event"],'1','0','C');
    $pdf->cell('35','10',$row["end_event"],'1','0','C');
    $pdf->cell('15','10',$row["hours"],'1','1','C');
    }
    

    
    $pdf->Output();

    
}





?>