<?php

namespace Omnipay\Curopayments\Message;

use \Omnipay\Common\Exception\InvalidRequestException;

/**
 * Curopayments Complete Purchase Request
 * @package Omnipay\Curopayments\Message
 */
class CompletePurchaseRequest extends AbstractRequest
{
    /**
     * @return array
     * @throws InvalidRequestException
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
     * @throws InvalidRequestException
     */
    public function generateVerificationSignature($data)
    {
        if (empty($data)) {
            throw new InvalidRequestException('Missing data');
        }

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
     * @param mixed $data
     *
     * @return CompletePurchaseResponse
     */
    public function sendData($data)
    {
        return new CompletePurchaseResponse($this, $data);
    }
}
