<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Tests\TestCase;

class IdealIssuersResponseTest extends TestCase {

    /**
     *
     */
    public function testSuccess()
    {
        $response = new IdealIssuersResponse($this->getMockRequest(), $this->getBankOptions());

        $this->assertTrue($response->isSuccessful());
        $this->assertContainsOnlyInstancesOf('\Omnipay\Common\Issuer', $response->getIssuers());
    }

    public function testEmpty()
    {
        $response = new IdealIssuersResponse($this->getMockRequest(), []);
        $this->assertFalse($response->isSuccessful());
        $this->assertEmpty($response->getIssuers());
    }

    /**
     * Retrieve the opitions from curopayments
     * PHP Serialized: https://gateway.cardgateplus.com/cache/idealDirectoryCUROPayments.dat
     * JSON Serialized: https://gateway.cardgateplus.com/cache/idealDirectoryCUROPayments.json
     * XML (SEPA) Serialized: https://gateway.cardgateplus.com/cache/idealDirectoryCUROPayments.xml
     */
    private function getBankOptions() {
        return $this->getMockHttpResponse('IdealIssuersResponse.txt')->json();
    }
}
