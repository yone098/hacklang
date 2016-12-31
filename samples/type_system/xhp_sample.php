<?hh

namespace type_system;

//require "facebook/xhp-lib";

/*
class :ts-simple-xhp extends :x:element {
  public function render(): XHPRoot {
    return <b>Simple</b>;
  }
}
*/
$user_name = 'Fred';
echo <tt>Hello <strong>{$user_name}</strong></tt>;
