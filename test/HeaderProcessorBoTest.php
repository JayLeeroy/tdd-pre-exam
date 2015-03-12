<?php
/**
 * Created by PhpStorm.
 * User: balazs.rendak
 * Date: 2015-03-12
 * Time: 5:43 PM
 */

namespace Kata\Test;

use Kata\HeaderProcessorBo;

class HeaderProcessorBoTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var HeaderProcessorBo
	 */
	protected $headerProcessorBo;

	public function setUp()
	{
		$this->headerProcessorBo = new HeaderProcessorBo();
	}

	public function testIsHeader()
	{
		$this->assertTrue($this->headerProcessorBo->isHeader('#aaa'));
	}

	public function isHeaderDataProvider()
	{
		return array(
			array('#aaaaaa'),
			array('#dfoisehjgfweruihger9ig'),
		);
	}
}
