<?hh

namespace enum\func\getnames;

enum Size: int {
  SMALL = 0;
  MEDIUM = 1;
  LARGE = 2;
  X_LARGE = 3;
}

function run(): void {
  var_dump(Size::getNames());
}

\enum\func\getnames\run();
