<?php

namespace App;

require_once __DIR__.'/../vendor/autoload.php';

final class BigNumbersTest extends \PHPUnit\Framework\TestCase
{
    private BigNumbers $sut;

    public function setUp(): void
    {
        $this->sut = new BigNumbers();
    }


    public function dataProviderSmall(): array
    {
        return [
            'Small numbers, x = y' => ['1', '1', '2', '0', '1', '1', '1', '1'],
            'Small numbers, x < y' => ['2', '4', '6', '-2', '8', '2', '24', '16'],
            'Small numbers, x > y' => ['5', '3', '8', '2', '15', '120', '6', '125'],
        ];
    }

    public function dataProviderBig(): array
    {
        return
            [
                'Big numbers, x = y'  => ['50', '50', '100', '0', '2500', '30414093201713378043612608166064768844377641568960512000000000000',
                                          '30414093201713378043612608166064768844377641568960512000000000000',
                                          '8881784197001252323389053344726562500000000000000000000000000000000000000000000000000'],
                'Big numbers, x < y'  => ['12', '40', '52', '-28', '480', '479001600',
                                          '815915283247897734345611269596115894272000000000', '14697715679690864505827555550150426126974976'],
                'Big numbers, x > y'  => ['40', '1', '41', '39', '40', '815915283247897734345611269596115894272000000000', '1', '40'],
            ];
    }

    public function dataProviderAll(): array
    {
        return $this->dataProviderSmall() + $this->dataProviderBig();
    }

    /**
     * @dataProvider dataProviderAll
     */
    public function testAllFixed($x, $y, $sum, $diff, $multi, $factorial_x, $factorial_y, $pow): void
    {
        $this->assertSame($sum, $this->sut->sum($x, $y));
        $this->assertSame($diff, $this->sut->diff($x, $y));
        $this->assertSame($multi, $this->sut->multi($x, $y));
        $this->assertSame($factorial_x, $this->sut->factorial($x));
        $this->assertSame($factorial_y, $this->sut->factorial($y));
        $this->assertSame($pow, $this->sut->pow($x, $y));
        $this->assertSame($pow, $this->sut->pow2($x, $y));
    }

    /**
     * @dataProvider dataProviderSmall
     */
    public function testAllSmall($x, $y): void
    {
        $this->assertEquals($x + $y, $this->sut->sum($x, $y));
        $this->assertEquals($x - $y, $this->sut->diff($x, $y));
        $this->assertEquals($x * $y, $this->sut->multi($x, $y));
        $this->assertEquals(Math::factorial($x), $this->sut->factorial($x));
        $this->assertEquals(Math::factorial($y), $this->sut->factorial($y));
        $this->assertEquals(pow($x, $y), $this->sut->pow($x, $y));
        $this->assertEquals(pow($x, $y), $this->sut->pow2($x, $y));
    }
}
