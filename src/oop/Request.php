<?php


class Request
{
    //$_GET, $_POST, $_FILES, $_COOKIE, $_SESSION
    private array $request;
    private array $query;
    private array $server;
    public Cookies $cookies;
    public Session $session;

    public function __construct(array $request, array $query, array $server, Cookies $cookies, Session $session)
    {
        $this->query = $query;
        $this->request = $request;
        $this->server = $server;
        $this->cookies = $cookies;
        $this->session = $session;
    }

    public function query($key, $default = null){
        if (array_key_exists($key, $this->query)) {
            return $this->query[$key];
        } else {
            return $default;
        }
    }

    public function post($key, $default = null){
        if (array_key_exists($key, $this->request)) {
            return $this->request[$key];
        } else {
            return $default;
        }
    }
    public function get($key, $default = null){
        $get_array = array_keys($this->query);
        $post_array = array_keys($this->request);

        if (in_array($key, $get_array) && !in_array($key, $post_array)) {
            return $this->query[$key];
        } else if (in_array($key, $post_array) && !in_array($key, $get_array)
            || (in_array($key, $post_array) && in_array($key, $get_array))) {
            return $this->request[$key];
        } else {
            return $default;
        }
    }
    public function all(array $only = []){
        $request_array = array_merge($this->request, $this->query);
        if (empty($only)) {
            return $request_array;
        } else {
            return array_merge($only, array_keys($request_array));
        }
    }
    public function has($key){
        echo in_array($key, array_keys($this->query)) || in_array($key, array_keys($this->request));
    }
    public function ip(){
        if (!empty($this->server['HTTP_CLIENT_IP'])) {
            $ip = $this->server['HTTP_CLIENT_IP'];
        } else if
        (!empty($this->server['HTTP_X_FORWARDED_FOR'])) {
            $ip = $this->server['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $this->server['REMOTE_ADDR'];
        }
        return $ip;
    }
    public function userAgent(){
        return $this->server['HTTP_USER_AGENT'];
    }
    public function cookies(){
        return $this->cookies;
    }
    public function session(){
        return $this->session;
    }
}