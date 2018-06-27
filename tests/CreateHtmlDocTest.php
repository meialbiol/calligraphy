<?php

namespace Test;


use Calligraphy\CreateHtmlDoc;
use Calligraphy\HtmlTable;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

class CreateHtmlDocTest extends \PHPUnit\Framework\TestCase
{
    protected $html;
    protected $moustache;

    public function setUp()
    {
        $options =  array('extension' => '.html');

        $this->moustache = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/templates', $options),
        ));
        $this->html = new CreateHtmlDoc($this->moustache);
    }
    public function test_is_instance_of_CreateHtmlDoc()
    {
        $this->assertInstanceOf('Calligraphy\CreateHtmlDoc', $this->html);

    }

    public function test_load_html_template()
    {
        $data = ['table' => 'Dummy data'];
        $html = $this->html->createDoc($data);
        $this->assertContains('Dummy data', $html);
        
    }

    public function test_load_html_template_with_table()
    {
        $table = new HtmlTable();
        $table = $table->create(array(['abc']))->getTable();
        $data = ['table' => $table];
        $html = $this->html->createDoc($data);
        $this->assertContains('<table', $html);

    }
}
