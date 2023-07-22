<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pembangunan;
use App\Models\KasMasjid;
class Anggaran extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran';
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
    
    public function user()
    {
        return $this->belongsTo(User::class, 'signed_by', 'id');
    }

    public function pembangunan()
    {
        return $this->hasManyThrough(Pembangunan::class, 'anggaran_id', 'id');
    }

    public function kasmasjid()
    {
        return $this->belongsTo(KasMasjid::class, 'kas_id', 'id');
    }
}
