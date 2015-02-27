<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments Bank transfer Purchase Request
 */
class BanktransferPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'banktransfer';

        return $data;
    }
}
