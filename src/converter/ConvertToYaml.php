<?php


namespace App\converter;




use App\converter\ConverterInterface;
use Symfony\Component\Yaml\Yaml;

class ConvertToYaml implements ConverterInterface
{

    public function convert(array $data)
    {
        return Yaml::dump($data);
    }
}