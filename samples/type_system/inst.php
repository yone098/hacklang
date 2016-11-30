<?hh

namespace type_system\inst;

class A {
  public function add_or_mult(int $a, bool $b): int {
    if ($b) {
      return $a + $a;
    }
    return $a * $a;
  }
}

function my_math((function(int, bool): int) $callback, int $a, bool $b): ?int {
  if ($a < 0) {
    return null;
  }
  return $callback($a, $b);
}

function run(): void {
  $a = new A();
  $callback = inst_meth($a, 'add_or_mult');
  var_dump(my_math($callback, 10, true));
  var_dump(my_math($callback, 10, false));
  var_dump(my_math($callback, -1, false));
}

\type_system\inst\run();
