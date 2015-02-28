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
        return !empty($this->data);
    }

    /**
     * {@inheritdoc}
     */
    public function getIssuers()
    {
        $issuers = array();
        if (isset($this->data)) {
            foreach ($this->data as $issuer) {
                $issuers[] = new Issuer((string) $issuer['id'], (string) $issuer['name']);
            }
        }

        return $issuers;
    }
}
