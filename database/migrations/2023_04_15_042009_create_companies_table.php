<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Tên công ty/doanh nghiệp');
            $table->string('trading_name')->comment('Tên viết tắt, tên giao dịch');
            NestedSet::columns($table);
            $table->integer('depth')->default(0);
            $table->string('representative_name')->comment('Tên người đại diện');
            $table->string('email')->comment('Email liên hệ');
            $table->string('address', 1000)->nullable();
            $table->string('phone')->nullable()->comment('Số di động, định dạng 84xxx');
            $table->string('hotline')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('companies');
    }
};
