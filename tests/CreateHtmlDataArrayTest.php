<?php

namespace Test;


use Calligraphy\CreateHtmlDataArray;

class CreateHtmlDataArrayTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var CreateHtmlDataArray
     */
    protected $createData;

    public function setUp()
    {
        $this->createData = new CreateHtmlDataArray();
    }

    public function test_is_instance_of_CreateHtmlDataArray()
    {
        $this->assertInstanceOf('Calligraphy\CreateHtmlDataArray', $this->createData);
    }

    public function test_create_array_from_string()
    {
        $string = 'abcde';
        $data = $this->createData->parse($string);
        $this->assertEquals(5, count($data));

    }

    public function test_crear_associative_array_0_character_x_empty()
    {
        $string = 'ab';
        $data = $this->createData->parse($string, 4);
        $this->assertEquals(4, count($data[0]));
        $this->assertEquals('', $data[0][1]);


    }

    public function test_crear_associative_array_with_words()
    {
        $string = 'ab, cd';
        $data = $this->createData->parse($string, 1, ',');
        $this->assertEquals(2, count($data));

    }

    public function test_crear_associative_array_with_words_and_empty_columns()
    {
        $string = 'ab, cd, ef';
        $data = $this->createData->parse($string, 4, ',');

        $this->assertEquals(3, count($data));
        $this->assertEquals(4, count($data[0]));

    }


}
