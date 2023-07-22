<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anggaran;
use App\Models\Material;
class Pembangunan extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pembangunan';
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

    public function anggaran()
    {
        return $this->belongsTo(Anggaran::class, 'anggaran_id', 'id');
    }

    public function material()
    {
        return $this->hasManyThrough(Material::class, 'pembangunan_id', 'id');
    }
}
