<?hh

namespace type_system\refining\mixed;

// Mixed to Primitive
function mixed_to_primitive(mixed $v): int {
  $a = 8;
  if (is_int($v)) { // refine $v to int by checking to see if $v is an int
    return $v + $a;
  } else if (is_bool($v)) {
    return (int) $v + $a; // know it is a bool, so can do safe cast
  }
  return $a;
}

function run(): void {
  echo "===== start types:refining mixed sample =====" . PHP_EOL;
  var_dump(mixed_to_primitive(true));
  var_dump(mixed_to_primitive(100));
  var_dump(mixed_to_primitive("hoge"));
}

\type_system\refining\mixed\run();
