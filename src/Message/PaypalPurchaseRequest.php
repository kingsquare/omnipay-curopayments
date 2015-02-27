<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments Paypal Purchase Request
 */
class PaypalPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'paypal';

        return $data;
    }
}
