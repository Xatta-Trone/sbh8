<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Admin\Contact;

class ContactTable extends DataTableComponent
{
    protected $model = Contact::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("E-mail", "email")
                ->sortable()
                ->searchable(),
            Column::make("Subject", "subject")
                ->sortable()
                ->searchable(),
            Column::make('Seen', "is_seen")
                ->format(
                    fn ($value, $row, Column $column) => $row->is_seen ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>'
                )
                ->html()
                ->sortable(),
            Column::make('Replied', "is_replied")
                ->format(
                    fn ($value, $row, Column $column) => $row->is_replied ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>'
                )
                ->html()
                ->sortable(),

            Column::make("Created at", "created_at")
                ->format(fn ($value, $row, Column $column) => $row->created_at->toDateTimeString())
                ->sortable(),

            Column::make('Action')
                ->label(
                    fn ($row, Column $column) => view('shared.contact-action', ['route' => 'admin.contacts'])->withRow($row)
                ),
        ];
    }
}