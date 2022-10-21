<?php

namespace App\Http\Livewire;

use App\Models\Admin\Alumni;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class AlumniTable extends DataTableComponent
{
    protected $model = Alumni::class;



    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function builder(): Builder
    {

        return Alumni::query();
    }


    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Designation", "designation")
                ->sortable()
                ->searchable(),
            Column::make('Published', "status")
                ->format(
                    fn ($value, $row, Column $column) => $row->status ? 'Yes' : 'No'
                )
                ->sortable(),

            Column::make("Created at", "created_at")
                ->format(fn ($value, $row, Column $column) => $row->created_at->toDateTimeString())
                ->sortable(),
            Column::make("Last updated", "updated_at")
                ->format(fn ($value, $row, Column $column) => $row->updated_at->toDateTimeString())
                ->sortable(),
            Column::make('Action')
                ->label(
                    fn ($row, Column $column) => view('shared.action', ['route' => 'admin.alumins'])->withRow($row)
                ),
        ];
    }
}