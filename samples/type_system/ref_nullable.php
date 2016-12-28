<?hh

namespace type_system\refining\nullable;

// Refining a type basically establishes that a value of one type is also of another type.
// Nullable to Non-Nullable
function foo(?int $x): int {
  $a = 4;
  if ($x !== null) { // refine $x to just an int by verifying it is not null
    return $x + $a; // guaranteed that $x is not null now
  }
  return $a;
}

function run(): void {
  echo "===== start types:refining nullable sample =====" . PHP_EOL;
  var_dump(foo(5));
  var_dump(foo(null));
}

\type_system\refining\nullable\run();
