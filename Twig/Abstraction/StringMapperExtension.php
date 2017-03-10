<?php
declare(strict_types = 1);
namespace Msales\StringMapperBundle\Twig\Abstraction;

use Msales\StringMapperBundle\StringMapper\Abstraction\StringMapperInterface;
use Twig_Extension;

abstract class StringMapperExtension extends Twig_Extension
{
    /** @var StringMapperInterface */
    private $stringMapper;

    /**
     * @param StringMapperInterface $stringMapper
     */
    public function __construct(StringMapperInterface $stringMapper)
    {
        $this->stringMapper = $stringMapper;
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public function map(string $string): string
    {
        return $this->stringMapper->map($string);
    }
}
