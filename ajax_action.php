<?php
    include('examination.php');
	
	$exam = new examination;
	
	/*if(isset($_POST['page'])){
		if($_POST['page'] == "register"){
			if($_POST['action'] == "check_email"){
				$exam->query = "SELECT * FROM users WHERE Email = '".trim($_POST["admin-email-address"])."'";
				$total_row = $exam->total_row();
				
				if($total_row == 0){
					$output = array('success' => true);
					
					echo json_decode($output);
				}
			}
		}
		
		if($_POST['page'] == "login"){
			if($_POST['action'] == "login"){
				$exam->data = array(
				   ':student-email-address' => $_POST['student-email-address']
				);
				$exam->query = "SELECT * FROM users WHERE Email = :student-email-address";
				
				$total_row = $exam->total_row();
				if($total_row > 0){
					$result = $exam->query_result();
					
					$output = array('success' => true);
				}else{
					$output = array('error' => 'Wrong email address');
				}
				echo json_decode($output);
			}
		}*/
		
		if($_POST['page'] == 'exam'){
			if($_POST['action'] == 'fetch'){
				$output = array();
				$exam->query = "SELECT * FROM tbl_exam WHERE ";
				
				if(isset($_POST['search']['value'])){
					$exam->query .= 'Exam_date LIKE "%'.$_POST["search"]["value"].'%" ';
					$exam->query .= 'OR Start_time LIKE "%'.$_POST["search"]["value"].'%" ';
					$exam->query .= 'OR Complete_time LIKE LIKE "%'.$_POST["search"]["value"].'%" ';
					$exam->query .= 'OR Number_of_question LIKE "%'.$_POST["search"]["value"].'%" ';
					$exam->query .= 'OR Module_code LIKE "%'.$_POST["search"]["value"].'%" ';
				}
				
				if(isset($_POST['order'])){
					$exam->query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
				}else{
					$exam->query .= 'ORDER BY ExamId DESC ';
				}
				
				$extra_query = "";
				
				if($_POST['length'] != -1){
					$extra_query = 'LIMIT '.$_POST['start'].', '.$_POST['length'];
				}
				
				$filtered_rows = $exam->total_row();
				
				$exam->query .= $extra_query;
				
				$result = $exam->query_result();
				
				$exam->query = "SELECT * FROM tbl_exam";
				
				$total_rows = $exam->total_row();
				
				$data = array();
				
				foreach($result as $row){
					$sub_array = array();
					$sub_array[] = html_entity_decode($row['ExamId']);
					$sub_array[] = $row['Exam_date'];
					$sub_array[] = $row['Start_time'];
					$sub_array[] = $row['Complete_time'];
					$sub_array[] = $row['Number_of_question'];
					$sub_array[] = $row['Module_code'];
					
					$status = '';
					if($row['Status'] == 'Pending'){
						$status = '<span class="badge badge-warning">Pending</span>';
					}

					if($row['Status'] == 'Created'){
						$status = '<span class="badge badge-success">Created</span>';
					}
					
					if($row['Status'] == 'Started'){
						$status = '<span class="badge badge-primary">Started</span>';
					}
					
					if($row['Status'] == 'Completed'){
						$status = '<span class="badge badge-dark">Completed</span>';
					}
					
					
					$sub_array[] = $status;
					
					$sub_array[] = '';
					
					$data[] = $sub_array;
				}
				
				$output = array(
				     "draw"             =>   intval($_POST['draw']),
					 "recordsTotal"     =>   $total_rows,
					 "recordsFiltered"  => $filtered_rows,
					 "data"             => $data
				);
				
				echo json_encode($output);
			}
		}
	

?>