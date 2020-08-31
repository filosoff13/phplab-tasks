<?php


class Cookies
{
    private array $cookies;

    public function __construct(array $cookies)
    {
        $this->cookies = $cookies;
    }
    public function all(array $only = []){
        if (!empty($only)) {
            return array_merge($only, array_keys($this->cookies));
        } else {
            return $this->cookies;
        }
    }
    public function get($key, $default = null){
        return in_array($key, array_keys($this->cookies)) ? $this->cookies[$key] : $default;
    }
    public function set($key, $value){
        $this->cookies[$key] = $value;
    }
    public function has($key){
        return in_array($key, array_keys($this->cookies));
    }
    public function remove($key){
        unset($this->cookies[$key]);
        setcookie($key, '', time() - 1000);
    }
}