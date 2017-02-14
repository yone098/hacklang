<?hh

namespace enum\func\assertall;

enum Size: int {
  SMALL = 0;
  MEDIUM = 1;
  LARGE = 2;
  X_LARGE = 3;
}

function run(): void {
  var_dump(Size::assertAll(Vector{Size::LARGE}));
  var_dump(Size::assertAll(Vector{1, 3}));
  // fatal error
  //var_dump(Size::assertAll(Vector{5, 6}));
}

\enum\func\assertall\run();
