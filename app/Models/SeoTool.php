<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoTool extends Model
{
    use HasFactory;
    protected $fillable = ['tool_id', 'meta_title', 'meta_keyword', 'meta_description'];

    public function toolDetail()
    {
        return $this->belongsTo(ToolDetail::class, 'tool_id');
    }
}
