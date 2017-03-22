<?hh

function foo($x): @bool {
  if ($x + 3 < 10) {
    return false;
  }
  return true;
}

function bar($y): @?string {
  if ($y) {
    return "Hi";
  }
  return null;
}
