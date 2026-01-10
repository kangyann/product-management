<?php

function env($key, $default = null)
{
    static $env = null;

    if ($env === null) {
        $env = [];

        $lines = file('.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (str_starts_with(trim($line), '#')) continue;

            [$k, $v] = explode('=', $line, 2);

            $v = trim($v);
            $v = trim($v, "\"'");

            $env[trim($k)] = trim($v);
        }
    }

    return $env[$key] ?? $default;
}
