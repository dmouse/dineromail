<?php

namespace HechoEnDrupal\DineroMail;

use HechoEnDrupal\DineroMail\Credential;

interface DineroMailInterface {

  const SANDBOX_NS = "https://sandboxapi.dineromail.com/";

  const NS = "https://api.dineromail.com/";

  const SANDBOX_WSDL = "https://sandboxapi.dineromail.com/DMAPI.asmx?WSDL";

  const WSDL = "https://api.dineromail.com/DMAPI.asmx?WSDL";




  /*
  public function __construct(Credential $credential, $crypt=true);

  public function getOperations();

  public function sendMoney();

  public function doWithDraw();

  public function doPaymentWithReference();

  public function doPaymentWithBankTransfer();

  public function doPaymentWithDirectBankTransfer();

  public function doPaymentWithCreditCard();

  public function doPaymentWithCreditCardThirdParty();

  public function getPaymentTicket();

  */

}
