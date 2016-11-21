<?hh

namespace type_system\enum;

/*
enum Size: int {
  SMALL = 0;
  MEDIUM = 1;
  LARGE = 2;
  X_LARGE = 3;
}
*/
enum Size: string {
  SMALL = "small";
  MEDIUM = "medium";
  LARGE = "large";
  X_LARGE = "x_large";
}


function run(): void {
  echo Size::LARGE . PHP_EOL;

  // assert()
  var_dump(Size::assert(Size::LARGE));
  var_dump(Size::assert("medium"));
  var_dump(Size::assert("hoge"));
}

\type_system\enum\run();
