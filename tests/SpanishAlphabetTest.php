<?php

namespace Test;



class Test extends \PHPUnit\Framework\TestCase
{
    protected $dataSet;

    public function setUp()
    {
        $this->dataSet = include dirname( __FILE__ ).'/../src/datasets/es.php';
    }

    public function test_dataset_have_data()
    {

        $this->assertContains('abc', $this->dataSet[0]['alphabet']);
    }

}
