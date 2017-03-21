<?hh

namespace async\awaitable\awaiting;

async function aw_sample(): Awaitable<int> {
  return 100;
}

async function run(): Awaitable<void> {
  $aw = aw_sample();
  $result = await $aw;
  var_dump($result);
}

\async\awaitable\awaiting\run();

