<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\{
    FromCollection,
    WithHeadings,
    WithMapping,
    WithEvents
};
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;

class OrderSheet implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithEvents
{
    protected $dari, $sampai;
    protected $totalHarga = 0;

    public function __construct($dari, $sampai)
    {
        $this->dari = $dari;
        $this->sampai = $sampai;
    }

    /* ================= DATA ================= */
    public function collection()
    {
        return Order::whereBetween('created_at', [
                $this->dari . ' 00:00:00',
                $this->sampai . ' 23:59:59'
            ])
            ->where('status', 'selesai')
            ->orderBy('created_at')
            ->get();
    }

    /* ================= MAP ================= */
    public function map($row): array
    {
        $this->totalHarga += $row->total_harga;

        return [
            Carbon::parse($row->created_at)->format('d-m-Y'),
            $row->no_pesanan,
            $row->tempat_pesanan ?? '-',
            $row->total_harga, // ANGKA MURNI
        ];
    }

    /* ================= HEADER ================= */
    public function headings(): array
    {
        return [
            'Tanggal',
            'No Pesanan',
            'Tempat',
            'Subtotal'
        ];
    }

    /* ================= STYLE & FOOTER ================= */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();
                $lastRow = $sheet->getHighestRow();
                $lastColumn = 'D';
                $footerRow = $lastRow + 1;

                /* ===== HEADER ===== */
                $sheet->getStyle("A1:$lastColumn"."1")->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => ['rgb' => '1F4E78'],
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center',
                    ],
                ]);

                /* ===== ZEBRA ROW ===== */
                for ($row = 2; $row <= $lastRow; $row++) {
                    if ($row % 2 === 0) {
                        $sheet->getStyle("A$row:$lastColumn$row")->applyFromArray([
                            'fill' => [
                                'fillType' => 'solid',
                                'startColor' => ['rgb' => 'F5F7FA'],
                            ],
                        ]);
                    }
                }

                /* ===== FOOTER TOTAL ===== */
                $sheet->setCellValue("A$footerRow", 'TOTAL');
                $sheet->mergeCells("A$footerRow:C$footerRow");
                $sheet->setCellValue("D$footerRow", $this->totalHarga);

                $sheet->getStyle("A$footerRow:$lastColumn$footerRow")->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => ['rgb' => 'DFF0D8'],
                    ],
                    'alignment' => [
                        'horizontal' => 'right',
                        'vertical' => 'center',
                    ],
                ]);

                /* ===== FORMAT RP ===== */
                $sheet->getStyle("D2:D$footerRow")
                    ->getNumberFormat()
                    ->setFormatCode('"Rp" #,##0');

                /* ===== BORDER ===== */
                $sheet->getStyle("A1:$lastColumn$footerRow")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => 'thin',
                            'color' => ['rgb' => 'D0D0D0'],
                        ],
                    ],
                ]);

                /* ===== AUTO WIDTH ===== */
                foreach (['A','B','C','D'] as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            }
        ];
    }
}
