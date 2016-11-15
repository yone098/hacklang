<?hh

async function echoWithSleep($name, $timeout) {
  await SleepWaitHandle::create($timeout * 1000000);

  echo sprintf("hello %s\n", $name);
}

async function run() {
  $yone = echoWithSleep("\tyone098", 5);
  $mope = echoWithSleep("\tmopemope", 3);
  $garsue = echoWithSleep("\tgarsue", 1);

  $echoList = array($yone, $mope, $garsue);

  await GenArrayWaitHandle::create($echoList);
}

echo "Start async sample...\n\n";

run()->join();

