<?hh

namespace attributes\syntax;

<<NoValuesAttribute>>
function foo() {}

<<OneValueAttribute('Hello')>>
class A {}

<<FirstAttribute('Hello', 'yone098'), SecondAttribute, ThirdAttribute('2')>>
trait B {}

function run(): void {
$rc = new \ReflectionClass(
  "\\attributes\\syntax\\B"
);

var_dump($rc->getAttributes()["FirstAttribute"]);
var_dump($rc->getAttributes()["SecondAttribute"]);
}

\attributes\syntax\run();
