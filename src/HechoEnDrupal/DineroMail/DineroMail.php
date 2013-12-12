<?php

namespace HechoEnDrupal\DineroMail;

use HechoEnDrupal\DineroMail\DineroMailInterface;
use HechoEnDrupal\DineroMail\Credential;


class DineroMail implements DineroMailInterface {

  private $credential;
  private $crypt;
  private $merchant_transaction_id = '';
  private $unique_message_id = '';
  private $hash;

  public function __construct(Credential $credential, $crypt=true){
    $this->credential = $credential;
    $this->crypt = $crypt;

    $this->soap = new \SoapClient(DineroMailInterface::SANDBOX_WSDL,['trace' =>1,'exceptions'=>1]);
  }


  public function setUniqueMessage($unique_message_id){
    if ($this->crypt){
      $this->unique_message_id = $this->encrypt($unique_message_id);
    }
    else {
      $this->unique_message_id = $unique_message_id;
    }
  }

  public function setMerchantTransaction($merchant_transaction_id){
    if ($this->crypt){
      $this->merchant_transaction_id = $this->encrypt($merchant_transaction_id);
    }
    else {
      $this->merchant_transaction_id = $merchant_transaction_id;
    }
  }

  public function setCredential(Credential $credential){
    $this->credential = $credential;
  }

  public function setEncrypt($encrypt){
    $this->encrypt = $encrypt;
  }

  public function encrypt($message){
    return base64_encode($this->encrypt->encrypt($message));
  }

  public function getBalance($merchant_transaction_id='', $unique_message_id=''){

    if (!empty($merchant_transaction_id)){
      $this->setMerchantTransaction($merchant_transaction_id);
    }

    if (!empty($unique_message_id)){
      $this->setUniqueMessage($unique_message_id);
    }

    $balance = $this->soap->GetBalance([
      'Credential' => $this->credential->get(),
      'Crypt' => $this->crypt,
      'MerchantTransactionId' => $this->merchant_transaction_id,
      'UniqueMessageId' => $this->unique_message_id,
      'Hash' => MD5($this->merchant_transaction_id.$this->unique_message_id.$this->credential->getPassword())
    ]);

    return $balance->GetBalanceResult;
  }

  public function getOperations($operation_id='', $start_date='', $end_date=''){
    $get_operations = $this->soap->GetOperations([
      'Credential' => $this->credential->get(),
      'Crypt' => $this->crypt,
      'MerchantTransactionId' => $this->merchant_transaction_id,
      'UniqueMessageId' => $this->unique_message_id,
      'Hash' => MD5($this->merchant_transaction_id.$this->unique_message_id.$this->credential->getPassword())
    ]);

    return $get_operations->GetOperationsResult;
  }

  public function getPaymentTicket(){

  }

}
