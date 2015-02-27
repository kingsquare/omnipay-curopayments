<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments Giropay Purchase Request
 */
class GiropayPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'giropay';

        return $data;
    }
}
