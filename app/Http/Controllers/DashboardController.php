<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\JsonData;
use App\Models\MultipleProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $products = Product::paginate(5);
        $users = User::paginate(5);
        $facturas = Factura::paginate(5);
        $facturas = Factura::orderBy('created_at', 'desc')->paginate(5);
        $totalIngresos = MultipleProduct::sum('price_product_multiple');
        $totalOrdenes = JsonData::count();
        return view('dashboard', compact('products', 'users', 'facturas', 'totalIngresos', 'totalOrdenes'));
    }

    public function dashboard_administrador(){
        return view('dashboardCliente');
    }

    public function exportProductToExcel()
    {
        $templatePath = public_path('assets/documentos/productos.xlsx');
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($templatePath);
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $productos = Product::with('multipleProducts')->get();

        $row = 2;
        foreach ($productos as $producto) {
            $activeWorksheet->setCellValue('A' . $row, $producto->name_product);
            $activeWorksheet->setCellValue('B' . $row, $producto->filtro_product);

            $status = $producto->status_product == 1 ? 'Activo' : 'Inactivo';
            $activeWorksheet->setCellValue('C' . $row, $status);

            $activeWorksheet->getStyle('A' . $row . ':C' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $startRow = $row;
            foreach ($producto->multipleProducts as $multipleProduct) {
                $activeWorksheet->setCellValue('D' . $row, $multipleProduct->size_product_multiple);
                $activeWorksheet->setCellValue('E' . $row, $multipleProduct->price_product_multiple);

                $activeWorksheet->getStyle('D' . $row . ':E' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $activeWorksheet->getStyle('D' . $row . ':E' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setARGB('FFFFFF00');

                $row++;
            }

            if ($startRow === $row) {
                $row++;
            }
        }

        $fileName = 'Productos_data.xlsx';
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($fileName);

        return response()->download($fileName)->deleteFileAfterSend(true);
    }

    public function exportFacturaToExcel()
    {
        $templatePath = public_path('assets/documentos/facturas.xlsx');
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($templatePath);
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $facturas = Factura::with('relations')->get();

        $row = 2;
        $totalGeneral = 0;
        foreach ($facturas as $factura) {
            $activeWorksheet->setCellValue('A' . $row, $factura->name_mesa);
            $activeWorksheet->setCellValue('B' . $row, $factura->nombres_clientes);
            $activeWorksheet->setCellValue('C' . $row, $factura->metodo_pago);
            $activeWorksheet->setCellValue('D' . $row, $factura->fecha_factura);

            $status = $factura->status_factura == 1 ? 'Activo' : 'Inactivo';
            $activeWorksheet->setCellValue('E' . $row, $status);

            $activeWorksheet->getStyle('A' . $row . ':E' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $activeWorksheet->getStyle('A' . $row . ':E' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB('FFCCFFCC');

            $totalFactura = 0;

            foreach ($factura->relations as $relation) {
                $activeWorksheet->setCellValue('F' . $row, $relation->name_product_factura);
                $activeWorksheet->setCellValue('G' . $row, $relation->size_product_factura);
                $activeWorksheet->setCellValue('H' . $row, $relation->price_product_factura);
                $activeWorksheet->setCellValue('I' . $row, $relation->igv_incluido);

                $totalFactura += $relation->price_product_factura;

                $activeWorksheet->getStyle('F' . $row . ':I' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $activeWorksheet->getStyle('F' . $row . ':I' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setARGB('FFFFFF00');

                $row++;
            }

            $activeWorksheet->setCellValue('J' . ($row - 1), 'S/. ' . number_format($totalFactura, 2));
            $activeWorksheet->getStyle('J' . ($row - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $activeWorksheet->getStyle('J' . ($row - 1))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB('FFFFFF00');

            $totalGeneral += $totalFactura;

            $row++;
        }

        $activeWorksheet->setCellValue('L4', 'S/. ' . number_format($totalGeneral, 2));
        $activeWorksheet->getStyle('L4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $activeWorksheet->getStyle('L4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFFFFF00');

        $fileName = 'Facturas_data.xlsx';
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($fileName);

        return response()->download($fileName)->deleteFileAfterSend(true);
    }

    public function exportToExcel()
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(0);
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setTitle('Productos');

        $templatePathProductos = public_path('assets/documentos/productos.xlsx');
        $productos = Product::with('multipleProducts')->get();

        $row = 2;
        foreach ($productos as $producto) {
            $activeWorksheet->setCellValue('A' . $row, $producto->name_product);
            $activeWorksheet->setCellValue('B' . $row, $producto->filtro_product);

            $status = $producto->status_product == 1 ? 'Activo' : 'Inactivo';
            $activeWorksheet->setCellValue('C' . $row, $status);

            $activeWorksheet->getStyle('A' . $row . ':C' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $startRow = $row;
            foreach ($producto->multipleProducts as $multipleProduct) {
                $activeWorksheet->setCellValue('D' . $row, $multipleProduct->size_product_multiple);
                $activeWorksheet->setCellValue('E' . $row, $multipleProduct->price_product_multiple);

                $activeWorksheet->getStyle('D' . $row . ':E' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $activeWorksheet->getStyle('D' . $row . ':E' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setARGB('FFFFFF00');

                $row++;
            }

            if ($startRow === $row) {
                $row++;
            }
        }

        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(1);
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setTitle('Facturas');

        $templatePathFacturas = public_path('assets/documentos/facturas.xlsx');
        $facturas = Factura::with('relations')->get();

        $row = 2;
        $totalGeneral = 0;
        foreach ($facturas as $factura) {
            $activeWorksheet->setCellValue('A' . $row, $factura->name_mesa);
            $activeWorksheet->setCellValue('B' . $row, $factura->nombres_clientes);
            $activeWorksheet->setCellValue('C' . $row, $factura->metodo_pago);
            $activeWorksheet->setCellValue('D' . $row, $factura->fecha_factura);

            $status = $factura->status_factura == 1 ? 'Activo' : 'Inactivo';
            $activeWorksheet->setCellValue('E' . $row, $status);

            $activeWorksheet->getStyle('A' . $row . ':E' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $activeWorksheet->getStyle('A' . $row . ':E' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB('FFCCFFCC');

            $totalFactura = 0;

            foreach ($factura->relations as $relation) {
                $activeWorksheet->setCellValue('F' . $row, $relation->name_product_factura);
                $activeWorksheet->setCellValue('G' . $row, $relation->size_product_factura);
                $activeWorksheet->setCellValue('H' . $row, $relation->price_product_factura);
                $activeWorksheet->setCellValue('I' . $row, $relation->igv_incluido);

                $totalFactura += $relation->price_product_factura;

                $activeWorksheet->getStyle('F' . $row . ':I' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $activeWorksheet->getStyle('F' . $row . ':I' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setARGB('FFFFFF00');

                $row++;
            }

            $activeWorksheet->setCellValue('J' . ($row - 1), 'S/. ' . number_format($totalFactura, 2));
            $activeWorksheet->getStyle('J' . ($row - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $activeWorksheet->getStyle('J' . ($row - 1))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB('FFFFFF00');

            $totalGeneral += $totalFactura;

            $row++;
        }

        $activeWorksheet->setCellValue('L4', 'S/. ' . number_format($totalGeneral, 2));
        $activeWorksheet->getStyle('L4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $activeWorksheet->getStyle('L4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFFFFF00');

        $fileName = 'Reporte_Productos_y_Facturas.xlsx';
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($fileName);

        return response()->download($fileName)->deleteFileAfterSend(true);
    }

}
