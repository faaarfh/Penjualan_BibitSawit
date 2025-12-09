<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'Admin';
    case PEMBELI = 'Pembeli';

    public function getLabel(): ?string
    {
        return $this->value;
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::ADMIN => 'danger',
            self::PEMBELI => 'primary',
            default => 'secondary'
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
     * getOptions: role yang bisa dipilih saat registrasi.
     * Biasanya admin tidak daftar sendiri, hanya pembeli.
     */
    public static function getOptions(): array
    {
        return [
            self::PEMBELI->value, // hanya pembeli boleh register
        ];
    }

    /**
     * senders: role yang boleh melakukan transaksi/pencatatan.
     * Misalnya admin bisa verifikasi & mengelola.
     */
    public static function senders(): array
    {
        return [
            self::PEMBELI->value, // pembeli melakukan pemesanan
            self::ADMIN->value,   // admin memproses pesanan
        ];
    }
}
