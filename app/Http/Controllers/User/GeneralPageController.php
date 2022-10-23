<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\Page;
use App\Enums\NoticeStatus;
use App\Models\Admin\Alumni;
use App\Models\Admin\Notice;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Enums\AdministratorType;
use App\Models\Admin\Administrator;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;

class GeneralPageController extends Controller
{
    public function home()
    {
        $notices = Notice::select('id', 'title', 'created_at')->where('status', 1)->latest()->take(5)->get();
        $notices_ns = Notice::select('id', 'title', 'created_at')->where('status', 1)->where('show_in_ns', 1)->latest()->take(5)->get();
        $sliders = Slider::latest()->where('status', 1)->take(5)->get();
        $provost = Administrator::where('type', AdministratorType::Provost)->where('status', 1)->first();
        $welcome_message = Page::where('slug', 'welcome-message')->where('status', 1)->first();

        return view('welcome', compact('notices', 'sliders', 'provost', 'welcome_message', 'notices_ns'));
    }

    public function notice()
    {
        SEOTools::setTitle('Notices');
        SEOTools::opengraph()->setUrl(route('notice'));
        SEOTools::setCanonical(route('notice'));


        $notices = Notice::where('status', NoticeStatus::Published)->latest()->paginate(20);

        return view('user.notice', compact('notices'));
    }

    public function administration()
    {
        SEOTools::setTitle('Administrator');
        SEOTools::opengraph()->setUrl(route('administration'));
        SEOTools::setCanonical(route('administration'));

        $administration = Administrator::where('status', NoticeStatus::Published)->get();

        return view('user.administration', compact('administration'));
    }

    public function singleNotice($id)
    {
        $id = explode('-', $id)[0];
        $notice = Notice::findOrFail($id);

        SEOTools::setTitle($notice->title);
        SEOTools::opengraph()->setUrl(route('singleNotice', $notice->slug));
        SEOTools::setCanonical(route('singleNotice', $notice->slug));

        return view('user.singleNotice', compact('notice'));
    }

    public function alumni()
    {
        $alumins = Alumni::where('status', 1)->select('id', 'name', 'designation', 'image')->orderBy('name')->paginate(36);

        SEOTools::setTitle('Alumnins');
        SEOTools::opengraph()->setUrl(route('alumni'));
        SEOTools::setCanonical(route('alumni'));

        return view('user.alumni', compact('alumins'));
    }

    public function alumniDetail($slug)
    {
        $id = explode('-', $slug)[0];
        $alumni = Alumni::findOrFail($id);

        SEOTools::setTitle($alumni->name);
        SEOTools::opengraph()->setUrl(route('alumniDetail', $alumni->slug));
        SEOTools::setCanonical(route('alumniDetail', $alumni->slug));

        return view('user.alumniDetail', compact('alumni'));
    }

    public function contact()
    {
        SEOTools::setTitle('Contact');
        SEOTools::opengraph()->setUrl(route('contact'));
        SEOTools::setCanonical(route('contact'));

        return view('user.contact');
    }

    public function getPage($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 1)->firstOrFail();

        SEOTools::setTitle($page->title);
        SEOTools::opengraph()->setUrl(url($page->slug));
        SEOTools::setCanonical(url($page->slug));

        return view('user.dynamic-page', compact('page'));
    }
}
