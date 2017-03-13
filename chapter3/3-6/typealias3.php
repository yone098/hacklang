<?hh

namespace type_system\typealias\samples;

type user_id = int;

// 引数の型は user_id
function get_user_name(user_id $user_id): string {
    return "mopemope";
}

newtype password = string;
// 引数の型は password
function login(user_id $user_id,  password $password): bool {
    return true;
}

class A {
  public user_id $uid;
  public password $pwd;

  public function __construct() {
    $this->uid = 100;
    $this->pwd = "xxx";
  }
}

function run(): void {
  echo "===== start alias sample =====" . PHP_EOL;

  $a = new A();
  $name = get_user_name($a->uid);
  echo $name . PHP_EOL;

  $result = login($a->uid, $a->pwd);
  echo $result . PHP_EOL;
}

\type_system\typealias\samples\run();
