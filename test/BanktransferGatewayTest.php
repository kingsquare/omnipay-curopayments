<?php

namespace Omnipay\Curopayments;

use Omnipay\Tests\GatewayTestCase;

class BankTransferGatewayTest extends GatewayTestCase
{
	public function setUp()
	{
		parent::setUp();

		$this->gateway = new BanktransferGateway($this->getHttpClient(), $this->getHttpRequest());
	}

	public function testPurchase()
	{
		$request = $this->gateway->purchase(['amount' => '10.00']);

		$this->assertInstanceOf('Omnipay\Curopayments\Message\BankTransferPurchaseRequest', $request);
		$this->assertSame('10.00', $request->getAmount());
	}
}
