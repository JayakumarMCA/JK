<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolDetail extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'overview', 'overall_rating','product_details', 'cat_id','image', 'type', 'slug','created_by', 'status'];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'tool_id');
    }
    public function reviewFaqs()
    {
        return $this->hasMany(ReviewFaq::class, 'tool_id');
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'tool_id');
    }
    public function airating()
    {
        return $this->hasOne(AiRating::class, 'tool_id');
    }
    public function price()
    {
        return $this->hasMany(Price::class, 'tool_id');
    }
    public function investmentDetail()
    {
        return $this->hasOne(InvestmentDetail::class, 'tool_id');
    }

    public function faq()
    {
        return $this->hasOne(Faq::class, 'tool_id');
    }
    public function seo()
    {
        return $this->hasOne(SeoTool::class, 'tool_id');
    }
}
