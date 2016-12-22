<?hh

namespace type_system\inference;

// Local Valiable
function foo(): int {
  $a = str_shuffle("ABCDEF"); // $a is a string
  if (strpos($a, "A") === false) {
    $a = 4; // $a is an int
  } else {
    $a = 2; // $a is an int
  }
  // Based on the flow of the program, $a is guaranteed to be an int at this
  // point, so it is safe to return as an int.
  return $a;
}

// Unresolved Types
function bar(): arraykey {
  $a = str_shuffle("ABCDEF"); // $a is a string
  if (strpos($a, "A") === false) {
    $a = 4; // $a is an int
  } else {
    $a = "Hello"; // $a is string
  }
  // Based on the flow of the program, at this point $a is either an int or
  // string. You have an unresolved type; or, to look at it another way, you
  // the union of an int and string. So you can only perform operations that
  // can be performed on both of those types.

  //以下コメントにしないとコンパイル時にエラー
  // Catchable fatal error: Hack type error: Typing error at /home/yone098/hacklang/samples/type_system/inference.php line 31
  //var_dump($a + 20); // Nope. This isn't good for a string

  $arr = array();
  $arr[$a] = 4; // Fine. Since an array key can be an int or string

  // arraykey is fine since it is either an int or string
  return $a;
}

// Class Properties
class A {
  protected ?int $x;

  public function __construct() {
    $this->x = 3;
  }

  public function setPropToNull(): void {
    $this->x = null;
  }

  public function checkPropBad(): void {
    // Typechecker knows $x isn't null after this validates
    if ($this->x !== null) {
      // We know that this doesn't call A::setPropToNull(), but the typechecker
      // does not since inferences is local to the function.
      // Commenting out so typechecker passes on all examples
      does_not_set_to_null();

      // 以下はコメントにしないとエラーになる
      // Catchable fatal error: Hack type error: Invalid argument at /home/ubuntu/hacklang/samples/type_system/inference.php line 62
      // We know that $x is still not null, but the typechecker doesn't
      //take_an_int($this->x);
    }
  }

  public function checkPropGood(): void {
    // Typechecker knows $x isn't null after this validates
    if ($this->x !== null) {
      // We know that this doesn't call A::setPropToNull(), but the typechecker
      // does not since inferences is local to the function.
      does_not_set_to_null();
      // Use this invariant to tell the typechecker what's happening.
      // invariant については以下
      // https://docs.hhvm.com/hack/reference/function/HH.invariant/
      invariant($this->x !== null, "We know it is not null");
      // We know that $x is still not null, and now the typechecker does too
      // Could also have used a local variable here saying:
      //    $local = $this->x;
      //    takes_an_int($local);
      take_an_int($this->x);
    }
  }
}

function does_not_set_to_null(): void {
  echo "I don't set A::x to null" . PHP_EOL;
}

function take_an_int(int $x): void {
  var_dump($x);
}


function run(): void {
  echo "===== start types:inference sample =====" . PHP_EOL;
  var_dump(foo());

  var_dump(bar());

  $a = new A();
  $a->checkPropBad();
  $a->checkPropGood();
}

\type_system\inference\run();
