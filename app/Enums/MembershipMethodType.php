<?php

declare(strict_types=1);

namespace App\Enums;

enum MembershipMethodType: string
{
    case Bkash = 'bkash';
    case Nagad = 'nagad';
    case BankTransfer = 'bank_transfer';

    /**
     * The value => label options for authoring forms.
     *
     * @return array<string, string>
     */
    public static function options(): array
    {
        return [
            self::Bkash->value => __('membership.method_type_bkash'),
            self::Nagad->value => __('membership.method_type_nagad'),
            self::BankTransfer->value => __('membership.method_type_bank_transfer'),
        ];
    }

    public function label(): string
    {
        return self::options()[$this->value] ?? $this->value;
    }
}
