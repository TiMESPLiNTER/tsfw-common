<?php

namespace timesplinter\tsfw\common;

/**
 * @author Pascal Muenst <entwicklung@metanet.ch>
 * @copyright Copyright (c) 2015, METANET AG
 */
class ReflectionUtils
{
	/**
	 * Sets a value of a locked property from a specific class instance
	 * 
	 * @param object $obj
	 * @param string $property
	 * @param mixed $value
	 */
	public static function setLockedProperty($obj, $property, $value)
	{
		$refClass = new \ReflectionClass($obj);
		$propertyID = $refClass->getProperty($property);

		$propertyID->setAccessible(true);
		$propertyID->setValue($obj, $value);
		$propertyID->setAccessible(false);
	}

	/**
	 * Gets a value of a locked property from a specific class instance
	 *
	 * @param object $obj
	 * @param string $property
	 *
	 * @return mixed
	 */
	public static function getLockedProperty($obj, $property)
	{
		$refClass = new \ReflectionClass($obj);
		$propertyID = $refClass->getProperty($property);

		$propertyID->setAccessible(true);
		$value = $propertyID->getValue($obj);
		$propertyID->setAccessible(false);
		
		return $value;
	}
}

/* EOF */