<?hh 

namespace type_system\arraykey;

function bar(bool $v): arraykey {
  if ($v) {
    return "bool";
  }
  return 100;
}

function run(): void {
  echo "===== start typesystem arraykey sample =====" . PHP_EOL;
  var_dump(bar(true));
  var_dump(bar(false));
}

\type_system\arraykey\run();
