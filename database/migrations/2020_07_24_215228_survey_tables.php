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
            $table->string('organization_name', 160)->unique();

            $table->timestamps();

        });

        Schema::create('survey_headers', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('organization_id')->unsigned();
            $table->string('survey_name', 160)->nullable()->unique();
            $table->string('instructions', 4096)->nullable();
            $table->string('other_header_info', 255)->nullable();

            $table->index('organization_id','fk_surveys_organizations1');

            $table->foreign('organization_id')
                ->references('id')->on('organizations');

            $table->timestamps();

        });

        Schema::create('input_types', function(Blueprint $table) {

            $table->increments('id');
            $table->string('input_type_name', 160)->unique();

            $table->timestamps();

        });

        Schema::create('survey_sections', function(Blueprint $table) {

            $table->increments('id');
            $table->string('section_name', 160)->nullable()->unique();
            $table->string('section_title', 45)->nullable();
            $table->string('section_subheading', 45)->nullable();
            $table->boolean('section_required_yn')->default(1);


            $table->timestamps();

        });

        Schema::create('survey_sections_headers', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('survey_header_id')->unsigned()->nullable();
            $table->integer('survey_section_id')->unsigned()->nullable();

            $table->index('survey_header_id','fk_survey_sections_surveys');
            $table->index('survey_section_id','fk_questions_survey_sections');

            $table->foreign('survey_header_id')
                ->references('id')->on('survey_headers');

            $table->foreign('survey_section_id')
                ->references('id')->on('survey_sections');
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


            $table->index('input_type_id','fk_questions_question_types1');
            $table->index('survey_section_id','fk_questions_survey_sections1');

            $table->foreign('input_type_id')
                ->references('id')->on('input_types');

            $table->foreign('survey_section_id')
                ->references('id')->on('survey_sections');


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
            $table->string('answer_text', 255)->nullable();
            $table->date('date_fill')->nullable();


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
        Schema::drop('answers');
        Schema::drop('question_options');
        Schema::drop('option_choices');
        Schema::drop('questions');
        Schema::drop('survey_sections');
        Schema::drop('input_types');
        Schema::drop('survey_headers');
        Schema::drop('organizations');

    }
}

