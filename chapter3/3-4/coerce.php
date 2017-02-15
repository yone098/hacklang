<?hh

namespace enum\func\coerce;

enum Size: int {
  SMALL = 0;
  MEDIUM = 1;
  LARGE = 2;
  X_LARGE = 3;
}

function run(): void {
  var_dump(Size::coerce(Size::LARGE));
  var_dump(Size::coerce(1));
  var_dump(Size::coerce("hoge"));
}

\enum\func\coerce\run();
