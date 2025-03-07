<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiRating extends Model
{
    use HasFactory;
    protected $fillable = ['tool_id', 'g_2', 'capterra', 'trust_radius', 'gartner_peer_insights','software_advice'];

    public function toolDetail()
    {
        return $this->belongsTo(ToolDetail::class, 'tool_id');
    }
}
