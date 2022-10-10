<?php
    if(preg_match("/^[01]?\d\/[0-3]\d\/\d{4}$/", "15/11/2400") == true){
		echo "The expression is correct";
	}else{
		echo "The expression is incorrect";
	}
	
	$terms = "imbali-isithelo-ubisi";
    $result = preg_split('/-/', $terms);
	
	print_r($result);
	
	function test($param, $param2 = 5){
		$sum = $param + $param2;
		echo $sum;
	}
	
	test(10);
	
	echo "<br>";
	
	function func_1(){
      return "func_1 is executed";
}
function func_2(){
func_1();
echo "func_2 is executed";
}
func_2();
?>