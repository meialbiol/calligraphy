<?php


namespace Calligraphy;


/**
 * @property  row
 */
class Table
{
    private $rows = '';
    private $columns = '';
    private $table = '';
    private $rowNumber;
    private $columnNumber;

    public function __construct($rowNumber = 0, $columnNumber = 0)
    {

        $this->rowNumber = $rowNumber;
        $this->columnNumber = $columnNumber;

    }

    public function create($data='')
    {

        $this->createColumns($data);
        $this->createRows();
        $this->createTable();
        return $this;
    }

    protected function createColumns($data)
    {
        for ($count = $this->columnNumber; $count > 0; $count--) {
            $this->columns .= '<td>'.$data.'</td>';
        }
    }

    protected function createRows()
    {
        for ($count = $this->rowNumber; $count > 0; $count--) {
            $this->rows .= '<tr>'.$this->columns.'</tr>';
        }
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
}