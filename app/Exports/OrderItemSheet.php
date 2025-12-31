<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\{
    FromCollection,
    WithHeadings,
    WithMapping,
    WithEvents
};
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;


class OrderItemSheet implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithEvents,
    WithCalculatedFormulas

{
    protected $dari, $sampai;
    protected $totalSubtotal = 0;

    public function __construct($dari, $sampai)
    {

        $this->dari = $dari;
        $this->sampai = $sampai;
    }

    /* ================= DATA ================= */
    public function collection()
    {
        return DB::table('order_items')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->where('orders.status', 'selesai')
            ->whereBetween('orders.created_at', [
                $this->dari . ' 00:00:00',
                $this->sampai . ' 23:59:59'
            ])
            ->select(
                'orders.created_at',
                'orders.no_pesanan',
                'products.nama',
                'order_items.size',
                'order_items.quantity',
                'order_items.harga_awal',
                'order_items.diskon_presentase',
                'order_items.subtotal'
            )
            ->orderBy('orders.created_at')
            ->get();
    }

    /* ================= MAP (ANGKA MURNI) ================= */
    public function map($row): array
    {
        $this->totalSubtotal += $row->subtotal;

        return [
            Carbon::parse($row->created_at)->format('d-m-Y'),
            $row->no_pesanan,
            $row->nama,
            $row->size,
            $row->quantity,
            $row->harga_awal,              // angka murni
            $row->diskon_presentase / 100, // persen excel
            $row->subtotal,                // angka murni
        ];
    }


    /* ================= HEADER ================= */
    public function headings(): array
    {
        return [
            'Tanggal',
            'No Pesanan',
            'Produk',
            'Ukuran',
            'Jumlah',
            'Harga Produk',
            'Diskon',
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
                $lastColumn = $sheet->getHighestColumn();
                $footerRow = $lastRow + 1;

                /* ===== HEADER STYLE ===== */
                $sheet->getStyle("A1:$lastColumn" . "1")->applyFromArray([
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
                    if ($row % 2 == 0) {
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
                $sheet->mergeCells("A$footerRow:G$footerRow");
                $sheet->setCellValue("H$footerRow", $this->totalSubtotal);

                $sheet->getStyle("A$footerRow:H$footerRow")->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => ['rgb' => 'DFF0D8'],
                    ],
                    'alignment' => [
                        'horizontal' => 'right',
                        'vertical' => 'center',
                    ],
                ]);

                /* ===== FORMAT NUMBER ===== */
                // Harga Produk & Subtotal (Rp)
                $sheet->getStyle("F2:F$footerRow")
                    ->getNumberFormat()
                    ->setFormatCode('"Rp" #,##0');

                $sheet->getStyle("H2:H$footerRow")
                    ->getNumberFormat()
                    ->setFormatCode('"Rp" #,##0');

                // Diskon (%)
                $sheet->getStyle("G2:G$footerRow")
                    ->getNumberFormat()
                    ->setFormatCode('0%');

                /*   ===== BORDER ===== */
                $sheet->getStyle("A1:$lastColumn$footerRow")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => 'thin',
                            'color' => ['rgb' => 'D0D0D0'],
                        ],
                    ],
                ]);

                /* ===== AUTO WIDTH ===== */
                foreach (range('A', $lastColumn) as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            }
        ];
    }
}
