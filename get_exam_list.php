<?php
  $conn = mysqli_connect('localhost', 'root', '', 'exam')or die('Connection failed'. mysql_error());
  
  $request = $_REQUEST;
  $col = array(
       0 => 'ExamId',
	   1 => 'Exam_date',
	   2 => 'Start_time',
	   3 => 'Complete_time',
	   4 => 'Number_of_question',
	   5 => 'Module_code',
	   6 => 'Status'
  ); //create column
  $sql = "SELECT * FROM tbl_exam";
  $query = mysqli_query($conn, $sql);
  $totData = mysqli_num_rows($query);
  $totalFilter = $totData;
  $sql = "SELECT * FROM tbl_exam WHERE 1=1";
  
  if(!empty($request['search']['value'])){
	  $sql.=" AND (Exam_date Like'".$request['search']['value']."%' ";
	  $sql.=" OR Module_code Like'".$request['search']['value']."%' )";
  }
  $query = mysqli_query($conn, $sql);
  $totData = mysqli_num_rows($query);
  
  //order
   $sql.=" ORDER BY ".$col[$request['order'][0]['column']]."  ".$request['order'][0]['dir']."  LIMIT  ".$request['start']."  ,".$request['length']."  ";
   $query = mysqli_query($conn, $sql);
  
  $data = array();
  
  while($row = mysqli_fetch_array($query)){
	  $subData = array();
	  $subData[]=$row[0];
	  $subData[]=$row[1];
	  $subData[]=$row[2];
	  $subData[]=$row[3];
	  $subData[]=$row[4];
	  $subData[]=$row[5];
	  
	  $status = '';
	  if($row[6] == "Pending"){
		  $status = '<span class="badge badge-warning">Pending</span>';
	  }
	  
	  if($row[6] == "Completed"){
		  $status = '<span class="badge badge-dark">Completed</span>';
	  }
	  $subData[]=$status;
	  $subData[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Edit</button>';
	  $data[]=$subData;
  }
  $json_data = array(
        'draw' => intval($request['draw']),
		'recordsTotal' => intval($totData),
		'recordsFilter' => intval($totalFilter),
		'data' => $data
  );
  echo json_encode($json_data);
?>