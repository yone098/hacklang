<?hh

namespace tuples\samples;

class A {
  private $t1 = tuple("yone098", 98);
  public static $t2 = tuple(array(1, 2), Vector {3, 4});
}

function run(): void {
  echo "===== start tuples sample ======" . PHP_EOL;
  var_dump(new A());
  var_dump(A::$t2);
}


\tuples\samples\run();
