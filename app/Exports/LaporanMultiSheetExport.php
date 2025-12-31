<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaporanMultiSheetExport implements WithMultipleSheets
{
    protected $dari, $sampai;

    public function __construct($dari, $sampai)
    {
        $this->dari = $dari;
        $this->sampai = $sampai;
    }

    public function sheets(): array
    {
        return [
            new OrderSheet($this->dari, $this->sampai),
            new OrderItemSheet($this->dari, $this->sampai),
        ];
    }
}
