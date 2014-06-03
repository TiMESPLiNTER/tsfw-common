<?php

namespace timesplinter\tsfw\common;

/**
 * Some useful functions for array operations
 * @package ch\timesplinter\common
 *
 * @author Pascal Muenst <dev@timesplinter.ch>
 * @copyright Copyright (c) 2013, TiMESPLiNTER Webdevelopment
 */
class ArrayUtils {
	/**
	 * Returns the values from a single column of the input array, identified by the column_key. Optionally, you may
	 * provide an index_key to index the values in the returned array by the values from the index_key column in the
	 * input array. This method uses the native array_column function of PHP if it exists and else it implements an
	 * own way to achieve the same result (before PHP 5.5.0)
	 * (Based on: https://github.com/ramsey/array_column/blob/master/src/array_column.php)
	 * @param array $input A multi-dimensional array (record set) from which to pull a column of values.
	 * @param mixed $column_key The column of values to return. This value may be the integer key of the column you
	 * wish to retrieve, or it may be the string key name for an associative array. It may also be NULL to return
	 * complete arrays (useful together with index_key to reindex the array).
	 * @param mixed $index_key The column to use as the index/keys for the returned array. This value may be the integer
	 * key of the column, or it may be the string key name.
	 * @return array Returns an array of values representing a single column from the input array.
	 */
	public static function arrayColumn($input = null, $column_key = null, $index_key = null) {
		if(function_exists('array_column') === true)
			return array_column($input, $column_key, $index_key);

		// Using func_get_args() in order to check for proper number of
		// parameters and trigger errors exactly as the built-in array_column()
		// does in PHP 5.5.
		$params = func_get_args();

		if (!array_key_exists(0, $params)) {
			trigger_error('array_column() expects at least 2 parameters, 0 given', E_USER_WARNING);
			return null;
		} elseif (!array_key_exists(1, $params)) {
			trigger_error('array_column() expects at least 2 parameters, 1 given', E_USER_WARNING);
			return null;
		}

		if (!is_array($params[0])) {
			trigger_error('array_column() expects parameter 1 to be array, ' . gettype($params[0]) . ' given', E_USER_WARNING);
			return null;
		}

		if (!is_int($params[1])
			&& !is_float($params[1])
			&& !is_string($params[1])
			&& $params[1] !== null
			&& !(is_object($params[1]) && method_exists($params[1], '__toString'))
		) {
			trigger_error('array_column(): The column key should be either a string or an integer', E_USER_WARNING);
			return false;
		}

		if (isset($params[2])
			&& !is_int($params[2])
			&& !is_float($params[2])
			&& !is_string($params[2])
			&& !(is_object($params[2]) && method_exists($params[2], '__toString'))
		) {
			trigger_error('array_column(): The index key should be either a string or an integer', E_USER_WARNING);
			return false;
		}

		$paramsInput = $params[0];
		$paramsColumnKey = ($params[1] !== null) ? (string) $params[1] : null;

		$paramsIndexKey = null;
		if (isset($params[2])) {
			if (is_float($params[2]) || is_int($params[2])) {
				$paramsIndexKey = (int) $params[2];
			} else {
				$paramsIndexKey = (string) $params[2];
			}
		}

		$resultArray = array();

		foreach ($paramsInput as $row) {

			$key = $value = null;
			$keySet = $valueSet = false;

			if ($paramsIndexKey !== null && array_key_exists($paramsIndexKey, $row)) {
				$keySet = true;
				$key = (string) $row[$paramsIndexKey];
			}

			if ($paramsColumnKey === null) {
				$valueSet = true;
				$value = $row;
			} elseif (is_array($row) && array_key_exists($paramsColumnKey, $row)) {
				$valueSet = true;
				$value = $row[$paramsColumnKey];
			}

			if ($valueSet) {
				if ($keySet) {
					$resultArray[$key] = $value;
				} else {
					$resultArray[] = $value;
				}
			}

		}

		return $resultArray;
	}
}

/* EOF */