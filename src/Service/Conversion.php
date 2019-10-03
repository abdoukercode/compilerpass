<?php


namespace App\Service;


use App\converter\ConvertToCsv;
use App\converter\ConvertToJson;
use App\converter\ConvertToObject;
use App\converter\ConvertToXml;
use App\converter\ConvertToYaml;
use Psr\Log\LoggerInterface;



class Conversion
{
    /**
     * @var Logger
     */
    private $logger;
    /**
     * @var ConvertToXml
     */
    private $convertToXml;

    public function __construct(
      LoggerInterface $logger,
        ConvertToXml $convertToXml
    )
    {
        $this->logger = $logger;
        $this->convertToXml = $convertToXml;
    }

    public function convert($data, $format)
    {
        switch ($format) {
            case 'json':
                $converter = new ConvertToJson();
                break;
            case 'csv':
                $converter = new ConvertToCsv();
                break;
            case 'yml':
                $converter = new ConvertToYaml();
                break;
            case 'xml':
                $converter = $this->convertToXml;
                break;
            case 'object':
                $converter = new ConvertToObject();
                break;
            default:
                throw new \DomainException('no matching converter');
        }

        return $converter->convert($data);
    }

}