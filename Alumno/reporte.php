<?php 
   require_once('../tcpdf/config/lang/eng.php');
   require_once('../tcpdf/tcpdf.php');
   require_once('conexion.php');

   class MYPDF extends TCPDF {

	    public function Header() {
	        // Logo
	        $image_file = K_PATH_IMAGES.'logo_example.jpg';
	        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	        // Set font
	        $this->SetFont('helvetica', 'B', 20);
	        // Title
	        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	    }

	    // Page footer
	    public function Footer() {
	        // Position at 15 mm from bottom
	        $this->SetY(-15);
	        // Set font
	        $this->SetFont('helvetica', 'I', 8);
	        // Page number
	        $this->Cell(0, 10, 'Por el sentir de un pueblo, paz y equidad social', 0, false, 'C', 0, '', 0, false, 'T', 'M');
	    }
	}

  
    $pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Brayan Barroso');// Autor del PDF
	$pdf->SetTitle('Reporte de Notas'); //Titlo del pdf
	$pdf->SetSubject('Calificaciones');
    $pdf->SetKeywords('');//Palabras Claves
	$pdf->setPrintHeader(false); //No se imprime cabecera
	$pdf->setPrintFooter(true); //No se imprime pie de pagina
	$pdf->SetMargins(25, 10, 25); //Se define margenes izquierdo, alto, derecho
	$pdf->SetAutoPageBreak(false); //Se define un salto de pagina con un limite de pie de pagina
	$pdf->SetFont('Helvetica', '', 9);
	$pdf->SetDisplayMode('fullpage');
	$pdf->addPage();

	$cod = $_REQUEST['cod'];

     $sql = "SELECT asignatura.`Codigo`,asignatura.`Nombre_Asig`,nota.`Nota_1`,nota.`Nota_2`,nota.`Nota_3`,nota.`Definitiva`
             FROM alumno,asignatura,nota
             WHERE alumno.`Id` = nota.`Alumno_Id` AND asignatura.`Codigo` = nota.`Asignatura_Codigo` AND alumno.`Id` = '$cod'" ;
     $cosas = $mysqli->query($sql);
     
	$html = '';
  
	$html .= '
    <style type="text/css">
       div.cabecera{
       	  background-color: #33beff; 
       }

       div img{
       	width: 100 px;
       	height: 100 px;
       }

       table { 
		  width: 100%; 
		  border-collapse: collapse; 
		}
		
		tr:nth-of-type(odd) { 
		  background-color: #fff; 
		}

		table th { 
		  background-color: #33beff; 
		  border: 1px solid #ccc;
		  color: #000;
		  font-size:30px; 
		  font-weight: bold; 
		  height: 15px;
		  text-align: center
		}

		table td{  
		  padding: 6px; 
		  border: 1px solid #ccc; 
		  height: 15px;
		  text-align: center; 
		  vertical-align: bottom;
		}
    </style>
    
    <div class="cabecera">
	    <header>
			<img class="logo" src="../estilos/img/Captura.PNG" alt="Logo Principal" width="100" height="100"/>
			<hgroup>
				<h1>Sistemas de Gestion de Notas</h1>
			</hgroup>
		</header>
	</div>
    
    <table>
		<thead>
		 	<tr>
		 	    <th>Codigo</th>
		 		<th>Asignatura</th>
		 		<th>Nota 1</th>
		 		<th>Nota 2</th>
		 		<th>Nota 3</th>
		 		<th>Definitiva</th>
		 	</tr>
		</thead>
	';
        while ($row = $cosas->fetch_array(MYSQLI_ASSOC)) {
    $html .= '
		<tbody>
		   <tr>
		 	    <td>'.$row['Codigo'].'</td>
		 	    <td>'.$row['Nombre_Asig'].'</td>
		 	    <td>'.$row['Nota_1'].'</td>
		 	    <td>'.$row['Nota_2'].'</td>
		 	    <td>'.$row['Nota_3'].'</td>
		 	    <td>'.$row['Definitiva'].'</td>
		   </tr>
		</tbody>
	';	
    }
    $html .= '
	</table>
	';

	$pdf->writeHTML($html, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
 ?>