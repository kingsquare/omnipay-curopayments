<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments Giropay Purchase Request
 * @package Omnipay\Curopayments\Message
 */
class GiropayPurchaseRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'giropay';

        return $data;
    }
}
