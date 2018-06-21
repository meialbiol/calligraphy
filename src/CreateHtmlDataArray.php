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

    public function parse($string)
    {
        return str_split($string);
    }
}