<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Admin\SiteSetting;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SiteSettings extends Component
{
    use WithFileUploads;

    public  $settings;
    public  $newLogo = null;
    public  $newOgImage = null;
    // public  $name;
    // public  $name_short;
    // public  $keywords;
    // public  $phone;
    // public  $address;
    // public  $email;
    // public  $description;
    // public  $description_short;
    // public  $scripts;
    // public  $links;



    public function mount()
    {
        $s = SiteSetting::all();
        $this->settings = $s;

        foreach ($s as $setting) {
            $this->{$setting->key} = $setting->value;
        }
    }

    public function hydrate()
    {
        Cache::forget('site_settings');
    }

    public function submit($formData)
    {
        // dd($formData);

        SiteSetting::where('key', $formData['key'])->update(['value' => $formData['value']]);
        flash('Settings updated')->success();
        return redirect()->route('admin.site-settings.index');
    }

    public function updateLogo()
    {
        $this->validate([
            'newLogo' => 'image|max:1024',
        ]);

        if ($this->newLogo != null) {
            if ($this->logo) {
                Storage::delete($this->logo);
            }

            $this->fileName = 'site/site_logo' . '.' . $this->newLogo->extension();
            $public_path = public_path('/uploads/' . $this->fileName);
            // $this->newLogo->storeAs('', $this->fileName);

            $imgFile = Image::make($this->newLogo->getRealPath());
            $imgFile->resize(null, 1024, function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path);

            SiteSetting::where('key', 'logo')->update(['value' => $this->fileName]);
        }

        flash('Settings updated')->success();
        return redirect()->route('admin.site-settings.index');
    }

    public function updateOgImage()
    {
        // dd($this->newOgImage);

        $this->validate([
            'newOgImage' => 'image|max:1024',
        ]);



        if ($this->newOgImage != null) {
            if ($this->og_image) {
                Storage::delete($this->og_image);
            }

            $this->fileName = 'site/og_image' . '.' . $this->newOgImage->extension();
            // $this->newOgImage->storeAs('', $this->fileName);
            $public_path = public_path('/uploads/' . $this->fileName);
            $imgFile = Image::make($this->newOgImage->getRealPath());
            $imgFile->resize(null, 630, function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path);

            SiteSetting::where('key', 'og_image')->update(['value' => $this->fileName]);
        }

        flash('Settings updated')->success();
        return redirect()->route('admin.site-settings.index');
    }



    public function render()
    {
        return view('livewire.site-settings');
    }
}
