<?php
namespace App\Enum;
enum StatusEnum: string
{
    case CONFIRMED   = 'Confirmé';
    case ORGANIZED   = 'À organiser';
    case REJECTED    = 'Annulé';
    case FIND_PLACE  = 'En recherche de place';
}
