<?hh

namespace type_system\nullable;

function nullable(bool $b): ?string {
  if ($b == true) {
    return "Hello";
  } else {
    return null;
  }
}

function run(): void {
  $a = nullable(false);
  var_dump($a);
  $a = nullable(true);
  var_dump($a);
}

\type_system\nullable\run();
