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
  // This is a type error!
  // Given the instanceof check above, we have now made $b unresolved, a union
  // between a type of I and Base. So we can only call methods common to both.
  // which in this case there are none.
  // Catchable fatal error: Hack type error: Could not find method foo in an object of type type_system\refining\gotch\I at /home/yone098/hacklang/samples/type_system/ref_gotcha.php line 38
  var_dump($b->foo());
}

function run(): void {
  echo "===== start types:refining gotch sample =====" . PHP_EOL;
  $c = new Child1();
  bar($c);
}

\type_system\refining\gotch\run();
