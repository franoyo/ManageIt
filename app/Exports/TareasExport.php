<?php

namespace App\Exports;

use App\Models\tarea;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;

class TareasExport implements FromCollection, WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $tareas;
    public function __construct($tareas)
    {
        $this->tareas = $tareas;
    }
    public function collection()
    {
        return $this->tareas;
    }
    public function headings(): array
    {
        return [
            'ID',
            'Tarea',
            'Fecha',
            'Lugar',
            'Descripcion',
            'Notas(opcional)',
            'porcentaje (%)',
            'Creado el',
            'Actualizado el',
        ];
    }
    public function styles(Worksheet $sheet)
    {
       // Verificar si se está aplicando un filtro
    if (!empty($this->tareas)) {
        // Aplicar estilos a los encabezados
        $sheet->getStyle('A1:I1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '268CCA',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // Ajustar automáticamente el ancho de las columnas
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        // Continuar con el ajuste de las demás columnas

        // Aplicar estilos personalizados a las celdas de datos si es necesario
        // Ejemplo: aplicar un borde a todas las celdas de datos
        $dataRange = 'A2:I' . (count($this->tareas) + 1); // Asumiendo que los datos comienzan en la fila 2
        $sheet->getStyle($dataRange)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);
    }
    }
}
