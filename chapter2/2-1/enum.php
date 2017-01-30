<?hh 

namespace type_system\enum;

enum Color: string {
  BLUE = "blue";
  RED = "red";
  GREEN = "green";
}

function run(): void {
  echo "===== start typesystem enum sample =====" . PHP_EOL;
  var_dump(Color::BLUE);
  var_dump(Color::RED);
  var_dump(Color::GREEN);
}

\type_system\enum\run();
