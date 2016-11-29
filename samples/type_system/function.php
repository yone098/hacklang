<?hh

namespace type_system\fun;

function add_or_mult(int $a, bool $b): int {
  if ($b) {
    return $a + $a;
  }
  return $a * $a;
}

function my_math((function(int, bool): int) $callback, int $a, bool $b): ?int {
  if ($a < 0) {
    return null;
  }
  return $callback($a, $b);
}

function run(): void {
  var_dump(
    my_math(fun(
      '\type_system\fun\add_or_mult'
      ),
      3, true)
  );
  var_dump(
    my_math(fun(
      '\type_system\fun\add_or_mult'
      ),
      3, false)
  );
  var_dump(
    my_math(fun(
      '\type_system\fun\add_or_mult'
      ),
      -1, false)
  );
}


\type_system\fun\run();
