<?php

namespace Omnipay\Curopayments\Message;

use Mockery as m;
use Omnipay\Tests\TestCase;

class AbstractRequestTest extends TestCase {

	public function setUp()
	{
		$this->request = m::mock('\Omnipay\Curopayments\Message\AbstractRequest')->makePartial();
		$this->request->initialize([
            'secretKey' => 'secret',
            'siteId' => 'web',
            'currency' => 'EUR',
            'amount' => '12.00',
            'ref' => 'test',
            'testMode' => true,
            'returnUrl' => 'https://www.example.com/return',
            'returnUrlFailed' => 'https://www.example.com/return_failed',
        ]);
	}

	public function testGetData()
	{
		$data = $this->request->getData();

		$this->assertSame('web', $data['siteid']);
		$this->assertSame(1200, $data['amount']);
		$this->assertSame('EUR', $data['currency']);
		$this->assertSame('test', $data['ref']);
		$this->assertSame('https://www.example.com/return', $data['return_url']);
		$this->assertSame('https://www.example.com/return_failed', $data['return_url_failed']);
	}

	public function testGenerateSignature()
	{
        $expected = md5('TEST' . 'web' . 1200 . 'test' . 'secret');
		$this->assertSame($expected, $this->request->generateSignature());
	}

	public function testGetEndpoint()
	{
		$this->assertStringStartsWith('https://gateway.cardgateplus.com/', $this->request->getEndpoint());

	}

    public function testReturnUrlFailedFallsBackToReturnUrl() {
        $request = m::mock('\Omnipay\Curopayments\Message\AbstractRequest')->makePartial();
        $request->initialize([
                'secretKey' => 'secret',
                'siteId' => 'web',
                'currency' => 'EUR',
                'amount' => '12.00',
                'ref' => 'test',
                'testMode' => true,
                'returnUrl' => 'https://www.example.com/return',
        ]);
        $this->assertSame('https://www.example.com/return', $request->getReturnUrlFailed());
    }
}