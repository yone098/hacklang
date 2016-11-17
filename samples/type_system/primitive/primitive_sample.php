<?hh

namespace type_system\primitive;

class A {}

class B {
  public string $a;
  protected int $b;
  protected bool $c = true;
  public float $d = 1.23;

  public function __construct() {
    $this->a = "Hello";
    $this->b = 123;
  }

}

function bar(): bool {

  $b = new \type_system\primitive\B();

  var_dump($b);

  return true;
}

bar();

// void 
function foo(): void {
  echo "foo(): void\n";
}

foo();


// noreturn
function hoge(bool $b): noreturn {
  if ($b) {
    throw new \Exception("NoReturn No Life\n");
  } else {
    die("NoReturn No Life\n");
  }
}

hoge(true);
