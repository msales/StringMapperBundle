<?php
declare(strict_types = 1);
namespace Msales\StringMapperBundle\Tests\StringMapper;

use Msales\StringMapperBundle\StringMapper\Exception\UnexpectedMapperValueException;
use Msales\StringMapperBundle\StringMapper\WhitelistingStringMapper;
use PHPUnit\Framework\TestCase;

class WhitelistingStringMapperTest extends TestCase
{
    /**
     * @param array  $map
     * @param string $originalString
     * @param string $expectedString
     *
     * @test
     *
     * @dataProvider mappedStringProvider
     */
    public function mapsStrings(array $map, string $originalString, string $expectedString)
    {
        $stringMapper = $this->createMapper($map);

        $receivedString = $stringMapper->map($originalString);

        $this->assertEquals($expectedString, $receivedString, sprintf(
            'String "%s" should have been mapped into "%s", got "%s" instead.',
            $originalString,
            $expectedString,
            $receivedString
        ));
    }

    /**
     * @return array
     */
    public function mappedStringProvider(): array
    {
        return [
            [
                'map'            => [
                    'mapped-key' => 'mapped string',
                ],
                'originalString' => 'mapped-key',
                'expectedString' => 'mapped string',
            ],
            [
                'map'            => [
                    'key 1' => 'same value',
                    'key 2' => 'same value',
                ],
                'originalString' => 'key 1',
                'expectedString' => 'same value',
            ],
        ];
    }

    /**
     * @param array  $map
     * @param string $originalString
     *
     * @test
     *
     * @dataProvider unmappedStringProvider
     */
    public function throwsExceptionForUnmappedStrings(array $map, string $originalString)
    {
        $this->expectException(UnexpectedMapperValueException::class);

        $stringMapper = $this->createMapper($map);

        $stringMapper->map($originalString);
    }

    /**
     * @return array
     */
    public function unmappedStringProvider(): array
    {
        return [
            [
                'map'            => [
                    'mapped-key' => 'mapped string',
                ],
                'originalString' => 'not-mapped',
            ],
            [
                'map'            => [
                    'mapped-key' => 'mapped string',
                ],
                'originalString' => '',
            ],
            [
                'map'            => [],
                'originalString' => 'not-mapped',
            ],
        ];
    }

    /**
     * @param array $map
     *
     * @return WhitelistingStringMapper
     */
    private function createMapper(array $map): WhitelistingStringMapper
    {
        return new WhitelistingStringMapper($map);
    }
}
