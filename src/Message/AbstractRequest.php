<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayRequest;

/**
 * Curopayments Abstract Request
 * @package Omnipay\Curopayments\Message
 */
abstract class AbstractRequest extends OmnipayRequest
{
    /**
     * @var string
     */
    public $endpoint = 'https://gateway.cardgateplus.com/';

    /**
     * @var string
     */
    private $returnUrlFailed = '';

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setReturnUrlFailed($value)
    {
        $this->returnUrlFailed = $value;
    }

    /**
     * @return mixed
     */
    public function getReturnUrlFailed()
    {
        return $this->returnUrlFailed ?: $this->getReturnUrl();
    }

    /**
     * @return mixed
     */
    public function getSiteId()
    {
        return $this->getParameter('siteId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSiteId($value)
    {
        return $this->setParameter('siteId', $value);
    }

    /**
     * @return mixed
     */
    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->getParameter('ref');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRef($value)
    {
        return $this->setParameter('ref', $value);
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    /**
     * @return array
     * @throws \Omnipay\Common\Exception\InvalidRequestException
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
     * @param mixed $data
     *
     * @return PurchaseResponse
     */
    public function sendData($data)
    {
        $data['hash'] = $this->generateSignature();

        return new PurchaseResponse($this, $data);
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }
}
