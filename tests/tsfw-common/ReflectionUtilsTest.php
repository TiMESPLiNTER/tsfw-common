<?php

namespace test\common;

use timesplinter\tests\ReflectionUtilsTestClass;
use timesplinter\tsfw\common\ReflectionUtils;

/**
 * @author Pascal Muenst <dev@timesplinter.ch>
 * @copyright Copyright (c) 2014, TiMESPLiNTER Webdevelopment
 */
class ReflectionUtilsTest extends \PHPUnit_Framework_TestCase
{
	public function testGetLockedProperty()
	{
		$instance = new ReflectionUtilsTestClass();
		
		$value = ReflectionUtils::getLockedProperty($instance, 'id');
		
		$this->assertEquals(null, $value);
	}
	
	public function testSetLockedProperty()
	{
		$instance = new ReflectionUtilsTestClass();

		ReflectionUtils::setLockedProperty($instance, 'id', 5);

		$value = ReflectionUtils::getLockedProperty($instance, 'id');
		
		$this->assertEquals(5, $value);
	}
}

/* EOF */ 