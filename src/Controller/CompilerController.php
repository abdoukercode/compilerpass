<?php

namespace App\Controller;

use App\converter\ConvertToCsv;
use App\converter\ConvertToJson;
use App\converter\ConvertToYaml;
use App\Service\Conversion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CompilerController
 * @package App\Controller
 */
class CompilerController extends AbstractController
{


    /**
     * @Route("/compiler", name="compiler")
     * @param Request $request
     * @param Conversion $conversion
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, Conversion $conversion)
    {
        $data = [
            'abc' => 123,
            'hello' => 'world',
            'qwe' => [
                'key' => 'value'
            ],
            'xyz' => 'alphabet'
        ];

// Old Method
        $format = $request->query->get('format', 'json');

//        if ($format === 'json') {
//            $converter = json_encode($data);
//        } elseif($format === 'csv') {
//        $converter = $this->array_2_csv($data)
//        ;
//    }
//
//        $output = $converter->convert($data);
//
//        return $this->render('default/index.html.twig', [
//            'output' => $output
//        ]);
//    }
//
//    private function array_2_csv($array) {
//        $csv = array();
//        foreach ($array as $item=>$val) {
//            if (is_array($val)) {
//                $csv[] = $this->array_2_csv($val);
//                $csv[] = "\n";
//            } else {
//                $csv[] = $val;
//            }
//        }
//        return implode(';', $csv);
//    }

        $format = $request->query->get('format', 'json');

//        if ($format === 'json') {
//            $converter = new ConvertToJson();
//        } elseif ($format === 'csv'){
//        $converter = new ConvertToCsv();
//        }elseif ($format === 'yaml') {
//            $converter = new ConvertToYaml();
//        } elseif ($format === 'xml') {
//            $converter = $this->get('crv.converter.convert_to_xml');
//        }
//        $output = $converter->convert($data);

        $output = $conversion->convert($data, $format);



        // replace this example code with whatever you need
        return $this->render('compiler/index.html.twig', [
            'output' => $output
        ]);
    }
}
