<?hh

namespace type_system\shapes7;

enum Bank: int {
  INVALID = 0;
  DEPOSIT = 1;
  WITHDRAWAL = 2;
  TRANSFER = 3;
}

type Transaction = shape('trtype' => Bank);
type Deposit = shape('trtype' => Bank, 'toaccnum' => int, 'amount' => float);
type Withdrawal = shape('trtype' => Bank, 'fromaccnum' => int,
                        'amount' => float);
type Transfer = shape('trtype' => Bank, 'fromaccnum' => int,
                      'toaccnum' => int, 'amount' => float);

function processTransaction(Transaction $t): void {
  var_dump($t);

  $a = Shapes::toArray($t);
  var_dump(count($a), $a);

  $v = Shapes::idx($t, 'trtype', Bank::INVALID);  // checker accepts this
  var_dump($v);

  $v = Shapes::keyExists($t, 'trtype');   // checker accepts this
  var_dump($v);

  Shapes::removeKey($t, 'xyz');   // checker accepts this
  var_dump($t);

  // checker complains Invalid argument (Typing[4140])
  //$v = Shapes::idx($t, 'amount', -999.0); // The field 'amount' is missing
  //var_dump($v);

  // checker complains Invalid argument (Typing[4140])
  //$v = Shapes::keyExists($t, 'amount'); // The field 'amount' is missing
  //var_dump($v);

  // checker is fine here because we used removeKey above
  $v = Shapes::keyExists($t, 'xyz'); // The field 'xyz' is missing
  var_dump($v);

  switch ($t['trtype']) {
    case Bank::TRANSFER:
      //echo "Transfer: " . $t['amount'] . " from Account " . $t['fromaccnum'] .
      //     " to Account " . $t['toaccnum'] . "\n";
      echo "transfer" . PHP_EOL;
      var_dump($t);
      break;
    case Bank::DEPOSIT:
      // The field amount is undefined (Typing[4108])
      // The field toaccnum is undefined (Typing[4108])
      //echo "Deposit: " . $t['amount'] . " to Account " . $t['toaccnum'] . "\n";
      echo "deposit" . PHP_EOL;
      var_dump($t);
      break;
    case Bank::WITHDRAWAL:
      //echo "Withdrawal: " . $t['amount'] . " from Account " .
      //     $t['fromaccnum'] . "\n";
      echo "withdrawal" . PHP_EOL;
      var_dump($t);
      break;
    default:
      break;
  }
}

function run(): void {
  echo "===== start shapes5 Shapes: Subtyping =====" . PHP_EOL;
  processTransaction(shape('trtype' => Bank::DEPOSIT, 'toaccnum' => 23456,
                           'amount' => 100.00));
  processTransaction(shape('trtype' => Bank::WITHDRAWAL, 'fromaccnum' => 3157,
                           'amount' => 100.00));
  processTransaction(shape('trtype' => Bank::TRANSFER, 'fromaccnum' => 23456,
                           'toaccnum' => 3157, 'amount' => 100.00));
}

\type_system\shapes7\run();
