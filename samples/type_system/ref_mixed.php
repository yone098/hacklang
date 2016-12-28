<?hh

namespace type_system\refining\mixed;

// Mixed to Primitive
function foo(mixed $x): int {
  $a = 4;
  if (is_int($x)) { // refine $x to int by checking to see if $x is an int
    return $x + $a;
  } else if (is_bool($x)) {
    return (int) $x + $a; // know it is a bool, so can do safe cast
  }
  return $a;
}

function run(): void {
  echo "===== start types:refining mixed sample =====" . PHP_EOL;
  var_dump(foo(true));
  var_dump(foo(3));
}

\type_system\refining\mixed\run();
