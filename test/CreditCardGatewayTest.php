<?php

namespace Omnipay\Curopayments;

use Omnipay\Tests\GatewayTestCase;

class CreditCardGatewayTest extends GatewayTestCase
{
	public function setUp()
	{
		parent::setUp();

		$this->gateway = new CreditCardGateway($this->getHttpClient(), $this->getHttpRequest());
	}

	public function testPurchase()
	{
		$request = $this->gateway->purchase(['amount' => '10.00']);

		$this->assertInstanceOf('Omnipay\Curopayments\Message\CreditCardPurchaseRequest', $request);
		$this->assertSame('10.00', $request->getAmount());
	}

	public function testPurchaseReturn()
	{
		$request = $this->gateway->completePurchase(['amount' => '10.00']);

		$this->assertInstanceOf('Omnipay\Curopayments\Message\CompletePurchaseRequest', $request);
		$this->assertSame('10.00', $request->getAmount());
	}
}
