<?php

use PHPUnit\Framework\TestCase;
use Sirmerdas\IpHelper\IpTools;

class IpToolTest extends TestCase
{

    public function test_verifyIpV4()
    {
        $this->assertTrue(IpTools::verifyIpV4("127.0.0.1"));
    }

    public function test_verifyIpV6()
    {
        $this->assertTrue(IpTools::verifyIpV6("::1"));
    }


    public function test_fakeIpV4()
    {
        $this->assertTrue(IpTools::verifyIpV4(IpTools::fakeIpV4()));
    }

    public function test_fakeIpV6()
    {
        $this->assertTrue(IpTools::verifyIpV6(IpTools::fakeIpV6()));
    }
}
