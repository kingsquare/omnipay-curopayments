<?php

namespace Omnipay\Curopayments\Message;

/**
 * Curopayments Mister Cash / Bancontact Purchase Request
 */
class MrCashPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['option'] = 'mistercash';

        return $data;
    }
}
