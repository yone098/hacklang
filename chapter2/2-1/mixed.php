<?hh 

namespace type_system\mixed;

class A {
  public float $x;
  protected string $y;

  public function __construct() {
    $this->x = 5.7;
    $this->y = "yone098";
  }

  public function foo(bool $b): mixed {
    return $b ? 3.14 * $this->x : $this->y;
  }
}

function run(): void {
  echo "===== start typesystem mixed sample =====" . PHP_EOL;
  $a = new A();
  var_dump($a->foo(false));
}

\type_system\mixed\run();
