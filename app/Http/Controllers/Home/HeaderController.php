<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Header;
use App\Models\Survey;
use Illuminate\Http\Request;

/**
 * HeaderController
 */
class HeaderController extends Controller
{
    /**
     * index
     *
     * @param  mixed $header
     * @return void
     */
    public function index(Header $header)
    {
        $sections = $header->sections()->get();

        $sections_count = $sections->count();

        return view('pages.home.headers.index', compact(
            'header',
            'sections',
            'sections_count'
        ));
    }

    /**
     * running
     *
     * @param  mixed $header
     * @return void
     */
    public function running(Header $header)
    {
        if (
            url()->previous() != route('headers.info', $header->slug) &
            url()->previous() != route('headers.running', $header->slug)
        )
        {
            return redirect()->route('headers.info', $header->slug);
        }

        $sections = $header->sections()->with('questions')->get();

        return view('pages.home.headers.running', compact(
            'header',
            'sections',
        ));
    }

    /**
     * done
     *
     * @param  mixed $request
     * @return void
     */
    public function done(Request $request)
    {
        $survey = Survey::create([
            'user_id'   => 1,
            'header_id' => 1,
        ]);

        foreach ($request->answers as $key => $answer) {

            Answer::create([
                'survey_id'     => $survey->id,
                'question_id'   => $request->questions[$key],
                'text'          => $answer
            ]);
        }

        return redirect()->back();
    }

}
