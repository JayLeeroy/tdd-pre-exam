<?php
namespace Kata;

class StringProcessorBo
{
	/**
	 * Precess the string into array.
	 *
	 * @param $string
	 *
	 * @return array
	 *
	 * @throws \InvalidArgumentException
	 */
	public function processToArray($string)
	{
		if(!is_string($string))
		{
			throw new \InvalidArgumentException();
		}

		return explode(',', $string);
	}
}
