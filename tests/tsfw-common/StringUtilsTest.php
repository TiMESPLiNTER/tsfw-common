<?php

namespace test\common;

use timesplinter\tsfw\common\StringUtils;

/**
 * @author Pascal Muenst <dev@timesplinter.ch>
 * @copyright Copyright (c) 2013, TiMESPLiNTER Webdevelopment
 */
class StringUtilsTest extends \PHPUnit_Framework_TestCase
{
	public function testAfterFirst()
	{
		$this->assertSame(StringUtils::afterFirst('foo/bar', '/'), 'bar', 'Test 1');
		$this->assertSame(StringUtils::afterFirst('foo/', '/'), '', 'Test 2');
	}

	public function testBeforeFirst()
	{
		$this->assertSame(StringUtils::beforeFirst('foo/bar', '/'), 'foo', 'Test 1');
		$this->assertSame(StringUtils::beforeFirst('/bar', '/'), '', 'Test 2');
	}

	public function testBetween()
	{
		$this->assertSame(StringUtils::between('foobarbaz', 'foo', 'baz'), 'bar', 'Test 1');
		$this->assertSame(StringUtils::between('foobarbaz', 'fooba', ''), 'rbaz', 'Test 2');
		$this->assertSame(StringUtils::between('foobarbaz', 'foobar', 'baz'), '', 'Test 3');
		$this->assertSame(StringUtils::between('foobarbaz', '', 'baz'), 'foobar', 'Test 4');
	}

	public function testInsertBeforeLast()
	{
		$this->assertSame(StringUtils::insertBeforeLast('foo bar', 'bar', 'test '), 'foo test bar', 'Test 1');
	}

    public function testStartsWith()
    {
        $this->assertEquals(StringUtils::startsWith('foobar', 'f'), true, 'Test 1');
        $this->assertEquals(StringUtils::startsWith('foobar', 'o'), false, 'Test 2');
        $this->assertEquals(StringUtils::startsWith('foobar', 'fo'), true, 'Test 3');
        $this->assertEquals(StringUtils::startsWith('foobar', 'foobar'), true, 'Test 4');
    }

    public function testEndsWith()
    {
        $this->assertEquals(StringUtils::endsWith('foobar', 'f'), false, 'Test 1');
        $this->assertEquals(StringUtils::endsWith('foobar', 'a'), false, 'Test 2');
        $this->assertEquals(StringUtils::endsWith('foobar', 'ar'), true, 'Test 3');
        $this->assertEquals(StringUtils::endsWith('foobar', 'foobar'), true, 'Test 4');
    }

	public function testTokenize()
	{
		$this->assertEquals(StringUtils::tokenize('foobarbaz', 'a'), array(
			'foob', 'rb', 'z'
		), 'Test 1');

		$this->assertEquals(StringUtils::tokenize('foobarbaz', 'baz'), array(
			'foo', 'r'
		), 'Test 2');
	}

	public function testUrlify()
	{
		$this->assertEquals(StringUtils::urlify('!"#$%&\'()*+,/:'), '-no-dollar-percentage-and-plus-', 'Test #');
		$this->assertEquals(StringUtils::urlify('this is a string! a very long string', 16), 'this-is-a-string', 'Test maxLength');
	}

	public function testIsInt()
	{
		$this->assertEquals(false, StringUtils::isInt('foo'), 'Not an int but a string');
		$this->assertEquals(false, StringUtils::isInt('42.3'), 'Not an int but a float');
		$this->assertEquals(true, StringUtils::isInt('42'), 'An int');
	}

	public function testIsFloat()
	{
		$this->assertEquals(false, StringUtils::isFloat('foo'), 'Not a float but a string');
		$this->assertEquals(false, StringUtils::isFloat('42'), 'Not a float but an int');
		$this->assertEquals(true, StringUtils::isFloat('42.3'), 'A float');
	}
}

/* EOF */