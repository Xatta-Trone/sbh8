<?php

namespace App\Http\Controllers\User;

use App\Enums\NoticeStatus;
use App\Models\Admin\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Administrator;
use App\Models\Admin\Alumni;

class GeneralPageController extends Controller
{
    public function notice()
    {
        $notices = Notice::where('status', NoticeStatus::Published)->latest()->paginate(20);

        return view('user.notice', compact('notices'));
    }

    public function administration()
    {
        $administration = Administrator::where('status', NoticeStatus::Published)->get();

        return view('user.administration', compact('administration'));
    }

    public function singleNotice($id)
    {
        $id = explode('-', $id)[0];
        $notice = Notice::findOrFail($id);

        return view('user.singleNotice', compact('notice'));
    }

    public function alumni()
    {
        $alumins = Alumni::where('status', 1)->select('id', 'name', 'designation', 'image')->orderBy('name')->paginate(32);

        return view('user.alumni', compact('alumins'));
    }

    public function alumniDetail($slug)
    {
        $id = explode('-', $slug)[0];
        $alumni = Alumni::findOrFail($id);

        return view('user.alumniDetail', compact('alumni'));
    }

    public function contact()
    {
        return view('user.contact');
    }
}