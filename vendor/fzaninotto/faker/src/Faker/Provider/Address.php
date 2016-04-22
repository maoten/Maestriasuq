<?php

namespace Faker\Provider;

class Address extends \Faker\Provider\Base
{

    protected static $citySuffix = [ 'Ville' ];

    protected static $streetSuffix = [ 'Street' ];

    protected static $cityFormats = [
        '{{firstName}}{{citySuffix}}',
    ];

    protected static $streetNameFormats = [
        '{{lastName}} {{streetSuffix}}'
    ];

    protected static $streetAddressFormats = [
        '{{buildingNumber}} {{streetName}}'
    ];

    protected static $addressFormats = [
        '{{streetAddress}} {{postcode}} {{city}}',
    ];

    protected static $buildingNumber = [ '##' ];

    protected static $postcode = [ '#####' ];

    protected static $country = [ ];


    /**
     * @example 'town'
     */
    public static function citySuffix()
    {
        return static::randomElement(static::$citySuffix);
    }


    /**
     * @example 'Avenue'
     */
    public static function streetSuffix()
    {
        return static::randomElement(static::$streetSuffix);
    }


    /**
     * @example '791'
     */
    public static function buildingNumber()
    {
        return static::numerify(static::randomElement(static::$buildingNumber));
    }


    /**
     * @example 'Sashabury'
     */
    public function city()
    {
        $format = static::randomElement(static::$cityFormats);

        return $this->generator->parse($format);
    }


    /**
     * @example 'Crist Parks'
     */
    public function streetName()
    {
        $format = static::randomElement(static::$streetNameFormats);

        return $this->generator->parse($format);
    }


    /**
     * @example '791 Crist Parks'
     */
    public function streetAddress()
    {
        $format = static::randomElement(static::$streetAddressFormats);

        return $this->generator->parse($format);
    }


    /**
     * @example 86039-9874
     */
    public static function postcode()
    {
        return static::toUpper(static::bothify(static::randomElement(static::$postcode)));
    }


    /**
     * @example '791 Crist Parks, Sashabury, IL 86039-9874'
     */
    public function address()
    {
        $format = static::randomElement(static::$addressFormats);

        return $this->generator->parse($format);
    }


    /**
     * @example 'Japan'
     */
    public static function country()
    {
        return static::randomElement(static::$country);
    }


    /**
     * @example 77.147489
     * @return float Uses signed degrees format (returns a float number between -90 and 90)
     */
    public static function latitude()
    {
        return static::randomFloat(6, 0, 180) - 90;
    }


    /**
     * @example 86.211205
     * @return float Uses signed degrees format (returns a float number between -180 and 180)
     */
    public static function longitude()
    {
        return static::randomFloat(6, 0, 360) - 180;
    }
}
