<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments Abstract Request
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    public $endpoint = 'https://gateway.cardgateplus.com/';

    public function getSiteId()
    {
        return $this->getParameter('siteId');
    }

    public function setSiteId($value)
    {
        return $this->setParameter('siteId', $value);
    }

    public function getHash()
    {
        return $this->getParameter('hash');
    }

    public function setHash($value)
    {
        return $this->setParameter('hash', $value);
    }

    public function getRef()
    {
        return $this->getParameter('ref');
    }

    public function setRef($value)
    {
        return $this->setParameter('ref', $value);
    }

    public function getData()
    {
        $this->validate('siteId', 'hash', 'amount', 'ref');

        $data = array();
//        $data['Brq_websitekey'] = $this->getWebsiteKey();
//        $data['Brq_amount'] = $this->getAmount();
//        $data['Brq_currency'] = $this->getCurrency();
//        $data['Brq_invoicenumber'] = $this->getTransactionId();
//        $data['Brq_description'] = $this->getDescription();
//        $data['Brq_return'] = $this->getReturnUrl();
//        $data['Brq_returncancel'] = $this->getCancelUrl();

        return $data;
    }

    public function generateSignature($data)
    {
		return md5( ($this->getTestMode() ? 'TEST':'') .
				$this->getSiteId() .
				$this->getAmount() .
				$this->getRef() .
				$this->getHash()
		);
    }

    public function generateVerificationSignature($data)
    {
		return md5(
				(($this->getTestMode() && !empty($data['is_test']) && $data['is_test'] === '1') ? 'TEST' : '') .
				$data['transactionid'] .
				$data['currency'] .
				$data['amount'] .
				$data['ref'] .
				$data['status'] .
				$this->getHash()
		);
    }

    public function sendData($data)
    {
        $data['hash'] = $this->generateSignature($data);

        return $this->response = new PurchaseResponse($this, $data);
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }
}
