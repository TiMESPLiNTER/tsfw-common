<?php

/**
 * @author Pascal Muenst <dev@timesplinter.ch>
 * @copyright Copyright (c) 2013, TiMESPLiNTER Webdevelopment
 * @version 1.0.0
 */

namespace timesplinter\common\test;

use timesplinter\tsfw\common\StringUtils;

class StringUtilsTest extends \PHPUnit_Framework_TestCase {

	public function testAfterFirst() {
		$this->assertSame(StringUtils::afterFirst('foo/bar', '/'), 'bar', 'Test 1');
		$this->assertSame(StringUtils::afterFirst('foo/', '/'), '', 'Test 2');
	}

	public function testBeforeFirst() {
		$this->assertSame(StringUtils::beforeFirst('foo/bar', '/'), 'foo', 'Test 1');
		$this->assertSame(StringUtils::beforeFirst('/bar', '/'), '', 'Test 2');
	}

	public function testBetween() {
		$this->assertSame(StringUtils::between('foobar', 'fo', 'ar'), 'ob', 'Test 1');
		$this->assertSame(StringUtils::between('foobar', 'fooba', ''), null, 'Test 2');
	}

	public function testInsertBeforeLast() {
		$this->assertSame(StringUtils::insertBeforeLast('foo bar', 'bar', 'test '), 'foo test bar', 'Test 1');
	}
}

/* EOF */