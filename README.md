tsfw-common
===========
This framework component deals with everyday operations for strings, arrays, other scalar data types and even some classes.

[![Latest Stable Version](https://poser.pugx.org/timesplinter/tsfw-common/v/stable.svg)](https://packagist.org/packages/timesplinter/tsfw-common)
[![Build Status](https://travis-ci.org/TiMESPLiNTER/tsfw-common.svg)](https://travis-ci.org/TiMESPLiNTER/tsfw-common)

StringUtils
-----------
* **afterFirst** - Returns a substring after first occurrence of a string
* **afterLast** - Returns a substring after last occurrence of a string
* **between** - Returns a substring between two strings 
* **beforeFirst** - Returns a substring before first occurrence of a string
* **beforeLast** - Returns a substring before last occurrence of a string
* **endsWith** - Checks if a string ends with a specific substring
* **insertBefore** - Inserts a string before a specific substring
* **insertAfter** - Inserts a string after a specific substring
* **startsWith** - Checks if a string starts with a specific substring
* **tokenize** - Returns an array of tokens from a string
* **urlify** - Converts a string to a URL friendly representation

ArrayUtils
----------
* **arrayColumn** - User-land implementation of PHP 5.5s `array_column()` function
* **implode** - Improvement of the PHP built-in `implode()` function
* **isAssociative** - Checks if the array is associative (some keys type is string)
* **isSequential** - Checks if an array is sequential (numeric keys only)

JsonUtils
---------
* **decode**
* **decodeFile**
* **minify**

ReflectionUtils
---------------
* **getLockedProperty** - Gets a value of a locked property from a specific class instance
* **setLockedProperty** - Sets a value of a locked property from a specific class instance