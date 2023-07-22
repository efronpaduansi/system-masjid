<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengeluaran;
use App\Models\Anggaran;
class KasMasjid extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kas_masjid';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function pengeluaran()
    {
        return $this->hasManyThrough(Pengeluaran::class, 'kas_id', 'id');
    }
    public function anggaran()
    {
        return $this->hasManyThrough(Anggaran::class, 'kas_id', 'id');
    }
}
