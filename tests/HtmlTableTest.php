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
        $table =  new HtmlTable([]);
        $this->assertInstanceOf('Calligraphy\HtmlTable', $table);

    }

    public function test_have_a_table(){
        $table = new HtmlTable([]);
        $table = $table->create()->getTable();

        $strStarts = substr($table, 0, 7);
        $strEnds = substr($table, -8);

        $this->assertEquals('<table>', $strStarts);
        $this->assertEquals('</table>', $strEnds);

    }


    public function test_table_with_a_row()
    {
        $data = new CreateHtmlDataArray();
        $table = new HtmlTable($data->parse('a'));
        $table = $table->create()->getTable();

        $countTr = substr_count($table,'<tr>');
        $countTrEnds = substr_count($table,'</tr>');

        $this->assertEquals(1, $countTr);
        $this->assertEquals(1, $countTrEnds);
    }

    public function test_table_with_two_rows()
    {
        $data = new CreateHtmlDataArray();
        $table = new HtmlTable($data->parse(22));
        $table = $table->create()->getTable();

        $countTr = substr_count($table,'<tr>');
        $countTrEnds = substr_count($table,'</tr>');

        $this->assertEquals(2, $countTr);
        $this->assertEquals(2, $countTrEnds);
    }

     public function test_table_with_three_rows()
    {
        $data = new CreateHtmlDataArray();
        $table = new HtmlTable($data->parse(333));
        $table = $table->create()->getTable();

        $countTr = substr_count($table,'<tr>');
        $countTrEnds = substr_count($table,'</tr>');

        $this->assertEquals(3, $countTr);
        $this->assertEquals(3, $countTrEnds);
    }

    public function test_table_create_table_with_a_column()
    {
        $data = new CreateHtmlDataArray();
        $table = new HtmlTable($data->parse(1));
        $table = $table->create()->getTable();

        $countTd = substr_count($table,'<td>');
        $countTdEnds = substr_count($table,'</td>');

        $this->assertEquals(1, $countTd);
        $this->assertEquals(1, $countTdEnds);
    }

    public function test_table_create_table_with_two_columns()
    {
        $data = new CreateHtmlDataArray();
        $table = new HtmlTable($data->parse(1, 2));
        $table = $table->create()->getTable();

        $countTd = substr_count($table,'<td>');
        $countTdEnds = substr_count($table,'</td>');

        $this->assertEquals(2, $countTd);
        $this->assertEquals(2, $countTdEnds);
    }

    public function test_table_has_data()
    {
        $data = new CreateHtmlDataArray();
        $table = new HtmlTable($data->parse('oli', 1, ','));
        $table = $table->create()->getTable();
        $countData = substr_count($table,'oli');
        $this->assertContains('oli', $table);
        $this->assertEquals(1, $countData);

    }

    public function test_table_different_data_in_columns()
    {
        $data = new CreateHtmlDataArray();
        $table = new HtmlTable($data->parse('oli, miau', 2, ','));
        $table = $table->create()->getTable();

        $countTd = substr_count($table,'<td>');
        $this->assertEquals(4, $countTd);

        $countData = substr_count($table,'oli');
        $this->assertContains('oli', $table);
        $this->assertEquals(1, $countData);

    }

    public function test_table_has_one_row_per_letter()
    {
        $data = new CreateHtmlDataArray();
        $table = new HtmlTable($data->parse('abc'));

        $table = $table->create()->getTable();

        $countTd = substr_count($table,'<tr>');
        $countTdEnds = substr_count($table,'</tr>');

        $this->assertEquals(3, $countTd);
        $this->assertEquals(3, $countTdEnds);


    }


}
