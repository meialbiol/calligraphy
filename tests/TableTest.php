<?php

namespace Test;


use Calligraphy\Table;

class TableTest extends \PHPUnit\Framework\TestCase
{
    public function test_is_true()
    {
        $this->assertTrue(true);
    }

    public function test_instace_of_table()
    {
        $table =  new Table();
        $this->assertInstanceOf('Calligraphy\Table', $table);

    }

    /**
     *
     */
    public function test_have_a_table(){
        $table = new Table();


        $strStarts = substr($table->create(), 0, 7);
        $strEnds = substr($table->create(), -8);

        $this->assertEquals('<table>', $strStarts);
        $this->assertEquals('</table>', $strEnds);

    }

}
