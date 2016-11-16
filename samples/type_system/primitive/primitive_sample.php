<?hh

namespace type_system\primitive;

class A {}

class B {
  public string $a;

  protected int $b;

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
