<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Tests\TestCase;

class CompletePurchaseResponseTest extends TestCase
{

    public function statusProvider() {
        return [
            [['cgpstatus' => 'pending', 'cgpstatusid' => '0', 'cgpref' => '5'], false, '0', 'pending', '5'],
            [['cgpstatus' => 'pending', 'cgpstatusid' => '100', 'cgpref' => '5'], false, '100', 'pending', '5'],
            [['cgpstatus' => 'pending', 'cgpstatusid' => '150', 'cgpref' => '5'], false, '150', 'pending', '5'],
            [['cgpstatus' => 'pending', 'cgpstatusid' => '200', 'cgpref' => '5'], true, '200', 'pending', '5'],
            [['cgpstatus' => 'pending', 'cgpstatusid' => '210', 'cgpref' => '5'], false, '210', 'pending', '5'],
            [['cgpstatus' => 'pending', 'cgpstatusid' => '700', 'cgpref' => '5'], false, '700', 'pending', '5'],
            [['cgpstatus' => 'pending', 'cgpstatusid' => '710', 'cgpref' => '5'], false, '710', 'pending', '5'],
            [['cgpstatus' => 'failed', 'cgpstatusid' => '300', 'cgpref' => '5'], false, '300', 'failed', '5'],
            [['cgpstatus' => 'failed', 'cgpstatusid' => '301', 'cgpref' => '5'], false, '301', 'failed', '5'],
            [['cgpstatus' => 'failed', 'cgpstatusid' => '310', 'cgpref' => '5'], false, '310', 'failed', '5'],
            [['cgpstatus' => 'failed', 'cgpstatusid' => '351', 'cgpref' => '5'], false, '351', 'failed', '5'],
            [['cgpstatus' => 'cancelled', 'cgpstatusid' => '305', 'cgpref' => '5'], false, '305', 'cancelled', '5'],
            [['cgpstatus' => 'cancelled', 'cgpstatusid' => '309', 'cgpref' => '5'], false, '309', 'cancelled', '5'],
            [['cgpstatus' => 'expired', 'cgpstatusid' => '308', 'cgpref' => '5'], false, '308', 'expired', '5'],
            [['cgpstatus' => 'expired', 'cgpstatusid' => '350', 'cgpref' => '5'], false, '350', 'expired', '5'],
        ];
    }

    /**
     * @dataProvider statusProvider
     */
    public function testReturnUrlStatus($data, $isSuccessfull, $code, $message, $reference)
    {
        $response = new CompletePurchaseResponse($this->getMockRequest(), $data);
        $this->assertSame($isSuccessfull, $response->isSuccessful());
        $this->assertSame($code, $response->getCode());
        $this->assertSame($message, $response->getMessage());
        $this->assertSame($reference, $response->getTransactionReference());
    }

    public function testEmpty()
    {
        $response = new CompletePurchaseResponse($this->getMockRequest(), []);
        $this->assertFalse($response->isSuccessful());
        $this->assertNull($response->getCode());
        $this->assertNull($response->getMessage());
        $this->assertNull($response->getTransactionReference());
    }
}
