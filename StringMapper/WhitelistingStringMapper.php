<?php
declare(strict_types = 1);
namespace Msales\StringMapperBundle\StringMapper;

use Msales\StringMapperBundle\StringMapper\Abstraction\AbstractStringMapper;
use Msales\StringMapperBundle\StringMapper\Exception\UnexpectedMapperValueException;

class WhitelistingStringMapper extends AbstractStringMapper
{
    /**
     * @param string $string
     *
     * @return string
     *
     * @throws UnexpectedMapperValueException
     */
    public function map(string $string): string
    {
        if (!$this->hasMapped($string)) {
            throw new UnexpectedMapperValueException(
                sprintf('String "%s" cannot be mapped. Please provide a valid mapping in map configuration.', $string)
            );
        }

        return $this->getMapped($string);
    }
}
