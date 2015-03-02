<?php

namespace Omnipay\Curopayments;

use Omnipay\Common\AbstractGateway as OmnipayGateway;

/**
 * Curopayments Abastract Gateway
 */
abstract class AbstractGateway extends OmnipayGateway
{
    public function getDefaultParameters()
    {
        return [
            'siteId' => '',
            'secretKey' => '',
            'ref' => '',
            'testMode' => false,
        ];
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

    public function purchase(array $parameters = [])
    {
        $gatewayType = str_replace('Omnipay\Curopayments\\', '', substr(get_class($this), 0, -7));

        return $this->createRequest(
            '\Omnipay\Curopayments\Message\\' . $gatewayType . 'PurchaseRequest',
            $parameters
        );
    }

    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Curopayments\Message\CompletePurchaseRequest', $parameters);
    }
}
