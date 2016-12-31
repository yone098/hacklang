<?hh // strict

enum XHPAttributeCoercionMode: int {
  SILENT = 1; // You're a bad person
  LOG_DEPRECATION = 2; // Default in 2.0
  THROW_EXCEPTION = 3; // Default for 2.1
}

abstract final class XHPAttributeCoercion {
  private static XHPAttributeCoercionMode $mode =
    XHPAttributeCoercionMode::THROW_EXCEPTION;

  public static function GetMode(): XHPAttributeCoercionMode {
    return self::$mode;
  }

  public static function SetMode(XHPAttributeCoercionMode $mode): void {
    self::$mode = $mode;
  }

  private static function LogCoercion(
    :x:composable-element $context,
    string $what,
    string $attr,
    mixed $val,
  ): void {
    switch (self::GetMode()) {
      case XHPAttributeCoercionMode::SILENT:
        // Your forward compatibility is bad, and you should feel bad.
        return;
      case XHPAttributeCoercionMode::LOG_DEPRECATION:
        if (is_object($val)) {
          $val_type = get_class($val);
        } else {
          $val_type = gettype($val);
        }
        trigger_error(
          sprintf(
            'Coercing value of type `%s` to `%s` for attribute `%s` of '.
            'element `%s`',
            $val_type,
            $what,
            $attr,
            :xhp::class2element(get_class($context)),
          ),
          E_USER_DEPRECATED,
        );
        return;
      case XHPAttributeCoercionMode::THROW_EXCEPTION:
        throw new XHPInvalidAttributeException(
          $context,
          $what,
          $attr,
          $val
        );
    }
  }

  public static function CoerceToString(
    :x:composable-element $context,
    string $attr,
    mixed $val,
  ): string {
    self::LogCoercion($context, 'string', $attr, $val);
    if (
      is_int($val)
      || is_float($val)
      || $val instanceof Stringish
    ) {
     return (string)$val;
    }

    throw new XHPInvalidAttributeException(
      $context,
      'string',
      $attr,
      $val,
    );
  }

  public static function CoerceToInt(
    :x:composable-element $context,
    string $attr,
    mixed $val,
  ): int {
    self::LogCoercion($context, 'int', $attr, $val);
    if (
      (is_string($val) && is_numeric($val) && $val !== '')
      || is_float($val)
    ) {
      return (int) $val;
    }

    throw new XHPInvalidAttributeException(
      $context,
      'int',
      $attr,
      $val,
    );
  }

  public static function CoerceToBool(
    :x:composable-element $context,
    string $attr,
    mixed $val,
  ): bool {
    self::LogCoercion($context, 'bool', $attr, $val);
    if (
      $val === 'true'
      || $val === 1
      || $val === '1'
      || $val === $attr
    ) {
      return true;
    }

    if (
      $val === 'false'
      || $val === 0
      || $val === '0'
    ) {
      return false;
    }

    throw new XHPInvalidAttributeException(
      $context,
      'bool',
      $attr,
      $val,
    );
  }

  public static function CoerceToFloat(
    :x:composable-element $context,
    string $attr,
    mixed $val,
  ): float {
    self::LogCoercion($context, 'float', $attr, $val);
    if (is_numeric($val)) {
      return (float)$val;
    }

    throw new XHPInvalidAttributeException(
      $context,
      'float',
      $attr,
      $val,
    );
  }
}
