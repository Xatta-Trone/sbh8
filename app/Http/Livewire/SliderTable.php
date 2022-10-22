<?php

namespace App\Http\Livewire;

use App\Models\Admin\Slider;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class SliderTable extends DataTableComponent
{
    protected $model = Slider::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function builder(): Builder
    {

        return Slider::query();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make('Image Name', 'image')
                ->sortable()
                ->searchable(),
            ImageColumn::make('Image preview', 'image')
                ->location(
                    fn ($row) => url('uploads/' . $row->image)
                )
                ->attributes(fn ($row) => [
                    'class' => 'rounded-full',
                    'alt' => $row->image,
                    'height' => 100
                ]),
            Column::make('Published', "status")
                ->format(
                    fn ($value, $row, Column $column) => $row->status ? 'Yes' : 'No'
                )
                ->sortable(),
            Column::make("Last updated", "updated_at")
                ->format(fn ($value, $row, Column $column) => $row->updated_at?->toDateTimeString())
                ->sortable(),
            Column::make('Action')
                ->label(
                    fn ($row, Column $column) => view('shared.action', ['route' => 'admin.sliders'])->withRow($row)
                ),
        ];
    }
}