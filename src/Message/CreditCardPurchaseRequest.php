<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments Credit Card Purchase Request
 */
class CreditCardPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'creditcard';

        return $data;
    }
}
