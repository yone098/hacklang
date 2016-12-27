<?hh

namespace type_system\casting;

function cast(): bool {
  $a = "10";
  $a = (int) $a;
  $a = (bool) $a;
  // 以下の場合
  // Catchable fatal error: Hack type error: Invalid return type at /home/yone098/hacklang/samples/type_system/casting.php line 10
  //$a = (float) $a; // Not allowed, a cast from bool to float
  return $a;
}

function run(): void {
  echo "===== start types:casting sample =====" . PHP_EOL;
  var_dump(cast());
}

\type_system\casting\run();
