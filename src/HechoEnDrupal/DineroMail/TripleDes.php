<?php

namespace HechoEnDrupal\DineroMail;

class TripleDes {

  private $crypt;
  private $key;
  private $vector;

  public function __construct($key, $vector="uL%&(#(f"){
    $this->crypt = new \Crypt_TripleDES();
    $this->crypt->setKey($key);
    $this->crypt->setIV($vector);

    $this->key = $key;
    $this->vector = $vector;
  }

  public function encrypt($message){
    return $this->crypt->encrypt($message);
  }

  public function decrypt($message){
    return $this->crypt->decrypt($message);
  }

  public function getKey(){
    return $this->key;
  }

  public function setKey(){

  }

  public function getVector(){
    return $this->vector;
  }

  public function setVector(){

  }

}
