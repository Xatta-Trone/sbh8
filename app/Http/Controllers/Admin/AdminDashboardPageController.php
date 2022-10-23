<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Alumni;
use App\Models\Admin\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;

class AdminDashboardPageController extends Controller
{
    public function index()
    {
        $notices = Notice::where('status', 1)->count();
        $alumni = Alumni::count();
        $unread_msg = Contact::where('is_seen', 0)->count();
        $not_replied_msg = Contact::where('is_replied', 0)->count();

        return view('admin.index', compact('notices', 'alumni', 'unread_msg', 'not_replied_msg'));
    }
}