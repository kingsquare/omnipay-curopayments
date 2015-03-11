<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments Bank transfer Purchase Request
 * @package Omnipay\Curopayments\Message
 */
class BanktransferPurchaseRequest extends AbstractRequest
{
    /**
     * @return array
     */
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'banktransfer';

        return $data;
    }
}
