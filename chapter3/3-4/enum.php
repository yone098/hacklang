<?hh

namespace enum\examples;

enum Size: int {
  SMALL = 0;
  MEDIUM = 1;
  LARGE = 2;
  X_LARGE = 3;
}

function run(): void {
  echo Size::LARGE . PHP_EOL;
  echo Size::SMALL . PHP_EOL;
}

\enum\examples\run();
