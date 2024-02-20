<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\LogsViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use LogsViews;

    protected $fillable = [
        'title',
        'content',
        'view_count',
    ];
}
