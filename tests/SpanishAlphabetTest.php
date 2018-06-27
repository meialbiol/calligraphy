<?php

namespace Test;



use Calligraphy\CreateHtmlDataArray;
use Calligraphy\CreateHtmlDoc;
use Calligraphy\HtmlTable;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

class Test extends \PHPUnit\Framework\TestCase
{

    protected $dataSet;
    /**
     * @var CreateHtmlDataArray
     */
    private $data;
    /**
     * @var HtmlTable
     */
    private $table;
    /**
     * @var CreateHtmlDoc
     */
    private $html;


    public function setUp()
    {
        $this->dataSet = include dirname( __FILE__ ).'/../src/datasets/es.php';
        $this->data = new CreateHtmlDataArray();
        $this->table = new HtmlTable();
        $options =  array('extension' => '.html');

        $this->moustache = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/templates', $options),
        ));
        $this->html = new CreateHtmlDoc($this->moustache);
    }

    public function test_dataset_have_data()
    {

        $this->assertContains('abc', $this->dataSet[0]['alphabet']);
    }

    public function test_create_table()
    {
       $array = $this->data->parse(utf8_encode($this->dataSet[0]['alphabet']), 5);
       $table = $this->table->create($array)->getTable();

       $strStarts = substr($table, 0, 7);
       $strEnds = substr($table, -8);

       $this->assertEquals('<table>', $strStarts);
       $this->assertEquals('</table>', $strEnds);

    }

    public function test_create_html_doc()
    {
        $array = $this->data->parse(utf8_encode($this->dataSet[0]['alphabet']), 5);
        $table = $this->table->create($array)->getTable();
        $data = ['table' => $table];
        $html = $this->html->createDoc($data);

        $this->assertContains('<html', $html);


    }

}
