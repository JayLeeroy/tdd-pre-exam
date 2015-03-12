<?php
namespace Kata;

class StringProcessorBo
{
	const DATA_SEPARATOR = ',';

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

		$firstDimensionalArray = $this->getFirstDimensionTextData($string);

		if (count($firstDimensionalArray) > 1)
		{
			$dataArray = array();

			foreach ($firstDimensionalArray as $firstDimensionalString)
			{
				$dataArray[] =  explode(self::DATA_SEPARATOR, $firstDimensionalString);
			}
		}
		else
		{
			$dataArray = explode(self::DATA_SEPARATOR, $string);
		}

		return $dataArray;
	}

	/**
	 * Gets a first dimensional text data.
	 *
	 * @param $string
	 *
	 * @return array
	 */
	protected function getFirstDimensionTextData($string)
	{
		return explode(PHP_EOL, $string);
	}
}
