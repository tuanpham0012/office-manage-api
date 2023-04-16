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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('start_date')->comment('Ngày bắt đầu thực hiện công việc');
            $table->date('end_date')->comment('Ngày kết thúc công việc');
            $table->integer('priority')->default(0)->comment('Độ ưu tiên sắp xếp, 1 là cao nhất, cùng độ ưu tiên sẽ sắp xếp theo mức độ level');
            $table->tinyInteger('level')->default(0)->comment('Mức độ quan trọng dự án: 0-Bình thường, 1-Gấp, 2-Rất gấp, 3-Hỏa tốc');
            $table->tinyInteger('status')->default(0)->comment('Trạng thái dự án: 0-Tạo mới, 1-Đã duyệt, 2-Đã giao, 3-Đang thực hiện, 4-Hoàn thành, 5-Tạm dừng, 6-Chuyển cho người khác');
            $table->foreignId('receiver_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->dateTime('transferred_at')->nullable()->comment('Ngày kết thúc dự án, ngày kickoff');
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
        Schema::dropIfExists('tasks');
    }
};
