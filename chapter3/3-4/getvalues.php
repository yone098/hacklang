<?hh

namespace enum\func\getvalues;

enum Size: int {
  SMALL = 0;
  MEDIUM = 1;
  LARGE = 2;
  X_LARGE = 3;
}

function run(): void {
  var_dump(Size::getValues());
}

\enum\func\getvalues\run();
