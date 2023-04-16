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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('name')->nullable()->comment('Tên dự án');
            $table->string('description', 1000)->nullable()->comment('Mô tả dự án');
            $table->date('start_date')->comment('Ngày bắt đầu thực hiện dự án, ngày kickoff');
            $table->date('end_date')->comment('Ngày kết thúc dự án');
            $table->date('hand_over_date')->comment('Ngày bàn giao dự án');
            $table->integer('priority')->default(0)->comment('Độ ưu tiên sắp xếp, 1 là cao nhất, cùng độ ưu tiên sẽ sắp xếp theo mức độ level');
            $table->tinyInteger('level')->default(0)->comment('Mức độ quan trọng dự án: 0-Bình thường, 1-Gấp, 2-Rất gấp, 3-Hỏa tốc');
            $table->tinyInteger('status')->default(0)->comment('Trạng thái dự án: 0-Tạo mới, 1-Chờ duyệt, 2-Đã duyệt, 3-Đang thực hiện, 4-Hoàn thành, 5-Tạm dừng');
            $table->foreignId('leader_id')->nullable()->constrained('users')->comment('ID của user làm Leader dự án');
            $table->foreignId('pm_id')->nullable()->constrained('users')->comment('ID của user làm PM dự án');
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
        Schema::dropIfExists('projects');
    }
};
