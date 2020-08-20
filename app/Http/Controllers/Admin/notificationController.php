<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function index (request $request){
        $notifications = auth()->user()->unreadNotifications;
        return view('pages.admin.Index_notification.positive', compact('notifications'));
    }

    public function markNotification(Request $request){
        auth()->user()->unreadNotifications->when($request->input('id'), function($query) use($request){
            return $query->where('id', $request->input('id'));
        })->markAsRead();
        return response()->noContent();
    }
}
