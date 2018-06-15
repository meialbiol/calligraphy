<?php


namespace Calligraphy;


/**
 * @property  row
 */
class Table
{
    private $rows = '';
    private $table = '';
    private $rowNumber;

    public function __construct($rowNumber = 0)
    {
        $this->rowNumber = $rowNumber;
    }

    public function create()
    {

        $this->createRows();
        $this->createTable();
        return $this;
    }

    protected function createRows()
    {
        for ($count = $this->rowNumber; $count > 0; $count--) {
            $this->rows .= '<tr></tr>';
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