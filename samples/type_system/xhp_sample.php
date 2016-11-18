<?hh

namespace type_system;

class :ts-simple-xhp extends :x:element {
  public function render(): XHPRoot {
    return <b>Simple</b>;
  }
}
