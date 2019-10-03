<?php


namespace App\converter;


use App\converter\ConverterInterface;


class ConvertToJson implements ConverterInterface
{
    public function convert(array $data)
    {
        return json_encode($data);
    }
}