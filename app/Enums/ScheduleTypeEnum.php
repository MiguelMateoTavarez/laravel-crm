<?php

namespace App\Enums;

enum ScheduleTypeEnum: int
{
    case TASK = 1;
    case MEETING = 2;

    public function getLabelById(int $id): string
    {
        return match($id){
            self::TASK->value => self::TASK->name,
            self::MEETING->value => self::MEETING->name,
            default => 'Invalid status'
        };
    }

    public static function getValuesForMigration(): array
    {
        return [
            self::TASK->value,
            self::MEETING->value,
        ];
    }
}
