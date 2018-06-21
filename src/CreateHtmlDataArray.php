<?php

namespace Calligraphy;


class CreateHtmlDataArray
{
    protected $data = [];

    /**
     * CreateHtmlDataArray constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $string
     * @param int $columns
     * @return array
     */
    public function parse($string, $columns=0)
    {
        $split = str_split($string);
        $this->fillArray($columns, $split);
        return $this->data;
    }

    /**
     * @param $columns
     * @param $split
     */
    protected function fillArray($columns, $split)
    {
        foreach ($split as $index => $splitedValue) {
            $this->data[] = array_pad([$splitedValue], $columns, '');
        }
    }
}