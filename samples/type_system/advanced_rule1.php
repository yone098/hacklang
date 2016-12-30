<?hh 

namespace type_system\advanced\softhint;

// Soft Type hint
// HHVM will throw a warning instead of fatal if, for example, a bool is passed
// in
function soft_hint(@int $x): bool {
  return $x < 5 ? true : false;
}

function softhint_run(): void {
  echo "===== start types:advanced rule softhint sample =====" . PHP_EOL;
  var_dump(soft_hint(5));
  //var_dump(soft_hint(true));
}

//\type_system\advanced\softhint\run();
softhint_run();
