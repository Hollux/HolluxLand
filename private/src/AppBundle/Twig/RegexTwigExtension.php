<?php
namespace AppBundle\Twig;

class RegexTwigExtension extends \Twig_Extension
{
	protected $env;

	public function getName()
	{
		return 'Low Regex';
	}

	public function getFilters()
	{
        return [new \Twig_SimpleFilter('regex', [$this, 'regex'])];
	}

	public function getFunctions()
	{
        return [new \Twig_SimpleFunction('regex', [$this, 'regex'])];
	}

	public function initRuntime(\Twig_Environment $env)
	{
		$this->env = $env;
	}

	public function regex($var, $find = '', $replace = '')
	{
		if(is_string($var) && strlen($var)) {
			$var = preg_replace($find, $replace, $var);
		}

		return $var;
	}
}