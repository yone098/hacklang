<?hh

namespace type_system;

function nullable(bool $b): ?string {
  
  if ($b == true) {
    return "Hello";
  } else {
    return null;
  }
}


$a = nullable(false);
var_dump($a);
$a = nullable(true);
var_dump($a);
