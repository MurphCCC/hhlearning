<?PHP

//Include PDF class
require_once('./fpdf17/fpdf.php');

class PDF extends FPDF
{

    var $custom_number = 1;
    var $student       = null;
    
    // Page header
	function Header()
	{
	
		if ($this->getPageNumber() == 1) {
		
			// Logo
			$this->Image('img/grade_print_logo.jpg',10,6,45);

			$this->SetFont('Arial','B',14);
			// Move to the right
			$this->Cell(80);
			// Title
			$this->Cell(30,5,'Hilger Higher Learning Report Card',0,1,'C');
			
			//Set font for subtitle
			$this->SetFont('Times','',12);
			$this->Cell(80);
			$this->Cell(30,8,'Hilger Higher Learning, Inc.',0,1,'C');
			$this->Cell(80);
			$this->Cell(30,8,'1121 Mountain Terrace',0,1,'C');
			$this->Cell(80);
			$this->Cell(30,8,'Lookout Mountain, GA 30750',0,1,'C');
			$this->Cell(80);
			$this->Cell(30,8,'www.hhlearning.com',0,1,'C');
			
			// Line break
			$this->Ln(20);
		}
		else {
		
		    $this->SetFont('Times','I',8);
		    $this->Cell(150);
		    $this->Cell(30,8, 'Page : ' . $this->getPageNumber() ,0,1,'R');
		}
	}

	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);

		$this->SetFont('Times','I',8);
		// Page number
		//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		$this->Cell(0,10,'Hilger Higher Learning',0,0,'C');
		$this->Cell(0,10,'Report Card for '.$this->getStudent() ,0,0,'R');
	}
	
	function setPageNumber($number){
		$this->custom_number = $number;
	}
	
	function getPageNumber() {
		return $this->custom_number;
	}
	
	function customAddPage(){
		$this->AddPage();
		$this->setPageNumber(1);
	}
	
	function AcceptPageBreak() {
		
		//Override this function to keep track of page numbers for students
		$page_number = $this->getPageNumber();
		$page_number++;
		$this->setPageNumber($page_number);
		
		return $this->AutoPageBreak;
	}
	
	function getStudent() {
		return $this->student;
	}	
	
	function setStudent($student){
		$this->student = $student;
	}
}


$dbh = mysql_connect ("updater.db.6526174.hostedresource.com", "updater", "Eddy1010") or die ('I cannot connect to the database because: ' . mysql_error());

mysql_select_db ("updater");


