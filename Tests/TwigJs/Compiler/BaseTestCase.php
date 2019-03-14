<?php

namespace JMS\TwigJsBundle\Tests\TwigJs\Compiler;

use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Twig\Source;
use TwigJs\JsCompiler;

abstract class BaseTestCase extends TestCase
{
    /**
     * @var Environment
     */
    protected $env;

    /**
     * @var JsCompiler
     */
    protected $compiler;

    /**
     * @param string $string
     * @return string
     * @throws \Twig\Error\SyntaxError
     */
    protected function compile($string)
    {
        $twigSource = new Source($string, md5($string));

        return $this->env->compileSource($twigSource);
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->env = $env = new Environment(new ArrayLoader());
        $env->setCompiler($this->compiler = new JsCompiler($env));
    }
}
