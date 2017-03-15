<?hh

namespace lambda\design\precedence;

function chainedLambdas(): void {
  $lambda = $x ==> $y ==> $x - $y;

  $f = $lambda(8);
  echo $f(2) . PHP_EOL;
}

function run(): void {
  chainedLambdas();
}

\lambda\design\precedence\run();
