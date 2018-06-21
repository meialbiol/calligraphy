<?php

namespace Test;


use Calligraphy\CreateHtmlDataArray;

class CreateHtmlDataArrayTest extends \PHPUnit\Framework\TestCase
{

    public function test_is_instance_of_CreateHtmlDataArray()
    {
        $table =  new CreateHtmlDataArray();
        $this->assertInstanceOf('Calligraphy\CreateHtmlDataArray', $table);
    }

    public function test_create_array_from_string()
    {
        $string = 'abcde';
        $createSData = new CreateHtmlDataArray();
        $data = $createSData->parse($string);
        $this->assertEquals(5, count($data));

    }

    public function test_crear_associative_array_0_character_x_empty()
    {
        $string = 'ab';
        $createSData = new CreateHtmlDataArray();
        $data = $createSData->parse($string, 4);
        $this->assertEquals(4, count($data[0]));
        $this->assertEquals('', $data[0][1]);


    }

    public function test_crear_associative_array_with_words()
    {
        $string = 'ab, cd';
        $createSData = new CreateHtmlDataArray();
        $data = $createSData->parse($string, 1, ',');
        $this->assertEquals(2, count($data));

    }

    public function test_crear_associative_array_with_words_and_empty_columns()
    {
        $string = 'ab, cd, ef';
        $createSData = new CreateHtmlDataArray();
        $data = $createSData->parse($string, 4, ',');
        $this->assertEquals(3, count($data));
        $this->assertEquals(4, count($data[0]));

    }


}
