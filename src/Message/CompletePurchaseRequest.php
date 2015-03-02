<?php

namespace Omnipay\Curopayments\Message;

use \Omnipay\Common\Exception\InvalidRequestException;

/**
 * Curopayments Complete Purchase Request
 */
class CompletePurchaseRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    public function getData()
    {
        $this->validate('currency', 'amount', 'ref');

        $postedData = $this->httpRequest->request->all();
        $verifyHash = $this->generateVerificationSignature($postedData);

        if ($postedData['hash'] !== $verifyHash) {
            throw new InvalidRequestException('Incorrect signature');
        }

        return $postedData;
    }

    /**
     * Verify the data came from Curopaymentss
     *
     * @param $data
     *
     * @return string
     */
    public function generateVerificationSignature($data)
    {
        return md5(
            (($this->getTestMode() && !empty($data['is_test']) && $data['is_test'] === '1') ? 'TEST' : '') .
            $data['transactionid'] .
            $data['currency'] .
            $data['amount'] .
            $data['ref'] .
            $data['status'] .
            $this->getSecretKey()
        );
    }

    /**
     * @inheritdoc
     */
    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}
