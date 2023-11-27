<?php
namespace Core\Main\Traits;

trait Singleton
{
    private static ?self $self = null;

    public static function getInstance()
    {
        if (is_null(self::$self)) {
            self::$self = new self;
        }
        return self::$self;
    }
}