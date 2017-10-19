<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBulkListIdForeignToPhoneListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phone_list', function (Blueprint $table) {
            //


            $table->foreign('bulk_lists_upload_id')->references('id')->on('bulk_lists_upload');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phone_list', function (Blueprint $table) {
            //
            $table->dropForeign('phone_list_bulk_lists_upload_id_foreign');
            
        });
    }
}
