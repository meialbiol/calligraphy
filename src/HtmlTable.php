<?php


namespace Calligraphy;


/**
 * @property  row
 */
class HtmlTable
{
    private $rows = '';
    private $table = '';
    private $rowNumber;
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function create()
    {
        $this->getRowNumber()
            ->createRows()
            ->createTable();
        return $this;
    }

    protected function createColumns($data)
    {

        $columns = '';
        foreach ($data as $index => $value){
            $columns .= '<td>'.$value.'</td>';
        }


        return $columns;
    }

    protected function createRows()
    {

        foreach ($this->data as $index => $value){
            $this->rows .= '<tr>'.$this->createColumns($this->data[$index]).'</tr>';
        }

        return $this;
    }

    /**
     * @return string
     */
    protected function createTable()
    {
        $this->table = '<table>' . $this->rows . '</table>';
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    private function getRowNumber()
    {
        $this->rowNumber = count($this->data);
        return $this;
    }
}