<?php

namespace JMS\TwigJsBundle\Tests\TwigJs\Compiler;

use PHPUnit\Framework\TestCase;
use TwigJs\JsCompiler;

abstract class BaseTestCase extends TestCase
{
    /**
     * @var \Twig_Environment
     */
    protected $env;

    /**
     * @var JsCompiler
     */
    protected $compiler;

    /**
     * @param string $string
     * @return string
     * @throws \Twig_Error_Syntax
     */
    protected function compile($string)
    {
        $twigSource = new \Twig_Source($string, md5($string));

        return $this->env->compileSource($twigSource);
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->env = $env = new \Twig_Environment(new \Twig_Loader_Array());
        $env->setCompiler($this->compiler = new JsCompiler($env));
    }
}
