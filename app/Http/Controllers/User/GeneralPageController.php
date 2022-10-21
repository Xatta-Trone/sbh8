<?php

namespace App\Http\Controllers\User;

use App\Enums\NoticeStatus;
use App\Models\Admin\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Administrator;

class GeneralPageController extends Controller
{
    public function notice()
    {
        $notices = Notice::where('status', NoticeStatus::Published)->latest()->paginate(10);

        return view('user.notice', compact('notices'));
    }

    public function administration()
    {
        $administration = Administrator::where('status', NoticeStatus::Published)->get();

        return view('user.administration', compact('administration'));
    }

    public function singleNotice($id)
    {
        $notice = Notice::findOrFail($id);

        return view('user.singleNotice', compact('notice'));
    }
}