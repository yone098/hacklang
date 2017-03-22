<?hh

function foo($x) {
  if ($x + 3 < 10) {
    return false;
  }
  return true;
}

function bar($y) {
  if ($y) {
    return "Hi";
  }
  return null;
}
