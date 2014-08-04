<?php

namespace test\StringUtils;
use timesplinter\tsfw\common\ArrayUtils;

/**
 * @author Pascal Muenst <dev@timesplinter.ch>
 * @copyright Copyright (c) 2014, TiMESPLiNTER Webdevelopment
 */
class ArrayUtilsTest extends \PHPUnit_Framework_TestCase {
	public function testImplode()
	{
		$sampleArray = array(1, 2, 3, 4, 5);
		
		$this->assertEquals('12345', ArrayUtils::implode($sampleArray));
		$this->assertEquals('1, 2, 3, 4, 5', ArrayUtils::implode($sampleArray, ', '));
		$this->assertEquals('1, 2, 3, 4 and 5', ArrayUtils::implode($sampleArray, ', ', ' and '));
		$this->assertEquals('1 or 2, 3, 4, 5', ArrayUtils::implode($sampleArray, ', ', null, ' or '));
		$this->assertEquals('1 or 2, 3, 4 and 5', ArrayUtils::implode($sampleArray, ', ', ' and ', ' or '));
	}
}

/* EOF */ 