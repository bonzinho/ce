<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
            $table->increments('id');
            $table->string('denomination');
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->text('work_plan')->nullable();
            $table->text('rider_tecnique')->nullable();
            $table->text('program')->nullable();;
            $table->text('notes')->nullable();
            $table->boolean('scheduling')->default(0); // se o agendamento de reunião foi feito
            $table->float('provisional_price')->nullable();
            $table->float('final_price')->nullable();
            $table->integer('participants_number');
            $table->integer('days_number');
            $table->string('programme_doc')->nullable();
            $table->string('procedding_doc')->nullable();

            //relações
            $table->integer('abrangence_id')->unsigned();
            $table->foreign('abrangence_id')->references('id')->on('event_abrangences');  // estados do evento

            $table->integer('eventState_id')->unsigned();
            $table->foreign('eventState_id')->references('id')->on('event_states');  // estados do evento

            $table->integer('eventType_id')->unsigned();
            $table->foreign('eventType_id')->references('id')->on('event_types');  // estados do evento

            $table->integer('eventKind_id')->unsigned(); // natureza do evento
            $table->foreign('eventKind_id')->refereces('id')->on('event_kinds');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('events');
	}

}
