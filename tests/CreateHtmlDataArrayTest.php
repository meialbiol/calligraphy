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


}
