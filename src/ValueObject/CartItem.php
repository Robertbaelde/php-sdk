<?php declare(strict_types=1);
/**
 * Copyright © 2020 MultiSafepay, Inc. All rights reserved.
 * See DISCLAIMER.md for disclaimer details.
 */

namespace MultiSafepay\ValueObject;

use Money\Money;

/**
 * Class CartItem
 * @package MultiSafepay\ValueObject
 */
class CartItem
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Money
     */
    protected $unitPrice;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var string
     */
    protected $merchantItemId;

    /**
     * @var string
     */
    protected $taxTableSelector;

    /**
     * @var Weight
     */
    protected $weight;

    /**
     * @var string
     */
    protected $description;

    /**
     * @param string $name
     * @return CartItem
     */
    public function addName(string $name): CartItem
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param Money $unitPrice
     * @return CartItem
     */
    public function addUnitPrice(Money $unitPrice): CartItem
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @param int $quantity
     * @return CartItem
     */
    public function addQuantity(int $quantity): CartItem
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @param string $merchantItemId
     * @return CartItem
     */
    public function addMerchantItemId(string $merchantItemId): CartItem
    {
        $this->merchantItemId = $merchantItemId;
        return $this;
    }

    /**
     * @param string $taxTableSelector
     * @return CartItem
     */
    public function addTaxTableSelector(string $taxTableSelector): CartItem
    {
        $this->taxTableSelector = $taxTableSelector;
        return $this;
    }

    /**
     * @param Weight $weight
     * @return CartItem
     */
    public function addWeight(Weight $weight): CartItem
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @param string $description
     * @return CartItem
     */
    public function addDescription(string $description): CartItem
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        // @todo: unit_price in Euro, not Euro-cents?
        return [
            'name' => $this->name,
            'description' => $this->description,
            'unit_price' => $this->unitPrice ? $this->unitPrice->getAmount() : null,
            'currency' => $this->unitPrice ? $this->unitPrice->getCurrency() : null,
            'quantity' => $this->quantity,
            'merchant_item_id' => $this->merchantItemId,
            'tax_table_select' => $this->taxTableSelector,
            'weight' => [
                'unit' => $this->weight ? strtoupper($this->weight->getUnit()) : null,
                'value' => $this->weight ? $this->weight->getQuantity() : null,
            ]
        ];
    }
}
