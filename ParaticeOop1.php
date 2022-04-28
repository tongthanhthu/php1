<?php

 class ExerciseString 
 {
 	public $check1;
 	public $check2;
 	


 	function ReadFile($n){
 		$readFile = file_get_contents($n);

 		$checkValidate = $this->checkValidString($readFile);
 		if($checkValidate == true){

 			if($n == 'file1.txt'){ 
 				$check1 = true;
 			}
 			if($n == 'file2.txt'){
 				$check2 = true;
 			}
 		  }
 		   else{	
 			if($n == 'file1.txt'){
 				$check1 = false;
 			}
 			if($n == 'file2.txt'){
 				$check2 = false;
 			}
 		 }

 	}


    function checkValidString($arr){
        $book = 'book';
        $restaurant = 'restaurant';

        if (strpos($arr, $book) === false && strpos($arr, $restaurant) !== false  ) {

            return true;

        } else if(strpos($arr, $restaurant) === false && strpos($arr, $book) !== false){

            return true;
        }else{

            return false;
        }
    }
    function File($text){
           $myfile = fopen("result_file", "w") or die("Unable to open file!");
           fwrite($myfile, $text);
           fclose($myfile);
    }
 }
 $object1 = new ExerciseString();
 $object1->ReadFile('file1.txt');
 $object2 = new ExerciseString();
 $object2->ReadFile('file2.txt');

 if($object1->check1 == true){
    $object1->File('file hop le');
 }else{
    $object1->File('file khong hop le');
 }
 if($object2->check2 == true){
    $file = file_get_contents('file2.txt');
    $txt = substr_count($file,'.');
    $object2->File("Chuỗi 2 hợp lệ , chuoi co ".$txt."dau cham");
 }else{
    $file = file_get_contents('file2.txt');
    $txt = substr_count($file,'.');
    $object2->File("Chuỗi 2 khong hợp lệ , chuoi co ".$txt."dau cham");
 }
 
