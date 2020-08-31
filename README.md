# PHP Assert
[![Build](https://github.com/pattisahusiwa/php-assert/workflows/Build/badge.svg?branch=master)](https://github.com/pattisahusiwa/php-assert/actions)
[![Coverage Status](https://coveralls.io/repos/github/pattisahusiwa/php-assert/badge.svg?branch=master)](https://coveralls.io/github/pattisahusiwa/php-assert?branch=master)
[![License](https://img.shields.io/packagist/l/xynha/php-assert)](https://github.com/pattisahusiwa/php-assert/blob/master/LICENSE)
[![PHP Version](https://img.shields.io/packagist/php-v/xynha/php-assert)](https://packagist.org/packages/xynha/php-assert)
[![Stable Version](https://img.shields.io/packagist/v/xynha/php-assert?label=stable)](https://github.com/pattisahusiwa/php-assert/releases)
[![Unstable Version](https://img.shields.io/packagist/v/xynha/php-assert?include_prereleases&label=unstable)](https://github.com/pattisahusiwa/php-assert)


Assertion library done right for modern PHP and static analyzer friendly.

## # Installation
The library can be installed via [composer](https://getcomposer.org/).
```bash
composer require xynha/php-assert
```

## # Why another assertion library?

The main reason is I need a flexible assertion library that can be used:
1. to throw custom exception and/or custom message,
2. without throwing an exception, and
3. to execute a callback (if needed).


## # Usage
#### Case 1: throw default exception and default message
````php
// will throw InvalidArgumentException and default message
Assert::isTrue($condition);
````

#### Case 2: throw default exception and a custom message
````php
// will throw InvalidArgumentException and custom message
Assert::isTrue($condition, null, 'Custom message');
````

#### Case 3: throw custom exception and default message
````php
// will throw UnexpectedValueException and default message
Assert::isTrue($condition, UnexpectedValueException::class);
````

#### Case 4: throw custom exception and custom message
````php
// will throw UnexpectedValueException and custom message
Assert::isTrue($condition, UnexpectedValueException::class, 'Custom message');
````

#### Case 5: do not throw an exception
````php
if (Assert::isTrue($condition, false)) {
  return;
}
````

## # List of assertion functions
> Features are still under development. Feel free to request some features.

**Note**:
  - `$handler` is **optional** and can accept `null`, `throwable`, or `false` value (see usage above).
  - `$msg` is **optional** custom exception message.
### ## Type checking
````php
isBool($value, $handler, string $msg) : bool;

isInt($value, $handler, string $msg) : bool;

isFloat($value, $handler, string $msg) : bool;

isNumeric($value, $handler, string $msg) : bool;

isString($value, $handler, string $msg) : bool;

isArray($value, $handler, string $msg) : bool;

isIterable($value, $handler, string $msg) : bool;

isObject($value, $handler, string $msg) : bool;

isCallable($value, $handler, string $msg) : bool;

isResource($value, $handler, string $msg) : bool;

isNull($value, $handler, string $msg) : bool;

isNotNull($value, $handler, string $msg) : bool;

isScalar($value, $handler, string $msg) : bool;
````
**NOTE:**
  * `is_countable` currently is not supported (require `PHP >= 7.3`).

### ## Boolean assertions
````php
isTrue(bool $value, $handler, string $msg) : bool;

isFalse(bool $value, $handler, string $msg) : bool;
````

## # Contributing
All form of contributions are welcome. You can [report issues](https://github.com/pattisahusiwa/php-assert/issues), fork the repo and submit pull request.

For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## # License
Released under [Apache-2.0 License](https://opensource.org/licenses/Apache-2.0). See [LICENSE](https://github.com/pattisahusiwa/php-assert/blob/master/LICENSE) file for more details.

````
   Copyright 2020 Asis Pattisahusiwa

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
````
