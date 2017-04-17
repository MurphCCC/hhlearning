<?PHP
// var_dump($_REQUEST);
// var_dump($_SESSION);
//Include PDF class
require_once('./FPDF/fpdf.php');
require('include/config.php');

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

    $statement = $db_con->prepare("SELECT * from students WHERE student_id = :student_id");
    $statement->execute(array(':student_id' => $_GET['student_id']));
    $student = $statement->fetchAll(PDO::FETCH_ASSOC);

    $pdf = new PDF();

        if ($student) {

            foreach ($student as $row) {
                $pdf->customAddPage();
                $student = $row['last_name'] . ", " . $row['first_name'];
                $pdf->setStudent($student);
                $pdf->SetFont('Times','',10);
                $intro = $row['first_name'] . " " . $row['last_name'] . " has received the following  percentage grade(s) for one " .
                         "semester of class(es) administered by Hilger Higher Learning, Inc. All instructors contracted by Hilger " .
                         "Higher Learning meet proper Certification and/or requirement standards as directed by Tennessee, Georgia, ". 
                         "and Alabama state law. Each semester of class is worth 1/2 credit.";
                         
                $pdf->Cell(10);
                $pdf->Write(5, $intro);
                
                $i = 1;
                $pdf->Ln(5);
                    while ($i <= 7) {
                        $pdf->Ln(5);
                        $next_course = $i + 1;
                        // echo $next_course;
                        if (!empty($row['c'.$i.'_course'])) {                
                            $pdf->SetFont('Times','B',10);
                            $pdf->Cell(10);
                            $course = "Course: " . $row['c'.$i.'_course'];
                            $pdf->Cell(0,5,$course,0,1,'L');
                            
                            $pdf->Ln(1);
                            
                            $pdf->Cell(10);
                            $grade = "Grade: " . $row['c'.$i.'_grade'];
                            $pdf->Cell(0,5,$grade,0,1,'L');
                            
                            $pdf->Ln(1);
                            
                            $pdf->Cell(10);
                            $teacher = "Instructor: " . $row['c'.$i.'_teacher'];
                            $pdf->Cell(0,5,$teacher,0,1,'L');
                            
                            $pdf->Ln(1);
                            
                            $pdf->SetFont('Times','',10);
                            $pdf->Cell(10);
                            $feedback = trim($row['c'.$i.'_feedback']);
                            $feedback = iconv('UTF-8', 'windows-1252', $feedback); //Ensure that were getting correct punctation in the pdf output.  Without this punctuation will be converted to funky characters.
                            $pdf->Write(5, $feedback);
                            $pdf->Ln(10);
                             if (empty($row['c'.$next_course.'_course'])) {

                             } else {
                                $pdf->Cell(0,0, '', 1,1); //HR line
                            };
                        };
                    $i++;
                };
                
                $pdf->setPageNumber(1); //Reset page counter
            }
          }
  
$pdf->AliasNbPages();
$pdf->SetTitle('Hilger Higher Learning - All Grade Reports');
$pdf->Output();

    



