<?php

use App\Models\Survey;
use App\Models\User;
use App\Models\Header;
use App\Models\Section;
use App\Models\Question;
use App\Models\Organization;
use App\Models\Answer;

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class GuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($j = 1; $j < 6; $j++) {
            $csvFileName = "form" . $j . ".csv";
            $csvFile = public_path('' . $csvFileName);
            $customerArr = $this->csvToArray($csvFile);

            for ($i = 0; $i < count($customerArr); $i++) {

                if ($customerArr[$i]["Número de documento:"] == 0) {
                    continue;
                }
                $this->createUsers($customerArr[$i]["Número de documento:"]);
                $dateStart = strtotime($customerArr[$i]["Start time"]);
                $dateCompletion = strtotime($customerArr[$i]["Completion time"]);

                $time_posted = date("Y-m-d H:i:s", $dateStart);
                $time_posted2 = date("Y-m-d H:i:s", $dateCompletion);
                $survey_id = $this->createSurveys
                ($time_posted,
                    $time_posted2,
                    $customerArr[$i]["Número de documento:"],
                    $j);
                if ($survey_id != 0) {
                    $header = Header::all()->where('id', $j)->first();
                    $sections = $header->sections()->with('questions')->get();

                    foreach ($customerArr[$i] as $key => $value) {

                        foreach ($sections as $section) {

                            $questions = $section->questions()->get();
                            foreach ($questions as $question) {
                                if ($question->name == $key) {
                                    $this->createAnswer($survey_id, $question->id, $value);
                                }
                            }
                        }
                    }
                }
            }
        }

    }


    function createSurveys($start_time, $completion_time, $user_id, $header_id)
    {
        if ($user_id != "") {


            $survey = Survey::create([

                'surveyed_id' => $user_id,
                'header_id' => $header_id,
                'start_time' => $start_time,
                'completion_time' => $completion_time,
            ]);
            return $survey->id;
        } else {

            return 0;
        }

    }

    function createAnswer($survey_id, $question_id, $text)
    {

        Answer::create([
            'survey_id' => $survey_id,
            'question_id' => $question_id,
            'text' => $text
        ]);


    }

    function createUsers($value)
    {
        $value = round($value);
        $user = DB::table('users')->where('id', $value)->first();
        if ($user == null && $value != "") {

            User::create([
                'id' => $value,
                'name' => 'test',
                'email' => Str::random(10) . 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id' => '1',
                'remember_token' => Str::random(10),
            ]);
        }
    }


    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 10000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);

            }
            fclose($handle);
        }

        return $data;
    }

}
