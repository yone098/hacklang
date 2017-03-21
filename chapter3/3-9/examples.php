<?hh

namespace async\examples;

async function do_cpu_work(): Awaitable<void> {
  echo "## Start CPU work" . PHP_EOL;
  $a = 0;
  $b = 1;

  $list = [$a, $b];
  for ($i = 0; $i < 1000; $i++) {
    $c = $a + $b;
    $list[] = $c;
    $a = $b;
    $b = $c;
  }
  echo "## End CPU work" . PHP_EOL;
}

async function do_sleep(): Awaitable<void> {
  echo "#### Start sleep" . PHP_EOL;
  sleep(1);
  echo "#### End sleep" . PHP_EOL;
}

async function run(): Awaitable<void> {
  echo "Start run()" . PHP_EOL;
  await \HH\Asio\v([
    do_cpu_work(),
    do_sleep(),
  ]);
  echo "End run()" . PHP_EOL;
}


\HH\Asio\join(run());
