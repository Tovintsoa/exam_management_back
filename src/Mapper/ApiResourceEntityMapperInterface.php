<?php

namespace App\Mapper;

interface ApiResourceEntityMapperInterface
{
    /**
     * Convertit une ApiResource vers une entité Doctrine
     */
    public function toEntity(object $resource): object;
    /**
     * Convertit une entité Doctrine vers une ApiResource
     */
    public function toResource(object $entity): object;
}