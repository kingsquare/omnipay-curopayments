<?php

namespace Omnipay\Curopayments;

/**
 * Curopayments Abastract Gateway
 */
abstract class AbstractGateway extends \Omnipay\Common\AbstractGateway
{
    public function getDefaultParameters()
    {
        return array(
                'siteId' => '',
                'hashKey' => '',
                'testMode' => false,
        );
    }

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

    public function purchase(array $parameters = array())
    {
        $gatewayType = str_replace('Omnipay\Curopayments\\', '', substr(get_class($this), 0, -7));

        return $this->createRequest('\Omnipay\Curopayments\Message\\' . $gatewayType . 'PurchaseRequest',
                $parameters)->send();
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Curopayments\Message\CompletePurchaseRequest', $parameters);
    }
}
