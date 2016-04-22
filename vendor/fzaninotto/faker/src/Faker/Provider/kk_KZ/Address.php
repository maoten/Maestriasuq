<?php

namespace Faker\Provider\kk_KZ;

class Address extends \Faker\Provider\Address
{

    protected static $citySuffix = [ 'қаласы' ];

    protected static $regionSuffix = [ 'облысы' ];

    protected static $streetSuffix = [
        'көшесі',
        'даңғылы',
    ];

    protected static $buildingNumber = [ '###' ];

    protected static $postcode = [ '0#####' ];

    protected static $country = [
        'Қазақстан',
        'Ресей',
    ];

    protected static $region = [
        'Алматы',
        'Ақтау',
        'Ақтөбе',
        'Астана',
        'Атырау',
        'Байқоңыр',
        'Қарағанды',
        'Көкшетау',
        'Қостанай',
        'Қызылорда',
        'Маңғыстау',
        'Павлодар',
        'Петропавл',
        'Талдықорған',
        'Тараз',
        'Орал',
        'Өскемен',
        'Шымкент',
    ];

    protected static $city = [
        'Алматы',
        'Ақтау',
        'Ақтөбе',
        'Астана',
        'Атырау',
        'Байқоңыр',
        'Қарағанды',
        'Көкшетау',
        'Қостанай',
        'Қызылорда',
        'Маңғыстау',
        'Павлодар',
        'Петропавл',
        'Талдықорған',
        'Тараз',
        'Орал',
        'Өскемен',
        'Шымкент',
    ];

    protected static $street = [
        'Абай',
        'Гоголь',
        'Кенесары',
        'Бейбітшілік',
        'Достық',
        'Бұқар жырау',
    ];

    protected static $addressFormats = [
        "{{postcode}}, {{region}} {{regionSuffix}}, {{city}} {{citySuffix}}, {{street}} {{streetSuffix}}, {{buildingNumber}}",
    ];

    protected static $streetAddressFormats = [
        "{{street}} {{streetSuffix}}, {{buildingNumber}}"
    ];


    public static function buildingNumber()
    {
        return static::numerify(static::randomElement(static::$buildingNumber));
    }


    public function address()
    {
        $format = static::randomElement(static::$addressFormats);

        return $this->generator->parse($format);
    }


    public static function country()
    {
        return static::randomElement(static::$country);
    }


    public static function postcode()
    {
        return static::toUpper(static::bothify(static::randomElement(static::$postcode)));
    }


    public static function regionSuffix()
    {
        return static::randomElement(static::$regionSuffix);
    }


    public static function region()
    {
        return static::randomElement(static::$region);
    }


    public static function citySuffix()
    {
        return static::randomElement(static::$citySuffix);
    }


    public function city()
    {
        return static::randomElement(static::$city);
    }


    public static function streetSuffix()
    {
        return static::randomElement(static::$streetSuffix);
    }


    public static function street()
    {
        return static::randomElement(static::$street);
    }
}
