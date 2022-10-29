<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin\AlumniData;
use Intervention\Image\Facades\Image;

class OptimizeAlumniImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alumni:optimize-img';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Moves the image form old path to new location';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        AlumniData::chunkById(200, function ($alumins) {
            foreach ($alumins as $alumni) {
                $this->info($alumni->image);
                $imgName = explode("/", $alumni->image)[1];
                $oldImg = public_path('uploads/alumni-img/') . $imgName;
                // dd($oldImg);
                $public_path = public_path('uploads/alumni-data/' . $imgName);
                $imgFile = Image::make($oldImg);
                $imgFile->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($public_path);
                // $alumni->update(['image' => 'alumni-data/' . $alumni->image]);
                // $old  = explode('/', $alumni->image);
                // $fixedName = implode('/', [$old[2], $old[3]]);
                // dd(implode('/', [$old[2], $old[3]]));
                // $alumni->update(['image' => $fixedName]);
            }
        }, $column = 'id');
    }
}