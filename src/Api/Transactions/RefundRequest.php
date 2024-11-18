<?php declare(strict_types=1);
/**
 * Copyright © MultiSafepay, Inc. All rights reserved.
 * See DISCLAIMER.md for disclaimer details.
 */

namespace MultiSafepay\Api\Transactions;

use MultiSafepay\Api\Base\RequestBody;
use MultiSafepay\Api\Base\RequestBodyInterface;
use MultiSafepay\Api\Transactions\OrderRequest\Arguments\Description;
use MultiSafepay\Api\Transactions\RefundRequest\Arguments\CheckoutData;
use MultiSafepay\Exception\InvalidArgumentException;
use MultiSafepay\ValueObject\Money;

/**
 * Class RefundRequest
 * @package MultiSafepay\Api\Transactions
 */
class RefundRequest extends RequestBody implements RequestBodyInterface
{
    /**
     * @var Money
     */
    private $money;

    /**
     * @var Description
     */
    private $description;

    /**
     * @var CheckoutData
     */
    private $checkoutData;

    /**
     * @var string
     */
    private $refundOrderId;

    /**
     * @return array
     * @throws InvalidArgumentException
     */
    public function getData(): array
    {
        return $this->removeNullRecursive(array_merge(
            [
                'currency' => $this->money ? (string)$this->money->getCurrency() : null,
                'amount' => $this->money ? (int)round($this->money->getAmount()) : null,
                'description' => $this->description ? $this->description->getData() : null,
                'checkout_data' => $this->checkoutData ? $this->checkoutData->getData() : null,
                'refund_order_id' => $this->refundOrderId ? $this->refundOrderId : null,
            ],
            $this->data
        ));
    }

    /**
     * @param Money $money
     * @return RefundRequest
     */
    public function addMoney(Money $money): RefundRequest
    {
        $this->money = $money;
        return $this;
    }

    /**
     * @param Description $description
     * @return RefundRequest
     */
    public function addDescription(Description $description): RefundRequest
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string $description
     * @return RefundRequest
     */
    public function addDescriptionText(string $description): RefundRequest
    {
        $this->description = (new Description())->addDescription($description);
        return $this;
    }

    /**
     * @param CheckoutData $checkoutData
     * @return RefundRequest
     */
    public function addCheckoutData(CheckoutData $checkoutData): RefundRequest
    {
        $this->checkoutData = $checkoutData;
        return $this;
    }

    /**
     * @param string $refundOrderId
     * @return RefundRequest
     */
    public function addRefundOrderId(string $refundOrderId): RefundRequest
    {
        $this->refundOrderId = $refundOrderId;
        return $this;
    }

    /**
     * @return CheckoutData
     */
    public function getCheckoutData(): CheckoutData
    {
        return $this->checkoutData;
    }
}
