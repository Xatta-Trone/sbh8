<?php

namespace App\Http\Livewire;

use App\Models\Admin\Notice;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class NoticeTable extends DataTableComponent
{
    protected $model = Notice::class;



    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function builder(): Builder
    {

        return Notice::query();
    }


    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Title", "title")
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
                // Note: The view() method is reserved for columns that have a field
                ->label(
                    fn ($row, Column $column) => view('shared.action', ['route' => 'admin.notices'])->withRow($row)
                ),
        ];
    }
}