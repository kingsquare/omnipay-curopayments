<?php

namespace Omnipay\Curopayments\Message;

use Mockery as m;
use Omnipay\Tests\TestCase;

class AbstractRequestTest extends TestCase {

	public function setUp()
	{
		$this->request = m::mock('\Omnipay\Curopayments\Message\AbstractRequest')->makePartial();
		$this->request->initialize(
			array(
				'siteKey' => 'web',
				'hashKey' => 'secret',
				'amount' => '12.00',
				'returnUrl' => 'https://www.example.com/return',
			)
		);
	}

	public function testGetData()
	{
		$this->request->initialize(array(
				'siteKey' => 'web',
				'hashKey' => 'secret',
				'amount' => '12.00',
				'currency' => 'EUR',
				'testMode' => true,
				'transactionId' => 13,
				'returnUrl' => 'https://www.example.com/return',
				'cancelUrl' => 'https://www.example.com/cancel',
		));
		$data = $this->request->getData();

		$this->assertSame('web', $data['Brq_siteKey']);
		$this->assertSame('12.00', $data['Brq_amount']);
		$this->assertSame('EUR', $data['Brq_currency']);
		$this->assertSame(13, $data['Brq_invoicenumber']);
		$this->assertSame('https://www.example.com/return', $data['Brq_return']);
		$this->assertSame('https://www.example.com/cancel', $data['Brq_returncancel']);
	}

	public function testGenerateSignature()
	{
		$this->request->setHashKey('secret');
		$data = array(

		);

		$expected = sha1('Brq_amount=bBrq_siteKey=asecret');
		$this->assertSame($expected, $this->request->generateSignature($data));
	}

	public function testGetEndpoint()
	{
		$this->assertStringStartsWith('https://gateway.cardgateplus.com/', $this->request->getEndpoint());
	}
}