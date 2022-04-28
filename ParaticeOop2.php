<?php

abstract class Country
{

    use Active;
    protected $slogan ;
    abstract public function sayHello();

    public function setSlogan($slogan) {
        $this->slogan = $slogan;
        //var_dump($this->slogan);die();
    }
}

interface Boss {
  public function checkValidSlogan();
}

class EnglandCountry extends Country implements Boss
{
        public function sayHello() {
            echo ("Hello");           
        }
        public function checkValidSlogan(){
            if(strpos($this->slogan, "England") !== false  || strpos($this->slogan, "english") !== false){
                return true;
            }else{
                return false;
            }
        }
}


class VietnamCountry extends Country implements Boss {

        public function sayHello() {
            echo ("Xin chao");           
        }
        public function checkValidSlogan(){
            if(strpos($this->slogan, "vietnam") !== false && strpos($this->slogan, "hust") !== false ){
                return true;
            }else{
                return false;
            }
        }
}
 Trait Active{
    public function defindYourSelf(){
        return get_class($this);
    }
 }
$englandCountry = new EnglandCountry();
$vietnamCountry = new VietnamCountry();

$englandCountry->setSlogan('England is a country that is part of the United Kingdom. It shares 
land borders with Wales to the west and Scotland to the north. The Irish Sea lies west of England
and the Celtic Sea to the southwest.');
$vietnamCountry->setSlogan('Vietnam is the easternmost country on the Indochina Peninsula. 
With an estimated 94.6 million inhabitants as of 2016, it is the 15th most populous country in the
world.');
$englandCountry->sayHello(); // Hello
echo "<br>";
$vietnamCountry->sayHello(); // Xin chao
echo "<br>";
var_dump($englandCountry->checkValidSlogan()); // true
echo "<br>";
var_dump($vietnamCountry->checkValidSlogan()); // false

echo 'I am ' . $englandCountry->defindYourSelf(); 
 echo "<br>";
 echo 'I am ' . $vietnamCountry->defindYourSelf(); 
