<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments Credit Card Purchase Request
 * @package Omnipay\Curopayments\Message
 */
class CreditCardPurchaseRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'creditcard';

        return $data;
    }
}
