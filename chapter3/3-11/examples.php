<?hh

namespace attributes\examples;

<<ClassOwner("yone098"), Description("This class is sample.")>>
class SampleAttributes {}

function run(): void {
  $rc = new \ReflectionClass(
    "\\attributes\\examples\\SampleAttributes"
  );
  
  var_dump($rc->getAttributes()["ClassOwner"]);
  var_dump($rc->getAttributes()["Description"]);
}

\attributes\examples\run();
