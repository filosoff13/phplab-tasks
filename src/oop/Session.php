<?php


class Session
{
    private array $session;

    public function __construct(array $session)
    {
        session_start();
        $this->session = $session;

    }
    public function all(array $only = []){
        if (!empty($only)) {
            return array_merge($only, array_keys($this->session));
        } else {
            return $this->session;
        }
    }
    public function get($key, $default = null){
        return in_array($key, array_keys($this->session)) ? $this->session[$key] : $default;
    }
    public function set($key, $value){
        return $this->session[$key] = $value;
    }
    public function has($key){
        return in_array($key, array_keys($this->session));
    }
    public function remove($key){
        unset($this->session[$key]);
    }
    public function clear(){
        session_unset();
    }
}