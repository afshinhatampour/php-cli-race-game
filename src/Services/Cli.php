<?php

namespace Afshin\Racecli\Services;

use Exception;
use function cli\input;
use function cli\menu;
use function cli\out;

class Cli
{
    public function __construct()
    {
        //
    }

    /**
     * @param string $message
     * @return void
     */
    public static function output(string $message = '', string $code = ''): void
    {
//        out($message);
        match ($code) {
            'red' => out("\033[31m " . $message . " \033[0m "),
            'blue' => out("\033[34m " . $message . " \033[0m "),
            'green' => out("\033[32m " . $message . " \033[0m "),
            'yellow' => out("\033[33m " . $message . " \033[0m "),
            default => out($message)
        };
    }

    /**
     * @param array $items
     * @param string $default
     * @param string $title
     * @return string
     */
    public static function menu(array $items, string $default, string $title): string
    {
        return menu($items, $default, $title);
    }

    /**
     * @return string
     * @throws Exception
     */
    public static function input(): string
    {
        return input();
    }
}