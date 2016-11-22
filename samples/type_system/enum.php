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
  // fatal error
  //var_dump(Size::assert("hoge"));

  // assertAll()
  echo "--- assertAll() ---" . PHP_EOL;
  var_dump(Size::assertAll(Vector{Size::LARGE}));
  // fatal error
  //var_dump(Size::assertAll(Vector{"hoge"}));
  var_dump(Size::assertAll(Vector{"small", "x_large"}));
}

\type_system\enum\run();
