<?php
    session_start();
	# Incluyendo librerias necesarias #
	require "./code128.php";
    include("../dashboard/src/html/conexion_database.php");
    $id_ven = $_SESSION['id_ven'];
    $sql = "SELECT * FROM TFactura WHERE id_ven='$id_ven'";
    
    $resultado = $conexion->query($sql);
    $fila = '';
    if ($resultado) {
        // Si la consulta devolvió resultados, obtener la primera fila directamente
        $fila = $resultado->fetch_assoc();
    }

	$pdf = new PDF_Code128('P','mm','Letter');
	$pdf->SetMargins(17,17,17);
	$pdf->AddPage();

	# Logo de la empresa formato png #
	$pdf->Image('./img/logo07.png',165,12,35,35,'PNG');

	# Encabezado y datos de la empresa #
	$pdf->SetFont('Arial','B',16);
	$pdf->SetTextColor(32,100,210);
	$pdf->Cell(150,10,utf8_decode(strtoupper("Extreme Games")),0,0,'L');

	$pdf->Ln(9);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
    $rfc=$fila['rfc_fact'];
	$pdf->Cell(150,9,utf8_decode("RFC: "."$rfc"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode($fila['ciudad_fact']." ".$fila['calle_fact']." ".$fila['colonia_fact']),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode($fila['telefono_fact']),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Email: ".$fila['email_fact']),0,0,'L');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,7,utf8_decode("Fecha de emisión:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(116,7,utf8_decode(date("d/m/Y", strtotime("15-08-2023"))." ".date("h:i A")),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(35,7,utf8_decode(strtoupper("Factura Nro.".$fila['id_fact'])),0,0,'C');

	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);	
	$pdf->SetTextColor(97,97,97);	
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(97,97,97);	

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,utf8_decode("Cliente:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode($fila['nom_fact']),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(8,7,utf8_decode("RFC:  "),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode($fila['rfc_fact']),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(7,7,utf8_decode("Tel:"),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode($fila['telefono_fact']),0,0);
	$pdf->SetTextColor(39,39,51);

	$pdf->Ln(7);

	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(6,7,utf8_decode("Dir:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(109,7,utf8_decode("Fray junipero cerra, Querétaro"),0,0);

	$pdf->Ln(9);

	# Tabla de productos #
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(23,83,201);
	$pdf->SetDrawColor(23,83,201);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(90,8,utf8_decode("Descripción"),1,0,'C',true);
	$pdf->Cell(15,8,utf8_decode("Cant."),1,0,'C',true);
	$pdf->Cell(25,8,utf8_decode("Precio"),1,0,'C',true);
	$pdf->Cell(19,8,utf8_decode("Desc."),1,0,'C',true);
	$pdf->Cell(32,8,utf8_decode("Subtotal"),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);


	$usuario = $_SESSION['id_Usuario'];
	$consulta = "SELECT * FROM tdet_ven JOIN tproductos ON tdet_ven.id_prod = tproductos.id_prod WHERE usuario = '$usuario'";
	$resultado = $conexion->query($consulta);

	/*----------  Detalles de la tabla  ----------*/
	while ($fila = $resultado->fetch_assoc()) {
		$pdf->Cell(90,7,utf8_decode($fila['nombre_Prod']),'L',0,'C');
		$pdf->Cell(15,7,utf8_decode($fila['cantidad_venta']),'L',0,'C');
		$pdf->Cell(25,7,utf8_decode($fila['precio_Uni']),'L',0,'C');
		$pdf->Cell(19,7,utf8_decode("$0.00 MXN"),'L',0,'C');
		$pdf->Cell(32,7,utf8_decode($fila['subtotal']." MXN"),'LR',0,'C');
		$pdf->Ln(7);
	}
	/*----------  Fin Detalles de la tabla  ----------*/


	$subtotal=0;
	$pdf->SetFont('Arial','B',9);	
	$consulta = "SELECT ROUND(SUM(subtotal), 2) AS total FROM tdet_ven WHERE usuario='$usuario'";
	$resultado = $conexion->query($consulta);                                        
	  if($resultado->num_rows>0){
		$fila=$resultado->fetch_assoc(); 
		$subtotal = $fila['total'];                                           
	  }
	  
	# Impuestos & totales #
	$pdf->Cell(100,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(32,7,utf8_decode("SUBTOTAL"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode($subtotal." MXN"),'T',0,'C');

	$pdf->Ln(7);
	$consulta = "SELECT ROUND(SUM(total), 2) AS total FROM tdet_ven WHERE usuario='$usuario'";
	$resultado = $conexion->query($consulta);  
	$total='';                                      
	if($resultado->num_rows>0){
		$fila=$resultado->fetch_assoc(); 
		$total = $fila['total'];                                           
	}
	$iva=0;
	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("IVA (16%)"),'',0,'C');
	$pdf->Cell(34,7,utf8_decode($iva=$subtotal*0.16." MXN"),'',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	

	$pdf->Cell(32,7,utf8_decode("TOTAL A PAGAR"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode($total." MXN"),'T',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("TOTAL PAGADO"),'',0,'C');
	$pdf->Cell(34,7,utf8_decode($total." MXN"),'',0,'C');

	$pdf->Ln(7);

	/*$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("CAMBIO"),'',0,'C');
	$pdf->Cell(34,7,utf8_decode("$30.00 USD"),'',0,'C');*/

	$pdf->Ln(7);

	/*$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("USTED AHORRA"),'',0,'C');
	$pdf->Cell(34,7,utf8_decode("$0.00 USD"),'',0,'C');*/

	$pdf->Ln(12);

	$pdf->SetFont('Arial','',9);

	$pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,9,utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"),0,'C',false);

	$pdf->Ln(9);

	# Codigo de barras #
	$pdf->SetFillColor(39,39,51);
	$pdf->SetDrawColor(23,83,201);
	$pdf->Code128(72,$pdf->GetY(),"COD000001V0001",70,20);
	$pdf->SetXY(12,$pdf->GetY()+21);
	$pdf->SetFont('Arial','',12);
	$pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);

	# Nombre del archivo PDF #
	$pdf->Output("I","Factura_Nro_1.pdf",true);