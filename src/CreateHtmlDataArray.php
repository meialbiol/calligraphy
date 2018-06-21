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
     * @param mixed $explode
     * @return array
     */
    public function parse($string, $columns=0, $explode = false)
    {
        $split = $this->extractArray($string, $explode);
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

    /**
     * @param $string
     * @param $explode
     * @return array
     */
    protected function extractArray($string, $explode)
    {
        if (empty($explode)) {
            $split = str_split($string);
        } else {
            $split = explode($explode, $string);
        }
        return $split;
    }
}