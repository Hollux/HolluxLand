<?php
namespace AppBundle\Twig;

class SlugifyTwig extends \Twig_Extension
{
	public function getFilters()
	{
		return [new \Twig_SimpleFilter('slugify', [$this, 'createUrl']),];
	}

	public function getName()
	{
		return 'app_extensionSlug';
	}

	const LOWERCASE_NUMBERS_DASHES = '/([^A-Za-z0-9]|-)+/';

	public function createUrl2($string)
	{
		$string = $string.'tototototo';

		return $string;
	}

public
function createUrl($string)
{
	if(is_string($string)) {
		//nettoie le string
		$string = strtr($string, $this->defautEncoder);
		$url    = preg_replace(self::LOWERCASE_NUMBERS_DASHES, '-', $string);
	}
	else {
		return false;
	}

	return $url;
}

protected
$defautEncoder =
	['°' => '0', '¹' => '1', '²' => '2', '³' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8',
	 '?' => '9', '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7',
	 '8' => '8', '9' => '9', 'æ' => 'ae', '?' => 'ae', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Å' => 'AA',
	 '?' => 'A', 'A' => 'A', 'A' => 'A', 'Æ' => 'AE', '?' => 'AE', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
	 'å' => 'aa', '?' => 'a', 'a' => 'a', 'a' => 'a', 'ª' => 'a', '@' => 'at', 'C' => 'C', 'C' => 'C', 'Ç' => 'C',
	 'ç' => 'c', 'c' => 'c', 'c' => 'c', '©' => 'c', 'Ð' => 'Dj', 'Ð' => 'D', 'ð' => 'dj', 'd' => 'd', 'È' => 'E',
	 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'E' => 'E', 'E' => 'E', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
	 'e' => 'e', 'e' => 'e', 'ƒ' => 'f', 'G' => 'G', 'G' => 'G', 'g' => 'g', 'g' => 'g', 'H' => 'H', 'H' => 'H',
	 'h' => 'h', 'h' => 'h', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'I' => 'I', 'I' => 'I', 'I' => 'I',
	 'I' => 'I', '?' => 'IJ', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'i' => 'i', 'i' => 'i', 'i' => 'i',
	 'i' => 'i', '?' => 'ij', 'J' => 'J', 'j' => 'j', 'L' => 'L', 'L' => 'L', '?' => 'L', 'l' => 'l', 'l' => 'l',
	 '?' => 'l', 'Ñ' => 'N', 'ñ' => 'n', '?' => 'n', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'O' => 'O',
	 'O' => 'O', 'O' => 'O', 'O' => 'O', 'O' => 'O', 'Ø' => 'OE', '?' => 'O', 'Œ' => 'OE', 'ò' => 'o', 'ó' => 'o',
	 'ô' => 'o', 'õ' => 'o', 'o' => 'o', 'o' => 'o', 'o' => 'o', 'o' => 'o', 'o' => 'o', 'ø' => 'oe', '?' => 'o',
	 'º' => 'o', 'œ' => 'oe', 'R' => 'R', 'R' => 'R', 'r' => 'r', 'r' => 'r', 'S' => 'S', '?' => 'S', 's' => 's',
	 '?' => 's', '?' => 's', 'T' => 'T', '?' => 'T', 'T' => 'T', 'Þ' => 'TH', 't' => 't', '?' => 't', 't' => 't',
	 'þ' => 'th', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'U' => 'U', 'U' => 'U', 'U' => 'U', 'U' => 'U',
	 'U' => 'U', 'U' => 'U', 'U' => 'U', 'U' => 'U', 'U' => 'U', 'U' => 'U', 'ù' => 'u', 'ú' => 'u', 'û' => 'u',
	 'ü' => 'u', 'u' => 'u', 'u' => 'u', 'u' => 'u', 'u' => 'u', 'u' => 'u', 'u' => 'u', 'u' => 'u', 'u' => 'u',
	 'u' => 'u', 'u' => 'u', 'W' => 'W', 'w' => 'w', 'Ý' => 'Y', 'Ÿ' => 'Y', 'Y' => 'Y', 'ý' => 'y', 'ÿ' => 'y',
	 'y' => 'y',];
}