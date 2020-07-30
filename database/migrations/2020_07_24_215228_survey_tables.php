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
            $table->string('name', 160)->unique();
            $table->string('slug', 160)->unique();

            $table->timestamps();

        });

        Schema::create('headers', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('organization_id')->unsigned();
            $table->string('name', 600)->nullable()->unique();
            $table->string('slug')->unique();
            $table->string('instructions', 4096)->nullable();
            $table->string('other_header_info', 255)->nullable();

            $table->index('organization_id','fk_surveys_organizations1');

            $table->foreign('organization_id')
                ->references('id')->on('organizations');

            $table->timestamps();

        });

        Schema::create('input_types', function(Blueprint $table) {

            $table->increments('id');
            $table->string('name', 160)->unique();
            $table->string('slug', 160)->unique();

            $table->timestamps();

        });

        Schema::create('surveys', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('identification')->unsigned();
            $table->integer('header_id')->unsigned()->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('completion_time')->nullable();
            $table->string('slug', 160)->unique();

            $table->index('header_id','fk_survey_sections_surveys1');

            $table->foreign('header_id')
                ->references('id')->on('headers');

            $table->timestamps();

        });

        Schema::create('sections', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('header_id')->unsigned()->nullable();
            $table->string('name', 600)->nullable()->unique();
            $table->string('title', 600)->nullable();
            $table->string('subheading', 600)->nullable();
            $table->boolean('required_yn')->default(1);
            $table->index('header_id','fk_survey_sections_surveys1');
            $table->foreign('header_id')
                ->references('id')->on('headers');

            $table->timestamps();

        });


        Schema::create('questions', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('input_type_id')->unsigned();
            $table->string('name', 900);
            $table->string('subtext', 500)->nullable();
            $table->boolean('required_yn')->nullable();
            $table->boolean('answer_required_yn')->nullable()->default(1);
            $table->boolean('allow_mutiple_option_answers_yn')->nullable()->default(0);
            $table->integer('dependent_question_id')->nullable();
            $table->integer('dependent_question_option_id')->nullable();
            $table->integer('dependent_answer_id')->nullable();

            $table->index('input_type_id','fk_questions_question_types1');

            $table->foreign('input_type_id')
                ->references('id')->on('input_types');

            $table->timestamps();
        });


        Schema::create('question_section', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('section_id')->unsigned();
            $table->integer('question_id')->unsigned();

            $table->index('section_id','fk_sections_questions_sections');
            $table->index('question_id','fk_sections_questions_questions1');

            $table->foreign('section_id')
                ->references('id')->on('sections');
            $table->foreign('question_id')
                ->references('id')->on('questions');
            $table->timestamps();



        });

        Schema::create('choices', function(Blueprint $table) {

            $table->increments('id');
            $table->string('name', 45);

            $table->timestamps();
        });

        Schema::create('choice_question', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->integer('choice_id')->unsigned();

            $table->index('question_id','fk_question_options_questions');
            $table->index('choice_id','fk_question_options_choices');

            $table->foreign('question_id')
                ->references('id')->on('questions');

            $table->foreign('choice_id')
                ->references('id')->on('choices');

            $table->timestamps();
        });

        Schema::create('answers', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('survey_id')->unsigned();
            $table->integer('identification')->unsigned();
            $table->string('text', 855)->nullable();
            $table->index('survey_id','fk_answers_surveys');
            $table->foreign('survey_id')
                ->references('id')->on('surveys');

            $table->timestamps();
        });

        Schema::create('header_comments', function(Blueprint $table) {
            $table->integer('id');
            $table->integer('header_id')->unsigned();
            $table->integer('identification_number')->unsigned();
            $table->string('comments', 4096)->nullable();

            $table->primary('id');

            $table->index('header_id','fk_survey_comments_surveys1');

            $table->foreign('header_id')
                ->references('id')->on('headers');

            $table->timestamps();
        });

        Schema::create('section_user', function(Blueprint $table) {
            $table->integer('id');
            $table->integer('identification_number')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->dateTime('completed_on')->nullable();

            $table->primary('id');

            $table->index('section_id','fk_user_survey_sections_survey_sections1');

            $table->foreign('section_id')
                ->references('id')->on('sections');

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
        Schema::drop('organizations');
        Schema::drop('headers');
        Schema::drop('input_types');
        Schema::drop('surveys');
        Schema::drop('sections');
        Schema::drop('questions');
        Schema::drop('question_section');
        Schema::drop('choices');
        Schema::drop('choice_question');
        Schema::drop('answers');
        Schema::drop('header_comments');
        Schema::drop('section_user');
    }
}
