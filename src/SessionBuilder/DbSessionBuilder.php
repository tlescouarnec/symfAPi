<?php

namespace App\SessionBuilder;
use PommProject\Foundation\Converter\PgHstore;
use PommProject\Foundation\Converter\ConverterHolder;
use PommProject\ModelManager\SessionBuilder;

class DbSessionBuilder extends SessionBuilder
{
    protected function initializeConverterHolder(ConverterHolder $converter_holder)
    {
        parent::initializeConverterHolder($converter_holder);
        $converter_holder
            ->registerConverter('Hstore', new PgHstore(), ['public.hstore']);
    }
}