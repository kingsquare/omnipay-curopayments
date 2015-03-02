<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayRequest;

/**
 * Curopayments Abstract Request
 */
abstract class AbstractRequest extends OmnipayRequest
{
    /**
     * @var string
     */
    public $endpoint = 'https://gateway.cardgateplus.com/';

    private $returnUrlFailed = '';

    public function setReturnUrlFailed($value)
    {
        $this->returnUrlFailed = $value;
    }

    public function getReturnUrlFailed()
    {
        return $this->returnUrlFailed ?: $this->getReturnUrl();
    }

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

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        $this->validate('siteId', 'secretKey', 'amount', 'ref');

        $data = [];
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
        $data['test'] = (int) $this->getTestMode();

        return $data;
    }

    /**
     * Generate a signature for outoing requests
     */
    public function generateSignature()
    {
        return md5(
            ($this->getTestMode() ? 'TEST' : '')
            . $this->getSiteId()
            . $this->getAmountInteger()
            . $this->getRef()
            . $this->getSecretKey()
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

    public function getEndpoint()
    {
        return $this->endpoint;
    }
}
