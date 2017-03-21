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

class :label extends :xhp:html-element {
  attribute Stringish for, Stringish form;
  category %flow, %phrase, %interactive;
  // may not contain label
  children (pcdata | %phrase)*;
  protected string $tagName = 'label';
}
