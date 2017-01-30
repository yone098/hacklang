<?hh 

namespace type_system\num;

class A {
  protected num $x;

  public function __construct(num $x) {
    $this->x = $x;
  }
  public function foo(bool $b): num {
    return $b ? 2.3 * $this->x : 1 * $this->x;
  }

  public function setNum(num $x): void {
    $this->x = $x;
  }
}

function run(): void {
  echo "===== start typesystem num sample =====" . PHP_EOL;
  $a = new A(5);
  var_dump($a->foo(true));
  var_dump($a->foo(false));

  $a->setNum(3.14);
  var_dump($a->foo(true));
  var_dump($a->foo(false));
}

\type_system\num\run();
