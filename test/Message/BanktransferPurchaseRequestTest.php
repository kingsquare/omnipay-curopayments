<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Tests\TestCase;

class BanktransferPurchaseRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new BanktransferPurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize([
            'siteId' => '123',
            'secretKey' => 'secret',
            'amount' => '12.00',
            'ref' => 'test',
        ]);
    }

    public function testGetData()
    {
        $data = $this->request->getData();
        $this->assertSame('banktransfer', $data['option']);
    }
}
