<?php



	
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
    
     function printResult(){

        $textNumberOne = "Lorem Ipsum is simply dummy text of the printing and typesetting 
            industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
            1500s, when an unknown printer took a galley of type and scrambled it to make a 
            type specimen book. It has survived not only five centuries, but also the leap into 
            electronic typesetting, remaining essentially unchanged. It was popularised in the 
            1960s with the release of Letraset sheets containing Lorem Ipsum passages, and 
            more recently with desktop publishing software like Aldus PageMaker including 
            versions of Lorem Ipsum.";

        $textNumberTwo = "There are many variations of passages of Lorem Ipsum available, but 
            the majority have suffered alteration in some form, by injected humour, or 
            randomised words which don't look even slightly believable.";

        if($this->checkValidString($textNumberOne) === true){

            echo "Chuỗi 1 hợp lệ , chuoi co ";
            echo substr_count($textNumberOne,'.').'dau cham';

        }else{

            echo("Chuỗi 1 không hợp lệ ");
        }

        if($this->checkValidString($textNumberTwo) === true){

            echo("Chuỗi 2  hợp lệ, chuoi co ");
            echo substr_count($textNumberTwo,'.').'dau cham';

        }else{
            echo("Chuỗi 2 không hợp lệ");

        }
    }

