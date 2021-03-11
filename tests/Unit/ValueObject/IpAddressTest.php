<?php declare(strict_types=1);

namespace MultiSafepay\Tests\Unit\ValueObject;

use MultiSafepay\Exception\InvalidArgumentException;
use MultiSafepay\ValueObject\IpAddress;
use PHPUnit\Framework\TestCase;

/**
 * Class IpAddressTest
 * @package MultiSafepay\Tests\Unit\ValueObject
 */
class IpAddressTest extends TestCase
{
    /**
     * Test whether a value could be set and used
     */
    public function testWhetherValueCanBeSetAndUsed()
    {
        $ipAddress = new IpAddress('10.0.0.1');
        $this->assertEquals('10.0.0.1', $ipAddress->get());
    }

    /**
     * Test whether a value could be set and used
     */
    public function testWhetherWrongValueCanNotBeSetAndUsed()
    {
        $this->expectException(InvalidArgumentException::class);
        new IpAddress('foobar');
    }

    /**
     * Test whether comma-separated values could be set and used
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Forwarded-For#examples
     */
    public function testWhetherCommaSeparatedValuesCanBeSetAndUsed()
    {
        $ipAddress = new IpAddress('203.0.113.195, 70.41.3.18, 150.172.238.178');
        $this->assertEquals('203.0.113.195', $ipAddress->get());
    }
}
