<?php

namespace App\Imports;

use App\Lead;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class LeadsImport implements ToModel, WithStartRow
{
    use Importable;

    protected $_file_id;
    protected $_user_id;

    public function __construct($file_id, $user_id)
    {
        $this->_file_id = $file_id;
        $this->_user_id = $user_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        return new Lead([
            'member' => $row[0],
            'source' => $row[1],
            'g_source' => $row[2],
            'title' => $row[3],
            'thread_type' => $row[4],
            'blocked_url' => $row[5],
            'type' => $row[6],
            'where_text' => $row[7],
            'when' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8]) ?? null,
            'status' => $row[9],
            'file_id' => $this->_file_id,
            'created_by' => $this->_user_id,
            'status' => $row[9],
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}
