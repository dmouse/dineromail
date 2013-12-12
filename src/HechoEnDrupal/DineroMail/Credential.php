<?php

namespace HechoEnDrupal\DineroMail;

use HechoEnDrupal\DineroMail\DineroMailInterface;

class Credential {

  protected $username;

  protected $password;

  public function __construct($username, $password){
    $this->password = $password;
    $this->username = $username;
  }

  public function get(){
    return new \SOAPVar(array(
      'APIUserName' => $this->getUsername(),
      'APIPassword'=> $this->getPassword()
      ),
      SOAP_ENC_OBJECT,
      'APICredential',
      DineroMailInterface::SANDBOX_NS
    );
  }

  public function setPassword($password){
    $this->password = $password;
  }

  public function getPassword(){
    return $this->password;
  }

  public function setUsername($username){
    $this->username = $username;
  }

  public function getUsername(){
    return $this->username;
  }

}
