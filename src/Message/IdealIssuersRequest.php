<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments iDeal Purchase Request
 */
class IdealIssuersRequest extends AbstractRequest
{
    public $endpoint = 'https://gateway.cardgateplus.com/cache/idealDirectoryCUROPayments.xml';

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        $endpoint = $this->endpoint;
        $httpResponse = $this->httpClient->get($endpoint)->send();

        return $this->response = new IdealIssuersResponse($this, $httpResponse->xml());
    }
}
