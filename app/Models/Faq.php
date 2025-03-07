<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ['tool_id', 'key_benefit', 'marketing_support', 'traning_program', 'contact_information'];

    // Belongs to ToolDetail
    public function toolDetail()
    {
        return $this->belongsTo(ToolDetail::class, 'tool_id');
    }
}
