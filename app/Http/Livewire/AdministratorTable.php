<?php

namespace App\Http\Livewire;

use App\Models\Admin\Administrator;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class AdministratorTable extends DataTableComponent
{
    protected $model = Administrator::class;



    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function builder(): Builder
    {

        return Administrator::query();
    }


    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Type", "type")
                ->sortable()
                ->searchable(),
            // ImageColumn::make('Avatar')
            //     ->location(
            //         fn ($row) =>  $row->image ? url('uploads/' . $row->image) :  url('uploads/no-image.png')
            //     )
            //     ->attributes(fn ($row) => [
            //         'class' => 'img-thumbnail',
            //         'style' => 'height:150px;width:auto',
            //         'alt' => $row->name . ' Avatar',
            //     ]),
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
                // Note: The view() method is reserved for columns that have a field
                ->label(
                    fn ($row, Column $column) => view('shared.action', ['route' => 'admin.administrator'])->withRow($row)
                ),
        ];
    }
}