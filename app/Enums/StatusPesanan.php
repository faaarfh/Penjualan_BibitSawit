<?php

namespace App\Enums;

enum StatusPesanan: string
{
    case MENUNGGU_KONFIRMASI = 'Menunggu Konfirmasi';
    case DITERIMA = 'Diterima';
    case DITOLAK = 'Ditolak';

    public function getLabel(): string
    {
        return $this->value;
    }

    public function getColor(): string
    {
        return match ($this) {
            self::MENUNGGU_KONFIRMASI => 'warning',
            self::DITOLAK => 'danger',
            self::DITERIMA => 'success',
        };
    }

    /**
     * Digunakan untuk select option.
     */
    public static function values(): array
    {
        return array_map(
            fn ($case) => $case->value,
            self::cases()
        );
    }

    public static function adminOptions(): array
    {
        return self::values();
    }

    /**
     * Status yang dianggap "aktif" (belum selesai).
     */
    public static function active(): array
    {
        return [
            self::MENUNGGU_KONFIRMASI->value,
            self::DITERIMA->value,
        ];
    }
}
