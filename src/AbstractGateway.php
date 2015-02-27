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

	public function getWebsiteId()
	{
		return $this->getParameter('siteId');
	}

	public function setWebsiteId($value)
	{
		return $this->setParameter('siteId', $value);
	}

	public function getHash()
	{
		return $this->getParameter('hash');
	}

	public function setHash($value)
	{
		return $this->setParameter('hash', $value);
	}

	public function purchase(array $parameters = array())
	{
		$gatewayType = substr(get_class($this), 0 , -7);
		return $this->createRequest('\Omnipay\Curopayments\Message\\'.$gatewayType.'PurchaseRequest', $parameters);
	}

	public function completePurchase(array $parameters = array())
	{
		return $this->createRequest('\Omnipay\Curopayments\Message\CompletePurchaseRequest', $parameters);
	}
}
