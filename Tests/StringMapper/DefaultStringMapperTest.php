<?php
declare(strict_types = 1);
namespace Msales\StringMapperBundle\Tests\StringMapper;

use Msales\StringMapperBundle\StringMapper\DefaultStringMapper;
use PHPUnit\Framework\TestCase;

class DefaultStringMapperTest extends TestCase
{
    /**
     * @param array  $map
     * @param string $originalString
     * @param string $expectedString
     *
     * @test
     *
     * @dataProvider stringProvider
     */
    public function mapsStrings(array $map, string $originalString, string $expectedString)
    {
        $stringMapper = new DefaultStringMapper($map);

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
    public function stringProvider(): array
    {
        return [
            [
                'map'            => [
                    'mapped-key' => 'mapped string',
                ],
                'originalString' => 'not-mapped',
                'expectedString' => 'not-mapped',
            ],
            [
                'map'            => [
                    'mapped-key' => 'mapped string',
                ],
                'originalString' => 'mapped-key',
                'expectedString' => 'mapped string',
            ],
            [
                'map'            => [
                    'mapped-key' => 'mapped string',
                ],
                'originalString' => '',
                'expectedString' => '',
            ],
            [
                'map'            => [],
                'originalString' => 'not-mapped',
                'expectedString' => 'not-mapped',
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
}
