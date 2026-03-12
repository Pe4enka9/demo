<?php

namespace App\Enums;

enum AppStatus: string
{
    case PENDING = 'pending';
    case SUCCESS = 'success';
    case CANCELLED = 'cancelled';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'В работе',
            self::SUCCESS => 'Выполнено',
            self::CANCELLED => 'Отменено',
        };
    }
}
