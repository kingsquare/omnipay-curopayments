<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Tests\TestCase;

class IdealIssuersRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = \Mockery::mock('\Omnipay\Curopayments\Message\IdealIssuersRequest')->makePartial();
    }

    public function testGetData()
    {
        $this->assertNull($this->request->getData());
    }

    public function testSendData()
    {
        $response = \Mockery::mock('\Omnipay\Curopayments\Message\IdealIssuersResponse');

        $this->request->shouldReceive('getData')->once()->andReturn([]);
        $this->request->shouldReceive('sendData')->once()->with([])->andReturn($response);

        $this->assertSame($response, $this->request->send());
    }
}
