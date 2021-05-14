<?php

namespace App;

class Locale
{

    protected static $default_parameters_locale = [
        'money_sign' => '$',
        'decimal_separator' => ',',
        'dir'  => 'ltr', // rtl/ltr
        'thousand_separator' => '.',
        'date_format' => 'YYYY/mm/dd',
        'timestamp_format' => 'YYYY/mm/dd H:i:s',
        'datatable_i18n_location' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json',
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
        $format_string = locale()->getConfiguredSupportedLocales()['timestamp_format'];
        return $timestamp->format($format_string);
    }

    public function get_datatable_url()
    {
        return locale()->getConfiguredSupportedLocales()['datatable_i18n_location'];
    }

    public function get_direction(){
        return locale()->getConfiguredSupportedLocales()['dir'];
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
        return in_array($locale, array_keys($this->supported()));
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
