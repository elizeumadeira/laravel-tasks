<?php

namespace App;

class Locale
{

    protected static $default_parameters_locale = [
        'money_sign' => '$',
        'decimal_separator' => ',',
        'thousand_separator' => '.',
        'date_format' => 'YYYY/mm/dd',
        'timestamp_format' => 'YYYY/mm/dd H:i:s',

    ];
    /**
     * Cached copy of the configured supported locales
     *
     * @var string
     */
    protected static $configuredSupportedLocales = [];

    /**
     * Our instance of the Laravel app
     *
     * @var Illuminate\Foundation\Application
     */
    protected $app = '';

    /**
     * Make a new Locale instance
     *
     * @param Illuminate\Foundation\Application $app
     */
    public function __construct($app)
    {
        $this->app = $app;
        // dd($this->app->make('config')['app']['supported_locales']);
        // dd($this->getConfiguredSupportedLocales());
    }

    /**
     * Retrieve the currently set locale
     *
     * @return string
     */
    public function current()
    {
        return $this->app->getLocale();
    }

    public function get_timestamp_format($timestamp)
    {
        //     var_dump($timestamp);
        //     die();
        //     $format_string = $this->getConfiguredSupportedLocales()['timestamp_format'];
        //     $date = \DateTime::createFromFormat('Y-m-d H:i:s', $timestamp);
        //     return $date->format($format_string);
        $format_string = locale()->getConfiguredSupportedLocales()['timestamp_format'];
        return $timestamp->format($format_string);
    }

    public function get_money_format()
    {

    }

    /**
     * Retrieve the configured fallback locale
     *
     * @return string
     */
    public function fallback()
    {
        return $this->app->make('config')['app.fallback_locale'];
    }

    /**
     * Set the current locale
     *
     * @param string $locale
     */
    public function set($locale)
    {
        $this->app->setLocale($locale);
    }

    /**
     * Retrieve the current locale's directionality
     *
     * @return string
     */
    public function dir()
    {
        return $this->getConfiguredSupportedLocales()['dir'];
    }

    /**
     * Retrieve the name of the current locale in the app's
     * default language
     *
     * @return string
     */
    public function nameFor($locale)
    {
        return $this->getConfiguredSupportedLocales()[$locale]['name'];
    }

    /**
     * Retrieve all of our app's supported locale language keys
     *
     * @return array
     */
    public function supported()
    {
        $supported = [];
        foreach($this->app->make('config')['app.supported_locales'] as $locale => $supported_specs){
            $supported[$locale] = $supported_specs['name'];
        }

        return $supported;
    }

    /**
     * Determine whether a locale is supported by our app
     * or not
     *
     * @return boolean
     */
    public function isSupported($locale)
    {
        return in_array($locale, $this->supported());
    }

    /**
     * Retrieve our app's supported locale's from configuration
     *
     * @return array
     */
    protected function getConfiguredSupportedLocales()
    {
        // cache the array for future calls
        if (empty(static::$configuredSupportedLocales)) {
            static::$configuredSupportedLocales = $this->app->make('config')['app.supported_locales'][$this->app->getLocale()];
        }
        return array_replace_recursive(static::$default_parameters_locale, static::$configuredSupportedLocales);
    }
}
