<?hh

namespace type_system\refining\gotch;

interface I {
  public function i_method(): bool;
}

abstract class Base {
  abstract public function foo(): string;
}

class Child1 extends Base implements I {
  <<__Override>>
  public function foo(): string {
    return "Child1";
  }
  public function i_method(): bool {
    return true;
  }
}

class Child2 extends Base {
  <<__Override>>
  public function foo(): string {
    return "Child2";
  }
}

function bar(Base $b): void {
  if ($b instanceof I) { // refine $b to interface I, but makes $b unresolved
    var_dump($b->i_method());
  }
  // Catchable fatal error: Hack type error: Could not find method foo in an object of type type_system\refining\gotch\I at /home/ubuntu/hacklang/chapter2/2-4/ref_gotcha.php line 39
  var_dump($b->foo());
}

function run(): void {
  echo "===== start types:refining gotch sample =====" . PHP_EOL;
  $c = new Child1();
  bar($c);
}

\type_system\refining\gotch\run();
