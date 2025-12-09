<?php

namespace App\Enums;

enum MetodePembayaran: string
{
    case COD = 'Cash on Delivery';
    case TRANSFER = 'Transfer Bank';

    public function getLabel(): ?string
    {
        return $this->value;
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::COD => 'warning',
            self::TRANSFER => 'primary',
            default => 'secondary',
        };
    }

    public static function values(): array
    {
        return array_map(
            fn ($case) => $case->value,
            self::cases()
        );
    }

    /**
     * getOptions: metode pembayaran yang ditampilkan saat checkout.
     * Misalnya hanya COD dan Transfer yang aktif.
     */
    public static function getOptions(): array
    {
        return [
            self::COD->value,
            self::TRANSFER->value,
            // jika perlu bisa tambahkan self::E_WALLET->value
        ];
    }

    /**
     * senders: pihak yang boleh melakukan transaksi dengan metode ini.
     * Misalnya pembeli menggunakan semua metode, admin hanya mem-verifikasi.
     */
    public static function senders(): array
    {
        return [
            self::COD->value,
            self::TRANSFER->value,
        ];
    }
}
