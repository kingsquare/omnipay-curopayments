<?php

namespace Omnipay\Curopayments;

use Omnipay\Tests\GatewayTestCase;

/**
 * Class IdealGatewayTest
 * @package Omnipay\Curopayments
 */
class IdealGatewayTest extends GatewayTestCase
{
	public function setUp()
	{
		parent::setUp();

		$this->gateway = new IdealGateway($this->getHttpClient(), $this->getHttpRequest());
	}

	public function testPurchase()
	{
		$request = $this->gateway->purchase(['amount' => '10.00']);

		$this->assertInstanceOf('Omnipay\Curopayments\Message\IdealPurchaseRequest', $request);
		$this->assertSame('10.00', $request->getAmount());
	}

	public function testFetchIssuers() {
		$this->markTestIncomplete('STill to do');
	}
}
