<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentDetail extends Model
{
    use HasFactory;

    protected $fillable = ['tool_id', 'net_worth', 'from_startup', 'franchise_since', 'franchise_init', 'to_startup','min_cash'];

    public function toolDetail()
    {
        return $this->belongsTo(ToolDetail::class, 'tool_id');
    }
}
