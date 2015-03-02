<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Tests\TestCase;

class IdealIssuersRequestTest extends TestCase
{
    public function testGetData()
    {
        $request = new IdealIssuersRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->assertNull($request->getData());
    }

    public function testSendData()
    {
        $request = \Mockery::mock('\Omnipay\Curopayments\Message\IdealIssuersRequest')->makePartial();
        $response = \Mockery::mock('\Omnipay\Curopayments\Message\IdealIssuersResponse');

        $request->shouldReceive('getData')->once()->andReturn([]);
        $request->shouldReceive('sendData')->once()->with([])->andReturn($response);

        $this->assertSame($response, $request->send());
    }
}
