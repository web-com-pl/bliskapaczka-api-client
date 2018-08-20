<?php

namespace Bliskapaczka\ApiClient;

/**
 * Singleton class for configuration
 */
class Config
{
    protected static $instance = false;

    protected $bearer = null;

    protected $mode = 'prod';

    /**
     * Call this method to get singleton
     */
    public static function get()
    {
        if (self::$instance === false) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * Make constructor private, so nobody can call "new Class".
     */
    private function __construct()
    {
    }

    /**
     * Make clone magic method private, so nobody can clone instance.
     */
    private function __clone()
    {
    }

    /**
     * Make sleep magic method private, so nobody can serialize instance.
     */
    private function __sleep()
    {
    }

    /**
     * Make wakeup magic method private, so nobody can unserialize instance.
     */
    private function __wakeup()
    {
    }

    /**
     * Set bearer
     *
     * @param string $bearer
     */
    public function setApiKey($bearer)
    {
        $this->bearer = $bearer;
    }

    /**
     * Get bearer
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->bearer;
    }

    /**
     * Set mode
     *
     * @param string $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * Get mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }
}
