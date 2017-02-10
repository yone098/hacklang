<?hh

namespace tuples\samples;

class A {
  private $t1 = tuple("yone098", 98);
  public static $t2 = tuple(array(1, 2), Vector {3, 4});
}

function any_returns(): (int, string) {
  return tuple(123, "yone098");
}

function run(): void {
  echo "===== start tuples sample ======" . PHP_EOL;
  var_dump(new A());
  var_dump(A::$t2);
  var_dump(any_returns());
}


\tuples\samples\run();
