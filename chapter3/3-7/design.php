<?hh

namespace lambda\design;

class User {
  private string $name;

  protected function __construct(string $name) { $this->name = $name; }

  static function get(int $id): User {
    return new User("User" . strval($id));
  }
}

function getUsersFromIds(Vector<int> $userids): Vector<User> {
  return $userids->map($id ==> User::get($id));
}

function run(): void {
  var_dump(getUsersFromIds(Vector { 100, 112, 30, 4 }));
}

\lambda\design\run();
