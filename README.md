Dinero Mail API
==========

Api para Dinero Mail 

Sample
===
```
require __DIR__ . '/vendor/autoload.php';

use HechoEnDrupal\DineroMail\Credential;
use HechoEnDrupal\DineroMail\DineroMail;
use HechoEnDrupal\DineroMail\TripleDes;

$username = "TEST";
$password = "TEST-TEST-TEST-TEST-TEST";
$key = "abcdefghijklmnopqrstuvwx";

$credential = new Credential($username, $password);
$triple_des = new TripleDes($password);

$dinero = new DineroMail($credential, true);
$dinero->setEncrypt($triple_des);

$dinero->setUniqueMessage('1');
$dinero->setMerchantTransaction('1');

print_r ($dinero->getBalance());
print_r ($dinero->getOperations());
print_r ($dinero->getPaymentTicket());

```
