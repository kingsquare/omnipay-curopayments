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

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
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
        $this->validate('siteId', 'secretKey', 'amount', 'ref');

        $data = array();
        $data['ref'] = $this->getRef();
        $data['language'] = $this->getLanguage();
        $data['siteid'] = $this->getSiteId();
        $data['amount'] = $this->getAmountInteger();
        $data['currency'] = $this->getCurrency();
        $data['description'] = $this->getDescription();
        $data['return_url'] = $this->getReturnUrl();
        $data['return_url_failed'] = $this->getReturnUrlFailed();
        $data['language'] = $this->getLanguage();
        $data['ip_address'] = $this->getClientIp();
        $data['test'] = $this->getTestMode();

        return $data;
    }

    /**
     * Generate a signature for outoing requests
     */
    public function generateSignature($data)
    {
        return md5(
            ($this->getTestMode() ? 'TEST' : '')
            . $this->getSiteId()
            . $this->getAmount()
            . $this->getRef()
            . $this->getSecretKey()
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
            $this->getSecretKey()
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
