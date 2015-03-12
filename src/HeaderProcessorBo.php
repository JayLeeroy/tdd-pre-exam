<?php

namespace Kata;

class HeaderProcessorBo
{
	public function isHeader($string)
	{
		return strpos($string, '#') === 0;
	}

	public function getHeaderParams($string)
	{

	}
}
