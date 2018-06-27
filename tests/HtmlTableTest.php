<?php

namespace Test;


use Calligraphy\CreateHtmlDataArray;
use Calligraphy\HtmlTable;

class HtmlTableTest extends \PHPUnit\Framework\TestCase
{
    public function test_is_true()
    {
        $this->assertTrue(true);
    }

    public function test_instace_of_table()
    {
        $table =  new HtmlTable();
        $this->assertInstanceOf('Calligraphy\HtmlTable', $table);

    }



    public function test_table_with_a_row()
    {
        $table = new HtmlTable(1);
        $table = $table->create()->getTable();

        $countTr = substr_count($table,'<tr>');
        $countTrEnds = substr_count($table,'</tr>');

        $this->assertEquals(1, $countTr);
        $this->assertEquals(1, $countTrEnds);
    }

    public function test_table_with_two_rows()
    {
        $table = new HtmlTable(22);
        $table = $table->create()->getTable();

        $countTr = substr_count($table,'<tr>');
        $countTrEnds = substr_count($table,'</tr>');

        $this->assertEquals(2, $countTr);
        $this->assertEquals(2, $countTrEnds);
    }

     public function test_table_with_three_rows()
    {
        $table = new HtmlTable(333);
        $table = $table->create()->getTable();

        $countTr = substr_count($table,'<tr>');
        $countTrEnds = substr_count($table,'</tr>');

        $this->assertEquals(3, $countTr);
        $this->assertEquals(3, $countTrEnds);
    }

    public function test_table_create_table_with_a_column()
    {
        $table = new HtmlTable(1,1);
        $table = $table->create()->getTable();

        $countTd = substr_count($table,'<td>');
        $countTdEnds = substr_count($table,'</td>');

        $this->assertEquals(1, $countTd);
        $this->assertEquals(1, $countTdEnds);
    }

    public function test_table_create_table_with_two_columns()
    {
        $table = new HtmlTable(1,2);
        $table = $table->create()->getTable();

        $countTd = substr_count($table,'<td>');
        $countTdEnds = substr_count($table,'</td>');

        $this->assertEquals(2, $countTd);
        $this->assertEquals(2, $countTdEnds);
    }

    public function test_table_has_data()
    {
        $table = new HtmlTable(['oli'],1);
        $table = $table->create()->getTable();
        $countData = substr_count($table,'oli');
        $this->assertContains('oli', $table);
        $this->assertEquals(1, $countData);

    }

    public function test_table_different_data_in_columns()
    {
        $table = new HtmlTable(['oli', 'miau'],2);
        $table = $table->create()->getTable();

        $countTd = substr_count($table,'<td>');
        $this->assertEquals(4, $countTd);

        $countData = substr_count($table,'oli');
        $this->assertContains('oli', $table);
        $this->assertEquals(2, $countData);

    }

    public function test_table_has_one_row_per_letter()
    {
        $table = new HtmlTable('abc');
        $table = $table->create()->getTable();

        $countTd = substr_count($table,'<tr>');
        $countTdEnds = substr_count($table,'</tr>');

        $this->assertEquals(3, $countTd);
        $this->assertEquals(3, $countTdEnds);


    }


}
