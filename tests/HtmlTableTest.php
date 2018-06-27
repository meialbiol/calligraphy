<?php

namespace Test;


use Calligraphy\CreateHtmlDataArray;
use Calligraphy\HtmlTable;

class HtmlTableTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var HtmlTable
     */
    private $table;
    /**
     * @var CreateHtmlDataArray
     */
    private $htmlData;

    /**
     *
     */
    public function setUp()
    {
        $this->table = new HtmlTable();
        $this->htmlData = new CreateHtmlDataArray();
    }

    public function test_is_true()
    {
        $this->assertTrue(true);
    }

    public function test_instace_of_table()
    {
        $table =  new HtmlTable();
        $this->assertInstanceOf('Calligraphy\HtmlTable', $table);

    }

    public function test_have_a_table(){
        $table = $this->table->create([])->getTable();

        $strStarts = substr($table, 0, 7);
        $strEnds = substr($table, -8);

        $this->assertEquals('<table>', $strStarts);
        $this->assertEquals('</table>', $strEnds);

    }


    public function test_table_with_a_row()
    {

        $table = $this->table->create($this->htmlData->parse('a'))->getTable();

        $countTr = substr_count($table,'<tr>');
        $countTrEnds = substr_count($table,'</tr>');

        $this->assertEquals(1, $countTr);
        $this->assertEquals(1, $countTrEnds);
    }

    public function test_table_with_two_rows()
    {
        $table = $this->table->create($this->htmlData->parse(22))->getTable();

        $countTr = substr_count($table,'<tr>');
        $countTrEnds = substr_count($table,'</tr>');

        $this->assertEquals(2, $countTr);
        $this->assertEquals(2, $countTrEnds);
    }

     public function test_table_with_three_rows()
    {
        $table = $this->table->create($this->htmlData->parse(333))->getTable();

        $countTr = substr_count($table,'<tr>');
        $countTrEnds = substr_count($table,'</tr>');

        $this->assertEquals(3, $countTr);
        $this->assertEquals(3, $countTrEnds);
    }

    public function test_table_create_table_with_a_column()
    {
        $table = $this->table->create($this->htmlData->parse(1))->getTable();

        $countTd = substr_count($table,'<td>');
        $countTdEnds = substr_count($table,'</td>');

        $this->assertEquals(1, $countTd);
        $this->assertEquals(1, $countTdEnds);
    }

    public function test_table_create_table_with_two_columns()
    {

        $table = $this->table->create($this->htmlData->parse(1, 2))->getTable();

        $countTd = substr_count($table,'<td>');
        $countTdEnds = substr_count($table,'</td>');

        $this->assertEquals(2, $countTd);
        $this->assertEquals(2, $countTdEnds);
    }

    public function test_table_has_data()
    {
        $table = $this->table->create($this->htmlData->parse('oli', 1, ','))->getTable();
        $countData = substr_count($table,'oli');
        $this->assertContains('oli', $table);
        $this->assertEquals(1, $countData);

    }

    public function test_table_different_data_in_columns()
    {
        $table = $this->table->create($this->htmlData->parse('oli, miau', 2, ','))->getTable();

        $countTd = substr_count($table,'<td>');
        $this->assertEquals(4, $countTd);

        $countData = substr_count($table,'oli');
        $this->assertContains('oli', $table);
        $this->assertEquals(1, $countData);

    }

    public function test_table_has_one_row_per_letter()
    {

        $table = $this->table->create($this->htmlData->parse('abc'))->getTable();

        $countTd = substr_count($table,'<tr>');
        $countTdEnds = substr_count($table,'</tr>');

        $this->assertEquals(3, $countTd);
        $this->assertEquals(3, $countTdEnds);


    }


}
