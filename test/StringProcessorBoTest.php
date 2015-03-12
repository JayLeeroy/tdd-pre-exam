<?php
/**
 * Created by PhpStorm.
 * User: balazs.rendak
 * Date: 2015-03-12
 * Time: 4:01 PM
 */

namespace Kata\Test;

use Kata\StringProcessorBo;

/**
 * StringProcessorBo tester class.
 *
 * Class StringProcessorBoTest
 * @package Kata\Test
 */
class StringProcessorBoTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * The string processor business object.
	 *
	 * @var StringProcessorBo
	 */
	protected $stringProcessor;

	/**
	 * Sets up the fixture, for example, open a network connection.
	 * This method is called before a test is executed.
	 *
	 */
	public function setUp()
	{
		$this->stringProcessor = new StringProcessorBo();
	}

	/**
	 * Test the process to array function.
	 *
	 * @param string $string           The string data to process.
	 * @param array  $expectedResult   The expected result during the test.
	 *
	 * @dataProvider processToArrayDataProvider
	 */
	public function testProcessToArray($string, $expectedResult)
	{
		$returnedValue = $this->stringProcessor->processToArray($string);

		$this->assertEquals($expectedResult, $returnedValue);
	}

	/**
	 * Process to array  data provider.
	 *
	 * @return array
	 */
	public function processToArrayDataProvider()
	{
		return array(
			array(
				'a,b,c',
				array('a','b','c')
			),
			array(
				'100,982,444,990,1',
				array(100,982,444,990,1)
			),
			array(
				'Mark,Anthony,marka@lib.de',
				array('Mark', 'Anthony', 'marka@lib.de')
			)
		);
	}


	/**
	 * Test invalid parameter at process to array.
	 *
	 * @dataProvider invalidArgumentAtProcessToArrayDataProvider
	 *
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidArgumentAtProcessToArray($data)
	{
		$this->stringProcessor->processToArray($data);
	}

	/**
	 * Invalid parameter at process data provider.
	 *
	 * @return array
	 */
	public function invalidArgumentAtProcessToArrayDataProvider()
	{
		return array(
			array(1234),
			array(array()),
		);
	}

	/**
	 * Test two dimensional text the process to array function.
	 *
	 * @param string $string           The string data to process.
	 * @param array  $expectedResult   The expected result during the test.
	 *
	 * @dataProvider processTwoDimensionalTexDataToArrayDataProvider
	 */
	public function testProcessTwoDimensionalTexDataToArray($string, $expectedResult)
	{
		$returnedValue = $this->stringProcessor->processToArray($string);

		$this->assertEquals($expectedResult, $returnedValue);
	}

	/**
	 * Process two dimensional text to array  data provider.
	 *
	 * @return array
	 */
	public function processTwoDimensionalTexDataToArrayDataProvider()
	{
		return array(
			array(
				'a,b,c' . PHP_EOL . '100,982,444,990,1',
				array(array('a', 'b', 'c'), array(100, 982, 444, 990, 1))
			),
			array(
				'Mark,Anthony,marka@lib.de' . PHP_EOL . '100,982',
				array(array('Mark', 'Anthony' ,'marka@lib.de'), array(100, 982))
			),
		);
	}
}
