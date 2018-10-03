<?php
session_start();

require('fpdf/fpdf.php');


include('fpdf/rotation.php');

$_GET['nro_orden'];


class PDF  extends PDF_Rotate
{

   function Header()
   {
   ///Logo
    $this->Image('../catalogo/img/logos/PNG/logo-pdf.png',10,1,70,30);
    $this->SetFont('ARIAL','B',10);
    $this->MultiCell(180,5,'COMPROBANTE DE COMPRA',0,'C');
    $this->Ln(30);

    include('../catalogo/conexion.php');

    $this->SetX(15);
    $sta=mysqli_query($conexion,"SELECT tienda_compras.`status` FROM
tienda_compras WHERE nro_orden='$_GET[nro_orden]'");
    $dat=mysqli_fetch_array($sta);
    if($dat['status']=='1'){
      $this->SetFont('Arial','B',90);
      $this->SetTextColor(222,222,222);
       $this->RotatedText(40,190,' PAGADO',40);
     }else if($dat['status']=='2'){

      $this->SetFont('Arial','B',90);
      $this->SetTextColor(222,222,222);
       $this->RotatedText(40,190,'CANCELADA',40);
     }else if($dat['status']=='0'){

      $this->SetFont('Arial','B',90);
      $this->SetTextColor(222,222,222);
       $this->RotatedText(40,190,'EN ESPERA',40);
     }
  
   }

      function RotatedText($x, $y, $txt, $angle)
{
  //Text rotated around its origin
  $this->Rotate($angle,$x,$y);
  $this->Text($x,$y,$txt);
  $this->Rotate(0);
}
   //Pie de página
  function Footer()
    {  


         //Arial italic 8
        $this->SetY(-80);
      $this->SetFont('Arial','B',8);
      
      


        //Posición: a 2 cm del final
        $this->SetY(-10);
        $this->SetFont('Arial','B',8);
            $fecha=date("d/m/Y H:i:s");
        
        $this->Cell(160,5,'Surtimart.com.ve',0,'L');
        $this->Cell(70,5,$fecha,0,'C');
         $this->Ln();
        //Arial italic 8
        $this->SetFont('Arial','BI',8);
        //Número de página
      
        $this->Cell(180,4,'','T',0,'L');
        $this->Cell(1,4,'Página '.$this->PageNo().'','T',1,'R');
         }
      
 
   //Tabla coloreada
function TablaSimple($header)

{
  include('../catalogo/conexion.php');
$this->SetDrawColor(193,191,191);
$this->SetFillColor(224, 224, 224);

    $this->SetFont('ARIAL','B',10);
   $this->SetX(15);

    $this->Cell(90,5,'DATOS DEL CLIENTE',TB,0,'C',false);
    $this->Cell(100,5,'NRO DE ORDEN:',TB,0,'C',false);
    $this->Ln();
    $cli=mysqli_query($conexion,"SELECT
tienda_compras.ced,
tienda_compras.cliente_nombre,
tienda_compras.cliente_telefono,
tienda_compras.cliente_correo,
tienda_compras.cliente_ubicacion,
DATE_FORMAT(tienda_compras.fec_compra,'%d/%m/%y %h:%m:%s') as fecha,
tienda_compras.ip_compra
FROM
tienda_compras where nro_orden='$_GET[nro_orden]'");

$rows=mysqli_fetch_array($cli);
    $this->Cell(40,5,'Cédula de Identidad:',0,0,'L');
     $this->SetFont('ARIAL','',10);
    $this->Cell(60,5,$rows['ced'],0,0,'L');
    $this->SetFont('ARIAL','B',15);
    $this->Cell(110,5,'ORDEN #'.$_GET['nro_orden'],0,0,'C');//orden de compra
    $this->SetFont('ARIAL','',10);
    $this->Ln();
     $this->SetFont('ARIAL','B',10);
    $this->Cell(40,5,'Nombre y Apellido:',0,0,'L');
     $this->SetFont('ARIAL','',10);
    $this->Cell(70,5,strtoupper($rows['cliente_nombre']),0,0,'L');

     $this->Ln();
      $this->SetFont('ARIAL','B',10);
    $this->Cell(40,5,'Télefono:',0,0,'L');
     $this->SetFont('ARIAL','',10);
    $this->Cell(70,5,$rows['cliente_telefono'],0,0,'L');

      $this->Ln();
       $this->SetFont('ARIAL','B',10);
    $this->Cell(40,5,'Domicilio Fiscal:',0,0,'L');
    $this->Cell(70,5,'',0,0,'C');
    $this->Ln();
     $this->SetFont('ARIAL','',10);
    $this->MultiCell(40,5,strtoupper($rows['cliente_ubicacion']),0,'L');//direccion
    $this->Ln();
       $this->SetFont('ARIAL','B',10);
    $this->Cell(40,5,'Fecha de Compra:',0,0,'L');
    $this->Cell(70,5,$rows['fecha'],0,0,'L');
       $this->SetFont('ARIAL','B',10);
    $this->Ln(10);
    $this->SetX(15);
     $this->SetFont('ARIAL','B',10);
    $this->Cell(190,5,'PRODUCTOS DE LA COMPRA:',TB,0,'C',false);
     $this->SetFont('ARIAL','',10);
    $this->Ln();
    $this->SetX(15);
    $this->SetFont('ARIAL','',10);
    $this->Cell(10,5,'Items',0,0,'C',true);
    $this->Cell(120,5,'Nombre de Producto',0,0,'C',true);
    $this->Cell(20,5,'Cantidad',0,0,'C',true);
    $this->Cell(20,5,'Precio',0,0,'C',true);
    $this->Cell(20,5,'Sub-Total',0,0,'C',true);
    $this->Ln();

    $art=mysqli_query($conexion,"SELECT
   tienda_productos.nombre,
   tienda_compras_productos.cantidad,
   tienda_compras_productos.costo
   FROM
   tienda_compras_productos
   INNER JOIN tienda_productos ON tienda_compras_productos.id_producto = tienda_productos.id_producto
    WHERE nro_orden='$_GET[nro_orden]'");
      $cont=0;
      while($fr=mysqli_fetch_array($art)){
    $cont=$cont+1;
    $this->SetX(15);
    $this->Cell(10,5,$cont,LRTB,L,'L',false);
    $this->Cell(120,5,$fr['nombre'],LRTB,L,'L',false);
    $this->Cell(20,5,$fr['cantidad'],LRTB,L,'L',false);
    $this->Cell(20,5,number_format($fr['costo'],2,',','.'),LRTB,L,'L',false);
    $this->Cell(20,5,number_format($fr['cantidad']*$fr['costo'],2,',','.'),RLTB,L,'L',false);
    $this->Ln();
    $sum=$sum+($fr['cantidad']*$fr['costo']);



       }
  $this->SetX(15);
$this->Cell(150,5,'',LRTB,L,'L',false);
$this->Cell(20,5,'Total:',LRTB,L,'L',false);
$this->Cell(20,5,number_format($sum,2,',','.'),LRTB,L,'L',false);






  
  


}
}
$pdf=new PDF('P', 'mm', 'letter');
//Títulos de las columnas
$header=array('');
$pdf->AliasNbPages();
$pdf->SetLeftMargin(20);
$pdf->SetRightMargin(20);
//Primera página
//$pdf->AddPage();

$pdf->AddPage();
//$pdf->TablaSimple($header);
$pdf->TablaSimple($header);
$pdf->Output();
?> 
