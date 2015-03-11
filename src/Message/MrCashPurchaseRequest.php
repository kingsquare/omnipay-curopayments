<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments Mister Cash / Bancontact Purchase Request
 * @package Omnipay\Curopayments\Message
 */
class MrCashPurchaseRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'mistercash';

        return $data;
    }
}
