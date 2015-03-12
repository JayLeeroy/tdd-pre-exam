<?php
namespace Kata;

class StringProcessorBo
{
	/**
	 * The data separator.
	 */
	const DATA_SEPARATOR               = ',';

	const OPTION_FIRST_LINE_AS_LABELS = '#useFirstLineAsLabels';

	const KEY_LABELS                  = 'labels';

	const KEY_DATA                    = 'data';

	/**
	 * Precess the string into array.
	 *
	 * @param string $string  The string data.
	 *
	 * @return array   The result array.
	 *
	 * @throws \InvalidArgumentException   If not string was given.
	 */
	public function processToArray($string)
	{
		if (!is_string($string)) {
			throw new \InvalidArgumentException();
		}

		if ($this->isTwoDimensionalStringData($string)) {
			$dataArray = $this->processTwoDimensionalStringData($string);
		} else {
			$dataArray = explode(self::DATA_SEPARATOR, $string);
		}

		return $dataArray;
	}

	/**
	 * The string is a two dimensional array or not.
	 *
	 * @param string $string   The string data.
	 *
	 * @return bool
	 */
	protected function isTwoDimensionalStringData($string)
	{
		return strpos($string, PHP_EOL) !== false;
	}

	/**
	 * Processing the two dimensional string.
	 *
	 * @param string $string   The two dimensional string.
	 *
	 * @return array
	 */
	protected function processTwoDimensionalStringData($string)
	{
		$firstDimensionalArray = $this->getFirstDimensionStringData($string);

		if ($firstDimensionalArray[0] === self::OPTION_FIRST_LINE_AS_LABELS)
		{
			$labelData = explode(self::DATA_SEPARATOR, $firstDimensionalArray[1]);

			unset($firstDimensionalArray[0], $firstDimensionalArray[1]);

			$dataArray = array(
				self::KEY_LABELS => $labelData,
				self::KEY_DATA   => $this->getSecondDimensionStringData($firstDimensionalArray),
			);
		}
		else
		{
			$dataArray = $this->getSecondDimensionStringData($firstDimensionalArray);
		}

		return $dataArray;
	}

	/**
	 * Gets a second dimensional text data.
	 *
	 * @param array $firstDimensionalArray   The fist dimensional data array.
	 *
	 * @return array
	 */
	protected function getSecondDimensionStringData($firstDimensionalArray)
	{
		$dataArray = array();

		foreach ($firstDimensionalArray as $firstDimensionalString)
		{
			$dataArray[] =  explode(self::DATA_SEPARATOR, $firstDimensionalString);
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
	protected function getFirstDimensionStringData($string)
	{
		return explode(PHP_EOL, $string);
	}
}
