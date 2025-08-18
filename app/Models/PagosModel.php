<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;
 

    class PagosModel extends Model
    {
        use HasFactory;

        protected $table = 'pagos';

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         * 
         
         */
        protected $fillable = [
            'user_id',
            'item_a_pagar',
            'cantidad',
            'tipo_pago',
        ];
        /**
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
            'cantidad' => 'decimal:2',
        ];

        /**
         * Get the user that owns the payment.
         */
        public function user()
        {
            return $this->belongsTo(User::class);
            return $this->belongsTo(User::class, 'user_id');
}
        
    }
