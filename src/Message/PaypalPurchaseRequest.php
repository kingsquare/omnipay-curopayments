<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments Paypal Purchase Request
 * @package Omnipay\Curopayments\Message
 */
class PaypalPurchaseRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'paypal';

        return $data;
    }
}
