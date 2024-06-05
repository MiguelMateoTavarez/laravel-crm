<?php

namespace App\Enums;

enum ContactStatusEnum: int
{
    case LEAD = 1;
    case CUSTOMER = 2;
    case LOST = 3;

    public function getLabelById(int $id): string
    {
        return match($id){
            self::LEAD->value => self::LEAD->name,
            self::CUSTOMER->value => self::CUSTOMER->name,
            self::LOST->value => self::LOST->name,
            default => 'Invalid status'
        };
    }

    public static function getValuesForMigration(): array
    {
        return [
            self::LEAD->value,
            self::CUSTOMER->value,
            self::LOST->value
        ];
    }
}
