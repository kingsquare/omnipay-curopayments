<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Common\Exception\InvalidRequestException;

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
		$this->validate('siteId', 'hashKey', 'amount');

		$postedData = $this->httpRequest->request->all();
		$verifyHash = $this->generateVerificationSignature($postedData);

		if ($postedData['hash'] !== $verifyHash) {
			throw new InvalidRequestException('Incorrect signature');
		}
		return $postedData;
    }

	/**
	 * @inheritdoc
	 */
    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}
