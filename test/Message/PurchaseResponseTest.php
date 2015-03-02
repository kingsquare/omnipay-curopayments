<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Tests\TestCase;

class PurchaseResponseTest extends TestCase {

    public function testIsSuccessful()
    {
        $request = \Mockery::mock('\Omnipay\Curopayments\Message\AbstractRequest')->makePartial();
        $response = new PurchaseResponse($request, []);
        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isRedirect());
        $this->assertSame('https://gateway.cardgateplus.com/', $response->getRedirectUrl());
        $this->assertSame('POST', $response->getRedirectMethod());
    }
}