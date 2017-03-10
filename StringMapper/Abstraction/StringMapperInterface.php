<?php
declare(strict_types = 1);
namespace Msales\StringMapperBundle\StringMapper\Abstraction;

interface StringMapperInterface
{
    /**
     * @param string $string
     *
     * @return string
     */
    public function map(string $string): string;
}
