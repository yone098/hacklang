<?hh

namespace generics\func\isvalid;

enum Size: int {
  SMALL = 0;
  MEDIUM = 1;
  LARGE = 2;
  X_LARGE = 3;
}

function run(): void {
  var_dump(Size::isValid(3));
  var_dump(Size::isValid(5));
}

\generics\func\isvalid\run();
