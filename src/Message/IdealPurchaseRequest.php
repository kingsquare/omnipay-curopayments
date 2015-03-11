<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments iDeal Purchase Request
 * @package Omnipay\Curopayments\Message
 */
class IdealPurchaseRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'ideal';
        $data['suboption'] = $this->getIssuer();

        return $data;
    }
}
