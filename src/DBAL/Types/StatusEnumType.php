<?php
namespace App\DBAL\Types;
use App\Enum\StatusEnum;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
class StatusEnumType extends Type
{
    public const string NAME = 'event_status'; // nom du type PostgreSQL

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return 'event_status';
    }

    public function getName(): string
    {
        return self::NAME;
    }
    public function convertToPHPValue($value, AbstractPlatform $platform): ?StatusEnum
    {
        if ($value === null) {
            return null;
        }

        return StatusEnum::from($value); // ✅ Pas de "new"
    }
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if ($value instanceof StatusEnum) {
            return $value->value;
        }

        return $value;
    }
}
