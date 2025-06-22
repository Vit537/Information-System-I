<?php

namespace App\Livewire\PaqueteUsuarios;

use App\Models\Paquete_Ventas\venta;
use App\Models\Paquete_Ventas\cotizacion;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Indicadores extends Component
{
    public $firstRun = true;
    public $showDataLabels = false;
    
    public function render()
    {
        $ventas = venta::where('id','!=',null)->get();
        $lineChartModel = $ventas
        ->reduce(function ($lineChartModel, $data) use ($ventas) {
            $index = $ventas->search($data);
            $cotizacion = cotizacion::find( $data->cotizacion_id);
            return $lineChartModel->addPoint($data->created_at->format('y-m-d'), $cotizacion->monto_total, ['id' => $data->id]);
        }, LivewireCharts::lineChartModel()
            ->setTitle('Evolucion de Ventas')
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
            // ->sparklined()
        );

        $multilineChartModel = $ventas
        ->reduce(function ($multilineChartModel, $data) use ($ventas) {
            $index = $ventas->search($data);
            $cotizacion = cotizacion::find( $data->cotizacion_id);
            return $multilineChartModel->addSeriesPoint(
                $data->cotizacion_id, 
                $index, 
                $cotizacion->monto_total, 
                ['id' => $data->id]);
        }, LivewireCharts::multiLineChartModel()
            ->setTitle('Evolucion de Cotizaciones')
            ->setAnimated($this->firstRun)
            ->setSmoothCurve()
            ->setXAxisVisible(true)
            ->setDataLabelsEnabled($this->showDataLabels)
            // ->sparklined()
        );

        $productos = DB::table('cotizacion_detalle as cd')
            ->join('producto as p', 'cd.producto_id', '=', 'p.id')
            ->select('p.id as producto_id', 'p.nombre as nombre', DB::raw('SUM(cd.cantidad) as cantidad_total'))
            ->groupBy('p.id', 'p.nombre')
            ->orderByDesc('cantidad_total')
            ->get();
        $columnChartModel = $productos->groupBy('producto_id')
        ->reduce(function ($columnChartModel, $data) {
            $item = $data->first();
            return $columnChartModel->addColumn($item->nombre, $item->cantidad_total, '#75FA8D');
        }, LivewireCharts::columnChartModel()
            ->setTitle('Productos Cotizados')
            ->setAnimated($this->firstRun)
            ->setLegendVisibility(false)
            ->setDataLabelsEnabled($this->showDataLabels)
            // ->setOpacity(0.25)
            ->setColors(['#923EFF'])
            ->setColumnWidth(90)
            ->withGrid()
        );

        $this->firstRun = false;

        return view('livewire.paquete-usuarios.indicadores')->with([
            'lineChartModel' => $lineChartModel,
            'multilineChartModel' => $multilineChartModel,
            'columnChartModel' => $columnChartModel
        ]);
    }
}
