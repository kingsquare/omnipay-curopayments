<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments iDeal Purchase Request
 * @package Omnipay\Curopayments\Message
 */
class IdealIssuersRequest extends AbstractRequest
{
    /**
     * @var string
     */
    public $endpoint = 'https://gateway.cardgateplus.com/cache/idealDirectoryCUROPayments.json';

    /**
     * @return null
     */
    public function getData()
    {
        return null;
    }

    /**
     * @param mixed $data
     *
     * @return IdealIssuersResponse
     */
    public function sendData($data)
    {
        $endpoint = $this->endpoint;
        $httpResponse = $this->httpClient->get($endpoint)->send();

        return new IdealIssuersResponse($this, $httpResponse->json());
    }
}
