<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('pagos', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('item_a_pagar', 255);
                $table->string('tipo_pago', 255);
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('pagos');
        }
    };
