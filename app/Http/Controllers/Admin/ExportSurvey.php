<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SurveyExport;
use App\Http\Controllers\Controller;
use App\Models\Header;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportSurvey extends Controller
{
    public function index()
    {
        $headers = Header::all();
        $users = User::all();

        return view('pages.admin.exports.surveys.index', compact('headers', 'users'));
    }

    public function export(Request $request)
    {
        $survey = $request->survey;
        $users = $request->users;

        unset($request['survey']);
        unset($request['users']);
        unset($request['_token']);

        if ($this->isAll($users)) {
            return Excel::download(new SurveyExport($request->all(), $survey, $this->setHeader($survey), "all"), 'invoices.xlsx');
        }

        return Excel::download(new SurveyExport($request->all(), $survey, $this->setHeader($survey), $users), 'invoices.xlsx');

    }

    public function isAll(array $users) : bool
    {
        foreach ($users as $user) {
            if ($user == "all") {
                return true;
            }
        }

        return false;
    }

    public function setHeader(String $idHeader): string
    {
        return  "header_0" . strval($idHeader);
    }

}
