<?php

namespace App\Trait;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


trait SummerNoteImageExtract
{
    public function extractImage($newContent = null, $oldContent = null)
    {
        if ($newContent == null) return null;


        $newContentDom = new \DomDocument();
        @$newContentDom->loadHtml(mb_convert_encoding($newContent, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $newImages = $newContentDom->getElementsByTagName('img');
        $newImagePaths = [];


        // foreach <img> in the submited message
        foreach ($newImages as $img) {
            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if (preg_match('/data:image/', $src)) {

                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];

                // Generating a random filename
                $filename = uniqid('sbh', true);
                $filepath = "/uploads/images/$filename.$mimetype";
                $public_path = public_path($filepath);
                $dirPath = public_path("/uploads/images/");

                if (!file_exists($dirPath)) {
                    mkdir($dirPath, 666, true);
                }

                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)     // encode file to the specified mimetype
                    ->save($public_path);

                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $newImagePaths[] = $new_src;
            } else {
                $newImagePaths[] = $src;
            }
        } // <!--endforeach


        // check for old images
        $oldImagePaths = [];
        if ($oldContent) {
            $oldContents = new \DomDocument();
            @$oldContents->loadHtml(mb_convert_encoding($oldContent, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $oldImages = $oldContents->getElementsByTagName('img');

            // foreach <img> in the submited message
            foreach ($oldImages as $img) {
                $src = $img->getAttribute('src');
                // if the img source is 'data-url'
                if (!preg_match('/data:image/', $src)) {
                    $oldImagePaths[] = $src;
                } // <!--endif
            } // <!--endforeach
            $oldContents->saveHTML();
        }

        // check which files to remove
        $filesToRemove = array_diff($oldImagePaths, $newImagePaths);


        if (count($filesToRemove) > 0) {
            $rearrangedPath = collect($filesToRemove)->map(function ($e) {
                return Str::after($e, url('uploads'));
            })->toArray();
            Storage::delete($rearrangedPath);
        }


        return $newContentDom->saveHTML();
    }
}