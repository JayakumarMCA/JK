<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['tool_id', 'quality', 'franchise_support', 'roi', 'trust_on_bussiness'];

    public function toolDetail()
    {
        return $this->belongsTo(ToolDetail::class, 'tool_id');
    }
}
