<?php

namespace Calligraphy;


class CreateHtmlDataArray
{

    /**
     * CreateHtmlDataArray constructor.
     */
    public function __construct()
    {
    }

    public function parse($string, $columns=0)
    {   $data = [];
        $split = str_split($string);
        foreach ($split as $index => $splitedValue){
            $data[] = array_pad([$splitedValue], $columns, '');
        }

        return $data;
    }
}