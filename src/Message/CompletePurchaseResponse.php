<?php

namespace Omnipay\Curopayments\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Curopayments Complete Purchase Response
 */
class CompletePurchaseResponse extends AbstractResponse
{
	/**
	 * Transaction pending/in process. The transaction was created in the Card Gate system but there has not yet been an update of the payment method.
	 */
	const PENDING = 0;

	/**
	 * Authorization successful
	 */
	const AUTHORIZATION_SUCCESS = 100;

	/**
	 * 3D secure status ‘Y’ (yes), waiting for 3D secure authentication
	 */
	const SECURE_3D_YES = 150;

	/**
	 * 3D secure status ‘N’ (no)
	 */
	const SECURE_3D_NO = 152;

	/**
	 * 3D secure status ‘U’ (unknown)
	 */
	const SECURE_3D_UNKNOWN = 154;

	/**
	 * 3D secure status ‘E’ (error)
	 */
	const SECURE_3D_ERROR = 156;

	/**
	 * Transaction successful
	 */
	const SUCCESS = 200;

	/**
	 * Recurring transaction successful
	 */
	const RECURRING_SUCCESS = 210;

	/**
	 * Transaction failed
	 */
	const FAILED = 300;

	/**
	 * Transaction failed due to anti fraud system
	 */
	const FAILED_ANTIFRAUD = 301;

	/**
	 * Transaction was cancelled by the user
	 */
	const CANCELLED = 305;

	/**
	 * Transaction was expired by the payment method
	 */
	const EXPIRED = 308;

	/**
	 * Transaction cancelled by the consumer
	 */
	const CANCELLED_CONSUMER = 309;

	/**
	 * Recurring transaction failed
	 */
	const RECURRING_FAILED = 310;

	/**
	 * Transaction failed, time out for 3D secure authentication
	 */
	const FAILED_SECURE_3D_EXPIRED = 350;

	/**
	 * Transaction failed, non-3D Secure transactions not allowed
	 */
	const FAILED_SECURE_3D_NOT_AVAILABLE = 351;

	/**
	 * Refund to customer
	 */
	const REFUND = 400;

	/**
	 * Chargeback to customer
	 */
	const CHARGEBACK = 410;

	/**
	 * Transaction waits for user action or confirmation by the acquirer
	 */
	const WAITING_INTERACTION = 700;

	/**
	 * Waits for user action or confirmation by the acquirer for a recurring transaction
	 */
	const RECURRING_WAITING_INTERACTION = 710;

	/**
	 * @inheritdoc
	 */
	public function isSuccessful()
    {
        return (int) $this->getCode() === static::SUCCESS;
    }

	/**
	 * @inheritdoc
	 */
	public function getCode()
    {
        if (isset($this->data['cgpstatusid'])) {
            return (string) $this->data['cgpstatusid'];
        }
		return '0';
    }

	/**
	 * @inheritdoc
	 */
	public function getMessage()
    {
        if (isset($this->data['cgpstatus'])) {
            return $this->data['cgpstatus'];
        }
		return '';
    }

	/**
	 * @inheritdoc
	 */
	public function getTransactionReference()
    {
        if (isset($this->data['cgpref'])) {
            return $this->data['cgpref'];
        }
		return '';
    }
}
