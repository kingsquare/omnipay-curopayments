<?php

namespace Omnipay\Curopayments;

/**
 * Curopayments iDeal Gateway
 * @package Omnipay\Curopayments
 */
class IdealGateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Curopayments iDeal';
    }

    /**
     * Retrieve iDEAL issuers.
     *
     * @param array $parameters An array of options
     *
     * @return \Omnipay\Curopayments\Message\idealIssuersRequest
     */
    public function fetchIssuers(array $parameters = [])
    {
        return $this->createRequest('Omnipay\Curopayments\Message\IdealIssuersRequest', $parameters);
    }
}
