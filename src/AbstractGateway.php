<?php

namespace Omnipay\Curopayments;

use Omnipay\Common\AbstractGateway as OmnipayGateway;

/**
 * Curopayments Abastract Gateway
 * @package Omnipay\Curopayments
 */
abstract class AbstractGateway extends OmnipayGateway
{
    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return [
            'siteId' => '',
            'secretKey' => '',
            'ref' => '',
            'testMode' => false,
        ];
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
     * @param array $parameters
     *
     * @return mixed
     */
    public function purchase(array $parameters = [])
    {
        $gatewayType = str_replace('Omnipay\Curopayments\\', '', substr(get_class($this), 0, -7));

        return $this->createRequest(
            '\Omnipay\Curopayments\Message\\' . $gatewayType . 'PurchaseRequest',
            $parameters
        );
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Curopayments\Message\CompletePurchaseRequest', $parameters);
    }
}
