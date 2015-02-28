<?php

namespace Omnipay\Curopayments;

/**
 * Curopayments iDeal Gateway
 */
class IdealGateway extends AbstractGateway
{
    /**
     * {@inheritdoc}
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
    public function fetchIssuers(array $parameters = array())
    {
        return $this->createRequest('Omnipay\Curopayments\Message\IdealIssuersRequest', $parameters);
    }
}
