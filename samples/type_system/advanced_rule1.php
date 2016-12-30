<?hh // strict

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

  /* HH_FIXME[4110] softhint */
  var_dump(soft_hint(true));
}

/* HH_FIXME[1002] Will move this call to a partial file later */
\type_system\advanced\softhint\softhint_run();
