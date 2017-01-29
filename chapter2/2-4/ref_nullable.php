<?hh

namespace type_system\refining\nullable;

// Nullable to Non-Nullable
function nullable_to_non_nullable(?int $x): int {
  $a = 4;
  if ($x !== null) { // refine $x to just an int by verifying it is not null
    return $x + $a; // guaranteed that $x is not null now
  }
  return $a;
}

function run(): void {
  echo "===== start types:refining nullable sample =====" . PHP_EOL;
  var_dump(nullable_to_non_nullable(5));
  var_dump(nullable_to_non_nullable(null));
}

\type_system\refining\nullable\run();
