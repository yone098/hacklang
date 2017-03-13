<?hh

namespace typealias\samples;

type Counter = int;

type Password = string;

newtype MyCallback<T> = (function(T): Password);
