<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersPositivesExport implements FromView
{
    public function view(): View
    {
        $users = User::where("status", 1)->get();

        return view('export.user_positive', [
            'users' => $users
        ]);
    }
}
