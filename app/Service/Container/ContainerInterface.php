<?php


namespace App\Service\Container;


interface ContainerInterface
{
    public function get(string $index);
    public static function getContainer();
}
