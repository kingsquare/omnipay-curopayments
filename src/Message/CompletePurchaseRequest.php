<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * Curopayments Complete Purchase Request
 */
class CompletePurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('siteId', 'hash', 'amount');

        $data = $this->httpRequest->request->all();
        $signature = isset($data['hash']) ? $data['hash'] : null;
        if ($this->generateSignature($data) !== $signature) {
            throw new InvalidRequestException('Incorrect signature');
        }
        return $data;
    }

	public function getData2() {
		$this->validate('siteId', 'hash', 'amount');

		$postedData = $this->httpRequest->request->all();
		$verifyHash = $this->generateVerificationSignature($postedData);

		if ($postedData['hash'] !== $verifyHash) {
			throw new InvalidRequestException('Incorrect signature');
		}
		return $postedData;
	}

    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}
