<?hh

namespace typealias\samples;

type userId = int;
newtype password = string;

class User {
  private userId $uid;
  private password $pwd;

  public function __construct(userId $userId, password $password) {
    $this->uid = $userId;
    $this->pwd = $password;
  }
}

function run(): void {
  $user = new User(100, "qwert");
  var_dump($user);

  //$user2 = new User("hoge", 123);
}

\typealias\samples\run();