if ($_REQUEST["view"] && isset($_REQUEST["resultnum"])) { 
$view = $_REQUEST["view"];
$resultnum = mysql_real_escape_string($_REQUEST["resultnum"]);
$result = mysql_query("SELECT * from `students` LIMIT " . $resultnum . ", 1") or die("Error");


$pdf = new PDF();

if ($result) {

	while ($row = mysql_fetch_array($result)) {
	
		$pdf->customAddPage();
		$student = $row['LASTNAME'] . ", " . $row['FIRSTNAME'];
		$pdf->setStudent($student);
		$pdf->SetFont('Times','',10);
		$intro = $row['FIRSTNAME'] . " " . $row['LASTNAME'] . " has received the following  percentage grade(s) for one " .
                 "semester of class(es) administered by Hilger Higher Learning, Inc. All instructors contracted by Hilger " .
				 "Higher Learning meet proper Certification and/or requirement standards as directed by Tennessee, Georgia, ". 
				 "and Alabama state law. Each semester of class is worth 1/2 credit.";
				 
		$pdf->Cell(10);
		$pdf->Write(5, $intro);
		
		$pdf->Ln(8);
		
		$pdf->SetFont('Times','B',10);
		
		$pdf->Cell(10);
		$course1 = "Course: " . $row['C1COURSE'];
		$pdf->Cell(0,5,$course1,0,1,'L');
		
		$pdf->Ln(1);
		
		$pdf->Cell(10);
		$grade1 = "Grade: " . $row['C1GRADE'];
		$pdf->Cell(0,5,$grade1,0,1,'L');
		
		$pdf->Ln(1);
		
		$pdf->Cell(10);
		$teacher1 = "Instructor: " . $row['C1TEACHER'];
		$pdf->Cell(0,5,$teacher1,0,1,'L');
		
		$pdf->Ln(1);
		
		$pdf->SetFont('Times','',10);
		$pdf->Cell(10);
		$feedback1 = trim($row['C1FEEDBACK']);
		$pdf->Write(5, $feedback1);
		
		$pdf->Ln(5);
		
		if ($row['C2COURSE']) {
			$pdf->Ln(5);
			$pdf->Cell(0,0, '', 1,1); //HR line
			$pdf->Ln(5);
		
			$pdf->SetFont('Times','B',10);
			
			$pdf->Cell(10);
			$course2 = "Course: " . $row['C2COURSE'];
			$pdf->Cell(0,5,$course2,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->Cell(10);
			$grade2 = "Grade: " . $row['C2GRADE'];
			$pdf->Cell(0,5,$grade2,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->Cell(10);
			$teacher2 = "Instructor: " . $row['C2TEACHER'];
			$pdf->Cell(0,5,$teacher2,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->SetFont('Times','',10);
			$pdf->Cell(10);
			$feedback2 = $row['C2FEEDBACK'];
			$pdf->Write(5, $feedback2);
			
			$pdf->Ln(5);
		}
		
		if ($row['C3COURSE']) {

			$pdf->Ln(5);
			$pdf->Cell(0,0, '', 1,1); //HR line
			$pdf->Ln(5);
		
			$pdf->SetFont('Times','B',10);
			
			$pdf->Cell(10);
			$course3 = "Course: " . $row['C3COURSE'];
			$pdf->Cell(0,5,$course3,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->Cell(10);
			$grade3 = "Grade: " . $row['C3GRADE'];
			$pdf->Cell(0,5,$grade3,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->Cell(10);
			$teacher3 = "Instructor: " . $row['C3TEACHER'];
			$pdf->Cell(0,5,$teacher3,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->SetFont('Times','',10);
			$pdf->Cell(10);
			$feedback3 = $row['C3FEEDBACK'];
			$pdf->Write(5, $feedback3);
			
			$pdf->Ln(5);
		
		}
		
		if ($row['C4COURSE']) {
		
			$pdf->Ln(5);
			$pdf->Cell(0,0, '', 1,1); //HR line
			$pdf->Ln(5);
		
			$pdf->SetFont('Times','B',10);
			
			$pdf->Cell(10);
			$course4 = "Course: " . $row['C4COURSE'];
			$pdf->Cell(0,5,$course4,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->Cell(10);
			$grade4 = "Grade: " . $row['C4GRADE'];
			$pdf->Cell(0,5,$grade4,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->Cell(10);
			$teacher4 = "Instructor: " . $row['C4TEACHER'];
			$pdf->Cell(0,5,$teacher4,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->SetFont('Times','',10);
			$pdf->Cell(10);
			$feedback4 = $row['C4FEEDBACK'];
			$pdf->Write(5, $feedback4);
			
			$pdf->Ln(5);
		
		}
		
		if ($row['C5COURSE']) {
		
			$pdf->Ln(5);
			$pdf->Cell(0,0, '', 1,1); //HR line
			$pdf->Ln(5);
		
			$pdf->SetFont('Times','B',10);
			
			$pdf->Cell(10);
			$course5 = "Course: " . $row['C5COURSE'];
			$pdf->Cell(0,5,$course5,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->Cell(10);
			$grade5 = "Grade: " . $row['C5GRADE'];
			$pdf->Cell(0,5,$grade5,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->Cell(10);
			$teacher5 = "Instructor: " . $row['C5TEACHER'];
			$pdf->Cell(0,5,$teacher5,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->SetFont('Times','',10);
			$pdf->Cell(10);
			$feedback5 = $row['C5FEEDBACK'];
			$pdf->Write(5, $feedback5);
			
			$pdf->Ln(5);
		
		}
		
		if ($row['C6COURSE']) {
		
			$pdf->Ln(5);
			$pdf->Cell(0,0, '', 1,1); //HR line
			$pdf->Ln(5);
		
			$pdf->SetFont('Times','B',10);
			
			$pdf->Cell(10);
			$course6 = "Course: " . $row['C6COURSE'];
			$pdf->Cell(0,5,$course6,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->Cell(10);
			$grade6 = "Grade: " . $row['C6GRADE'];
			$pdf->Cell(0,5,$grade6,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->Cell(10);
			$teacher6 = "Instructor: " . $row['C6TEACHER'];
			$pdf->Cell(0,5,$teacher6,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->SetFont('Times','',10);
			$pdf->Cell(10);
			$feedback6 = $row['C6FEEDBACK'];
			$pdf->Write(5, $feedback6);
			
			$pdf->Ln(5);
		
		}
		
		if ($row['C7COURSE']) {
		
			$pdf->Ln(5);
			$pdf->Cell(0,0, '', 1,1); //HR line
			$pdf->Ln(5);
		
			$pdf->SetFont('Times','B',10);
			
			$pdf->Cell(10);
			$course7 = "Course: " . $row['C7COURSE'];
			$pdf->Cell(0,5,$course7,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->Cell(10);
			$grade7 = "Grade: " . $row['C7GRADE'];
			$pdf->Cell(0,5,$grade7,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->Cell(10);
			$teacher7 = "Instructor: " . $row['C7TEACHER'];
			$pdf->Cell(0,5,$teacher7,0,1,'L');
			
			$pdf->Ln(1);
			
			$pdf->SetFont('Times','',10);
			$pdf->Cell(10);
			$feedback7 = $row['C7FEEDBACK'];
			$pdf->Write(5, $feedback7);
			
			$pdf->Ln(5);
		
		}
		
		$pdf->setPageNumber(1); //Reset page counter
	}
  }
  
$pdf->AliasNbPages();
$pdf->SetTitle('Hilger Higher Learning - All Grade Reports');
$pdf->Output();
  
  
}
	



