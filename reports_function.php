<?php
   $conn = mysqli_connect('localhost', 'root', '', 'exam')or die('Connection failed'. mysql_error());
   include('connection.php');
   $totRows = 0;
   $totRows1 = 0;
   if(isset($_POST['viewreport1'])){
	   $examDate = $_POST['exam_date'];
	   $statement = $conn->prepare("SELECT e.Exam_date AS 'Exam Date', COUNT(DISTINCT s.Student_number) AS 'Number of Student'
       FROM tbl_exam e JOIN answer s USING(ExamId) WHERE e.ExamId = s.ExamId AND e.Exam_date = '$examDate'");
       $statement->execute();
       $results = $statement->fetchAll();
       $totRows = $statement->rowCount();
   }
   
   //birthdays
   if(isset($_POST['viewreport2'])){
	   $moduleCode = $_POST['module'];
	   echo $moduleCode;
	   $statement1 = $conn->prepare("SELECT e.Module_code AS 'Module Code', COUNT(DISTINCT s.Student_number) AS 'Number of Student'
       FROM tbl_exam e JOIN answer s USING(ExamId) WHERE e.ExamId = s.ExamId AND e.ExamId = $moduleCode");
       $statement1->execute();
       $results1 = $statement1->fetchAll();
       $totRows1 = $statement1->rowCount();
   }
   
   //Day-to-day report - Minimum stock levels
	   $current_day = date('Y-m-d');
	   $statement2 = $conn->prepare("SELECT DISTINCT Module_code
       FROM `tbl_exam` WHERE Exam_date = $current_day");
       $statement2->execute();
       $results2 = $statement2->fetchAll();
       $totRows2 = $statement2->rowCount();
   
   //Day-to-day report - Today's orders
   $stmt = $conn->prepare("SELECT DISTINCT YEAR(Exam_date) AS 'YEAR',
   (SELECT COUNT(Student_number) FROM tbl_exam)'NUMBER OF STUDENTS'
   FROM `tbl_exam`");
   $stmt->execute();
   $ord_results = $stmt->fetchAll();
   $tot_ord = $stmt->rowCount();
?>