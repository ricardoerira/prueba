<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SurveyTables extends Migration
{
    public function up()
    {
        Schema::create('organizations', function(Blueprint $table) {

            $table->increments('id');
            $table->string('organization_name', 160);

            $table->unique('organization_name','survey_name_unique');

            $table->timestamps();

        });

        Schema::create('survey_headers', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('organization_id')->unsigned();
            $table->string('survey_name', 160)->nullable();
            $table->string('instructions', 4096)->nullable();
            $table->string('other_header_info', 255)->nullable();

            $table->unique('survey_name','survey_name_unique');

            $table->index('organization_id','fk_surveys_organizations1');

            $table->foreign('organization_id')
                ->references('id')->on('organizations');

            $table->timestamps();

        });

        Schema::create('input_types', function(Blueprint $table) {

            $table->increments('id');
            $table->string('input_type_name', 160);

            $table->unique('input_type_name','survey_name_unique');

            $table->timestamps();

        });

        Schema::create('survey_sections', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('survey_header_id')->unsigned()->nullable();
            $table->string('section_name', 160)->nullable();
            $table->string('section_title', 45)->nullable();
            $table->string('section_subheading', 45)->nullable();
            $table->boolean('section_required_yn')->default(1);

            $table->unique('section_name','survey_name_unique');

            $table->index('survey_header_id','fk_survey_sections_surveys1');

            $table->foreign('survey_header_id')
                ->references('id')->on('survey_headers');

            $table->timestamps();

        });

        Schema::create('questions', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('survey_section_id')->unsigned();
            $table->integer('input_type_id')->unsigned();
            $table->string('question_name', 700);
            $table->string('question_subtext', 500)->nullable();
            $table->boolean('question_required_yn')->nullable();
            $table->boolean('answer_required_yn')->nullable()->default(1);
            $table->boolean('allow_mutiple_option_answers_yn')->nullable()->default(0);


            $table->unique('allow_mutiple_option_answers_yn','allow_mutiple_option_answers_yn_unique');

            $table->index('input_type_id','fk_questions_question_types1');
            $table->index('survey_section_id','fk_questions_survey_sections1');

            $table->foreign('input_type_id')
                ->references('id')->on('input_types');

            $table->foreign('survey_section_id')
                ->references('id')->on('survey_sections');


            $table->timestamps();

        });



        Schema::create('unit_of_measures', function(Blueprint $table) {

            $table->increments('id');
            $table->string('unit_of_measures_name', 160);

            $table->unique('unit_of_measures_name','survey_name_unique');

            $table->timestamps();

        });

        Schema::create('option_choices', function(Blueprint $table) {

            $table->increments('id');
            $table->string('option_choice_name', 45);



            $table->timestamps();

        });

        Schema::create('question_options', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->integer('option_choice_id')->unsigned();


            $table->index('question_id','fk_question_options_questions1');
            $table->index('option_choice_id','fk_question_options_option_choices1');

            $table->foreign('question_id')
                ->references('id')->on('questions');

            $table->foreign('option_choice_id')
                ->references('id')->on('option_choices');

            $table->timestamps();

        });

        Schema::create('answers', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('identification')->unsigned();
            $table->integer('question_option_id')->unsigned();
            $table->integer('answer_numeric')->nullable();
            $table->string('answer_text', 255)->nullable();
            $table->boolean('answer_yn')->nullable();
            $table->integer('unit_of_measure_id')->unsigned()->nullable();

            $table->index('unit_of_measure_id','fk_answers_unit_of_measure1');
            $table->index('question_option_id','fk_answers_question_options1');



            $table->foreign('unit_of_measure_id')
                ->references('id')->on('unit_of_measures');

            $table->foreign('question_option_id')
                ->references('id')->on('question_options');

            $table->timestamps();

        });

        Schema::create('survey_comments', function(Blueprint $table) {

            $table->integer('id');
            $table->integer('survey_header_id')->unsigned();
            $table->integer('identification_number')->unsigned();
            $table->string('comments', 4096)->nullable();

            $table->primary('id');

            $table->index('survey_header_id','fk_survey_comments_surveys1');


            $table->foreign('survey_header_id')
                ->references('id')->on('survey_headers');

            $table->timestamps();

        });

        Schema::create('user_survey_sections', function(Blueprint $table) {

            $table->integer('id');
            $table->integer('identification_number')->unsigned();
            $table->integer('survey_section_id')->unsigned();
            $table->dateTime('completed_on')->nullable();

            $table->primary('id');

            $table->index('survey_section_id','fk_user_survey_sections_survey_sections1');

            $table->foreign('survey_section_id')
                ->references('id')->on('survey_sections');



            $table->timestamps();

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_survey_sections');
        Schema::drop('survey_comments');
        Schema::drop('answers');
        Schema::drop('question_options');
        Schema::drop('option_choices');
        Schema::drop('unit_of_measures');
        Schema::drop('questions');
        Schema::drop('survey_sections');
        Schema::drop('input_types');
        Schema::drop('survey_headers');
        Schema::drop('organizations');

    }
}

