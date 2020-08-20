<?php

namespace App\Exports;

use App\Models\Survey;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SurveyExport implements FromView
{
    /**
     * __construct
     *
     * @param  mixed $var
     * @return void
     */
    public function __construct($dates, $idSurvey, $view, $users) {
        $this->dates = $dates;
        $this->idSurvey = $idSurvey;
        $this->view = $view;
        $this->users = $users;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        if ($this->users == "all") {
            $surveys = Survey::where("header_id", $this->idSurvey)->get();
        }

        $userIds = [];
        foreach ($this->users  as $user) {
            array_push($userIds, intval($user));
        }

        $surveys = Survey::where("header_id", $this->idSurvey)->whereIn("surveyed_id", $userIds)->whereBetween("created_at", $this->dates)->get();

        return view('export.admin.surveys.' . $this->view, [
            'surveys' => $surveys
        ]);
    }
}
