<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('fullname')->comment('Tên đầy đủ');
            $table->date('birthday')->nullable()->comment('Ngày sinh');
            $table->tinyInteger('gender')->default(0)->comment('Giới tính: 0-Bí mật, 1-Nam, 2-Nữ');
            $table->string('address', 1000)->nullable();
            $table->string('mobile', 15)->nullable()->comment('Số di động, định dạng 84xxx');
            $table->string('api_token')->nullable()->comment('Chuỗi token sau khi login thành công');
            $table->dateTime('last_login_at')->nullable()->comment('Thời điểm login lần cuối');
            $table->tinyInteger('status')->default(0)->comment('Trạng thái hoạt động: 0-Chưa kích hoạt, 1-Đã kích hoạt, 2-Tạm khóa, 3-Đã nghỉ làm');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
