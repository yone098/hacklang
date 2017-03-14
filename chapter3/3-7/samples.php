<?hh

namespace lambda\samples;

function addName(): Vector<string> {
  $people = Vector {
    "yone098",
    "mopemope",
    "garsue",
  };

  return $people->map($name ==> $name . " 太郎");
}

function run(): void {
  var_dump(addName()); 
}

\lambda\samples\run();
