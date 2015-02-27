<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\FetchIssuersResponseInterface;
use Omnipay\Common\Issuer;

class IdealIssuersResponse extends AbstractResponse implements FetchIssuersResponseInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function isSuccessful()
	{
		return !empty($this->data->directory->Country);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getIssuers()
	{
		$issuers = array();
		if (isset($this->data->directory->Country)) {
			foreach ($this->data->directory->Country->issuer as $issuer) {
				$issuers[] = new Issuer((string) $issuer->issuerID, (string) $issuer->issuerName);
			}
		}
		return $issuers;
	}
}