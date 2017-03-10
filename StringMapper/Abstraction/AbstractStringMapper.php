<?php
declare(strict_types = 1);
namespace Msales\StringMapperBundle\StringMapper\Abstraction;

abstract class AbstractStringMapper implements StringMapperInterface
{
    /** @var array */
    private $map;

    /**
     * @param array $map
     */
    public function __construct(array $map)
    {
        $this->map = $map;
    }

    /**
     * @param string $string
     *
     * @return bool
     */
    protected function hasMapped(string $string): bool
    {
        return isset($this->map[$string]);
    }

    /**
     * @param string $string
     *
     * @return string
     */
    protected function getMapped(string $string): string
    {
        return $this->map[$string];
    }
}
