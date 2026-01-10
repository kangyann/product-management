<?php

class Controller
{
    protected function getCurrentPath()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
    protected function view($v, $data = [])
    {

        extract($data);
        require $v;
    }
}
