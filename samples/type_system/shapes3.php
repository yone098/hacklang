<?hh

namespace type_system\shapes3;

type user = shape('id' => int, 'name' => string);

class UserClass {
  public static function create_user(int $id, string $name): user {
    $user = shape();
    $user['id'] = $id;
    // コメントを外さないとエラーになる
/*
$ hhvm shapes3.php

Catchable fatal error: Hack type error: Invalid return type at /home/ubuntu/hacklang/samples/type_system/shapes3.php line 13
*/
    //$user['name'] = $name;
    return $user;
  }
}

function run(): void {
  echo "===== start shapes3 sample =====" . PHP_EOL;
  var_dump(UserClass::create_user(1, 'James'));
}

\type_system\shapes3\run();
