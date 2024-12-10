<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sunscreen extends Model
{
    use HasFactory;

    protected $table = 'sunscreens';

    protected $primaryKey = 'sunscreen_id';

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_fk', 'brand_id');
    }

    // Relacion de uno a muchos
    public function spf()
    {
        return $this->belongsTo(Spf::class, 'spf_fk', 'spf_id');
    } 

    // Relacion de muchos a muchos
    public function applications()
    {
        return $this->belongsToMany(
            Application::class,
            'sunscreens_have_applications',
            'sunscreen_fk',
            'application_fk',
            'sunscreen_id',
            'application_id'
        );
    }
}
