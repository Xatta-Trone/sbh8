<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Admin\Page;

class PageTable extends DataTableComponent
{
    protected $model = Page::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Title", "title")
                ->sortable()
                ->searchable(),
            Column::make("Slug", "slug")
                ->sortable()
                ->searchable(),
            Column::make("Page Type", "content_type")
                ->sortable()
                ->searchable(),
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
                    fn ($row, Column $column) => view('shared.action', ['route' => 'admin.pages'])->withRow($row)
                ),
        ];
    }
}