<?php

namespace App\Services;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

/**
 * Class MoneyService
 * @package App\Services
 */
class MoneyService
{
    /**
     * @var int
     */
    protected $memberFee = 362050;

    /**
     * Format the value as currency
     *
     * @param int $value
     * @return string
     */
    public function format(int $value)
    {
        $money = $this->getMoney($value);

        $currencies = new ISOCurrencies();

        $numberFormatter = new \NumberFormatter('en_ZA', \NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        return $moneyFormatter->format($money);
    }

    /**
     * The amount payable by members annually.
     *
     * @return int
     */
    public function memberFee()
    {
        return $this->memberFee;
    }

    /**
     * Get a `Money` object.
     *
     * @param int $value
     * @return Money
     */
    protected function getMoney(int $value): Money
    {
        return new Money($value, new Currency('ZAR'));
    }
}
