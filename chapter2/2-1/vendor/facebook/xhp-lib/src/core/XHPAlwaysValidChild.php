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

/**
 * INCREDIBLY DANGEROUS: Marks an object as a valid child of *any* element,
 * ignoring any child rules.
 *
 * This is useful when migrating to XHP as it allows you to embed non-XHP
 * content, usually in combination with XHPUnsafeRenderable; see MIGRATING.md
 * for more information.
 */
interface XHPAlwaysValidChild {
}
