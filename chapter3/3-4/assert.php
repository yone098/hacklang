<?hh

namespace enum\func\assert;

enum Size: int {
  SMALL = 0;
  MEDIUM = 1;
  LARGE = 2;
  X_LARGE = 3;
}

function run(): void {
  var_dump(Size::assert(Size::LARGE));
  var_dump(Size::assert(1));
  // fatal error
  //var_dump(Size::assert("hoge"));
}

\enum\func\assert\run();
