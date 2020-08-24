<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Header;
use App\Models\Survey;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Section;

class ProfileController extends Controller
{
      /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * index
     *
     * @return void
     */
    public function edit()
    {
        $user = auth()->user();
        $repDiario  = (Survey::where('surveyed_id', auth()->user()->id)->where('header_id', '3')->get())->count();
        $repTray  = (Survey::where('surveyed_id', auth()->user()->id)->where('header_id', '4')->get())->count();
        $repSeg  = (Survey::where('surveyed_id', auth()->user()->id)->where('header_id', '6')->get())->count();
        $headers = Header::with('surveys')
            ->where('pollster', 1)
            ->where ('id', 2)
            ->OrderBy('created_at', 'desc')
            ->get();$header = Header::where ('id', '2')->get();
        return view('pages.home.profile', compact('user', 'repDiario', 'repTray', 'repSeg', 'headers'));
    }

    public function update(UserRequest $request, User $user)
    {
       $user->update($request->all());

        return back()->withInput()->with(['error' => 'Algo va mal']);
    }

    public function editReporte (Header $header)
    {
       $sections = $header->sections()->with('questions')->get();
        $aux  = Survey::where('surveyed_id', auth()->user()->id)->where('header_id', '2')->OrderBy('id', 'desc')->pluck('id')->first();
        if ($aux <> null){
            $ant = Answer::where('survey_id', $aux)->where( function($query) {
                $query->where('choice_id', '<>', '')->orWhere('text', '<>', '');
            })->get();
            if ($ant->count() > 0){
                return view('pages.home.headers.edit', compact(
                    'header',
                    'sections',
                    'ant',
                ));
            }
        }
        else{
            return view('pages.home.headers.doing', compact(
                'header',
                'sections',
            ));
        }
    }
}