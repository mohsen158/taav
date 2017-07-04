<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

    public function up()
    {
        Schema::table('steps', function(Blueprint $table) {
            $table->foreign('prerequisite')->references('id')->on('steps')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('steps', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('member_step', function(Blueprint $table) {
            $table->foreign('member_id')->references('id')->on('members')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('member_step', function(Blueprint $table) {
            $table->foreign('step_id')->references('id')->on('steps')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::table('steps', function(Blueprint $table) {
            $table->dropForeign('steps_prerequisite_foreign');
        });
        Schema::table('steps', function(Blueprint $table) {
            $table->dropForeign('steps_user_id_foreign');
        });
        Schema::table('member_step', function(Blueprint $table) {
            $table->dropForeign('member_step_member_id_foreign');
        });
        Schema::table('member_step', function(Blueprint $table) {
            $table->dropForeign('member_step_step_id_foreign');
        });
    }
}