<?php

namespace Calligraphy;


use Mustache_Engine;

class CreateHtmlDoc
{
    /**
     * @var Mustache_Engine
     */
    private $moustache;

    /**
     * CreateHtmlDoc constructor.
     * @param Mustache_Engine $moustache
     */
    public function __construct(Mustache_Engine $moustache)
    {
        $this->moustache = $moustache;
    }

    public function createDoc($data, $template = 'base')
    {
        return $this->moustache->render($template, $data);
    }
}