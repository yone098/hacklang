<?hh

namespace type_system\annotations;

// Function and Method Returns
//function <name>([parameters]): <type>
function foo(): int {
  return 100;
}  

// Function and Method Parameters
//function <name>(<ptype> <$pname>): <rtype>
function baz(int $x): void {}

function run(): void {
  echo "===== start types annotation sample =====" . PHP_EOL;
}

\type_system\annotations\run();
