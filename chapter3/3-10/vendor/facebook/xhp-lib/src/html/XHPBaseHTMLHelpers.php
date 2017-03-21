<?hh // strict

/*
 *  Copyright (c) 2015, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the BSD-style license found in the
 *  LICENSE file in the root directory of this source tree. An additional grant
 *  of patent rights can be found in the PATENTS file in the same directory.
 *
 */

trait XHPBaseHTMLHelpers implements HasXHPBaseHTMLHelpers {
  require extends :x:composable-element;

  /*
   * Appends a string to the "class" attribute (space separated).
   */
  public function addClass(string $class): this {
    try {
      $current_class = /* UNSAFE_EXPR */ $this->:class;
      return $this->setAttribute('class', trim($current_class.' '.$class));
    } catch (XHPInvalidAttributeException $error) {
      throw new XHPException(
        'You are trying to add an HTML class to a(n) '.
        :xhp::class2element(static::class).' element, but it does not support '.
        'the "class" attribute. The best way to do this is to inherit '.
        'the HTML attributes from the element your component will render into.',
      );
    }
  }

  /*
   * Conditionally adds a class to the "class" attribute.
   */
  public function conditionClass(bool $cond, string $class): this {
    return $cond ? $this->addClass($class) : $this;
  }

  /*
   * Generates a unique ID (and sets it) on the "id" attribute. A unique ID
   * will only be generated if one has not already been set.
   */
  public function requireUniqueID(): string {
    $id = /* UNSAFE_EXPR */ $this->:id;
    if ($id === null || $id === '') {
      try {
        $this->setAttribute('id', $id = substr(md5(mt_rand(0, 100000)), 0, 10));
      } catch (XHPInvalidAttributeException $error) {
        throw new XHPException(
          'You are trying to add an HTML id to a(n) '.
          :xhp::class2element(static::class).' element, but it does not '.
          'support the "id" attribute. The best way to do this is to inherit '.
          'the HTML attributes from the element your component will render '.
          'into.',
        );
      }
    }
    return (string)$id;
  }

  /*
   * Fetches the "id" attribute, will generate a unique value if not set.
   */
  final public function getID(): string {
    return $this->requireUniqueID();
  }
}
