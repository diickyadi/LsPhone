<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $table = 'about_sections';

    protected $fillable = [
        'judul',
        'subjudul',
        'foto',
        'poin1',
        'poin2',
        'poin3',
        'poin4',
        'poin5',
        'poin6',
        'poin7',
        'poin8',
    ];
}
