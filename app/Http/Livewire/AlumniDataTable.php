<?php

namespace App\Http\Livewire;

use App\Models\Admin\AlumniData;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class AlumniDataTable extends DataTableComponent
{
    protected $model = AlumniData::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function builder(): Builder
    {

        return AlumniData::query()->select('image');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Unique Id", "unique_id")
                ->sortable()
                ->searchable(),
            Column::make("E-mail", "email")
                ->sortable()
                ->searchable(),
            Column::make("Graduation year", "graduation_year")
                ->sortable()
                ->searchable(),
            ImageColumn::make('image')
                ->location(
                    fn ($row) => url('uploads/' . ($row->image ?? 'no-image.png'))
                )
                ->attributes(fn ($row) => [
                    'class' => 'rounded-full',
                    'alt' => $row->image,
                    'height' => 75
                ]),
            Column::make('Publish status', "status")
                ->format(
                    fn ($value, $row, Column $column) => ($row->status == 0  ? '<span class="badge badge-danger">Pending approval</span>' : $row->status) ? '<span class="badge badge-success">Published</span>' : '<span class="badge badge-danger">Not Published</span>'
                )
                ->html()
                ->sortable(),
            Column::make("Last updated", "updated_at")
                ->format(fn ($value, $row, Column $column) => $row->updated_at?->toDateTimeString())
                ->sortable(),
            Column::make('Action')
                ->label(
                    fn ($row, Column $column) => view('shared.action', ['route' => 'admin.alumni-data'])->withRow($row)
                ),
        ];
    }
}