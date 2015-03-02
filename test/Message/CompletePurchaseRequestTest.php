<?php

namespace Omnipay\Curopayments\Message;

use \Omnipay\Tests\TestCase;

class CompletePurchaseRequestTest extends TestCase
{

    public function setUp()
    {
        $this->request = new CompletePurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize([
            'secretKey' => 'secret',
            'siteId' => 'web',
            'currency' => 'EUR',
            'amount' => '12.00',
            'ref' => 'test',
            'testMode' => true,
            'returnUrl' => 'https://www.example.com/return',
        ]);
        $this->getHttpRequest()->request->replace([]);
    }

    public function testGetData()
    {
        $this->markTestIncomplete('still todo');
    }

    /**
     * @expectedException \Omnipay\Common\Exception\InvalidRequestException
     * @expectedExceptionMessage Incorrect signature
     */
    public function testGetDataInvalidSignature()
    {
        $this->markTestIncomplete('still todo');
    }

    /**
     * @expectedException \Omnipay\Common\Exception\InvalidRequestException
     * @expectedExceptionMessage Missing data
     */
    public function testGetDataMissingSignature()
    {
        $this->getHttpRequest()->request->replace([]);
        $this->request->getData();
    }

    public function testSendSuccess()
    {
        $this->markTestIncomplete('still todo');
    }

    public function testSendError()
    {
        $this->markTestIncomplete('still todo');
    }
}