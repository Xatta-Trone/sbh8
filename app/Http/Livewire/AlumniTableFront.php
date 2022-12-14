<?php

namespace App\Http\Livewire;

use App\Models\Admin\AlumniData;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class AlumniTableFront extends DataTableComponent
{
    protected $model = AlumniData::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {

        return AlumniData::query()->select('image')->where('status', 1);
    }

    public function columns(): array
    {
        return [
            // Column::make("Id", "id")
            //     ->sortable(),

            Column::make("Name", "name")
                ->sortable()
                ->searchable(),

            Column::make("Nick Name", "nick_name")
                ->sortable()
                ->searchable(),
            Column::make("Department ", "department")
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
                    'height' => 100
                ]),


        ];
    }
}