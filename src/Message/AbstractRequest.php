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

    public function getHashKey()
    {
        return $this->getParameter('hashKey');
    }

    public function setHashKey($value)
    {
        return $this->setParameter('hashKey', $value);
    }

    public function getRef()
    {
        return $this->getParameter('ref');
    }

    public function setRef($value)
    {
        return $this->setParameter('ref', $value);
    }

    /**
     * @inheritdoc
     */
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

    /**
     * Generate a signature for outoing requests
     */
    public function generateSignature($data)
    {
        return md5(($this->getTestMode() ? 'TEST' : '') .
                $this->getSiteId() .
                $this->getAmount() .
                $this->getRef() .
                $this->getHashKey()
        );
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
                $this->getHashKey()
        );
    }

    /**
     * @inheritdoc
     */
    public function sendData($data)
    {
        $data['hash'] = $this->generateSignature($data);

        return $this->response = new PurchaseResponse($this, $data);
    }

    /**
     * @inheritdoc
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }
}
