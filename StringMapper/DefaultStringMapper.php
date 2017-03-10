<?php
declare(strict_types = 1);
namespace Msales\StringMapperBundle\StringMapper;

use Msales\StringMapperBundle\StringMapper\Abstraction\AbstractStringMapper;

class DefaultStringMapper extends AbstractStringMapper
{
    /**
     * @param string $string
     *
     * @return string
     */
    public function map(string $string): string
    {
        if ($this->hasMapped($string)) {
            return $this->getMapped($string);
        }

        return $string;
    }
}
