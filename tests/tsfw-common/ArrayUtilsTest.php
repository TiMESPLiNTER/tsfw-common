<?php

namespace test\StringUtils;
use timesplinter\tsfw\common\ArrayUtils;

/**
 * @author Pascal Muenst <dev@timesplinter.ch>
 * @copyright Copyright (c) 2014, TiMESPLiNTER Webdevelopment
 */
class ArrayUtilsTest extends \PHPUnit_Framework_TestCase
{
	public function testImplode()
	{
		$sampleArray = array(1, 2, 3, 4, 5);
		
		$this->assertEquals('12345', ArrayUtils::implode($sampleArray));
		$this->assertEquals('1, 2, 3, 4, 5', ArrayUtils::implode($sampleArray, ', '));
		$this->assertEquals('1, 2, 3, 4 and 5', ArrayUtils::implode($sampleArray, ', ', ' and '));
		$this->assertEquals('1 or 2, 3, 4, 5', ArrayUtils::implode($sampleArray, ', ', null, ' or '));
		$this->assertEquals('1 or 2, 3, 4 and 5', ArrayUtils::implode($sampleArray, ', ', ' and ', ' or '));
	}
	
	public function testIsAssociative()
	{
		$assocArray = array('foo', 2 => 'bar', 'baz' => 'baz');
		$sequentialArray = array(1 => 'foo', 'bar', 'baz');
		
		$this->assertEquals(true, ArrayUtils::isAssociative($assocArray));
		$this->assertEquals(false, ArrayUtils::isSequential($assocArray));
		
		$this->assertEquals(false, ArrayUtils::isAssociative($sequentialArray));
		$this->assertEquals(true, ArrayUtils::isSequential($sequentialArray));
	}
}

/* EOF */ 