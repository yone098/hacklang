<?hh

namespace type_system\enum;

enum Size: int {
  SMALL = 0;
  MEDIUM = 1;
  LARGE = 2;
  X_LARGE = 3;
}
/*
enum Size: string {
  SMALL = "small";
  MEDIUM = "medium";
  LARGE = "large";
  X_LARGE = "x_large";
}
*/


function run(): void {
  echo Size::LARGE . PHP_EOL;

  // assert()
  var_dump(Size::assert(Size::LARGE));
  var_dump(Size::assert(1));
  // fatal error
  //var_dump(Size::assert("hoge"));

  // assertAll()
  echo "--- assertAll() ---" . PHP_EOL;
  var_dump(Size::assertAll(Vector{Size::LARGE}));
  // fatal error
  //var_dump(Size::assertAll(Vector{"hoge"}));
  var_dump(Size::assertAll(Vector{1, 3}));

  // coerce()
  echo "--- coerce ---" . PHP_EOL;
  var_dump(Size::coerce(1));
  var_dump(Size::coerce(Size::LARGE));

  // getNames()
  echo "--- getNames ---" . PHP_EOL;
  var_dump(Size::getNames());

  // getValues()
  echo "--- getValues ---" . PHP_EOL;
  var_dump(Size::getValues());

  // isValid()
  echo "--- isValid ---" . PHP_EOL;
  var_dump(Size::isValid(3));
  var_dump(Size::isValid(9));
}

\type_system\enum\run();
