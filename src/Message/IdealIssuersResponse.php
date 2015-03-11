<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\FetchIssuersResponseInterface;
use Omnipay\Common\Issuer;

/**
 * Curopayments iDeal Issuers Response
 * @package Omnipay\Curopayments\Message
 */
class IdealIssuersResponse extends AbstractResponse implements FetchIssuersResponseInterface
{
    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return !empty($this->data);
    }

    /**
     * @return array
     */
    public function getIssuers()
    {
        $issuers = [];
        if (isset($this->data)) {
            foreach ($this->data as $issuer) {
                $issuers[] = new Issuer((string) $issuer['id'], (string) $issuer['name']);
            }
        }
        return $issuers;
    }
}
