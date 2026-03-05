<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Post extends Model implements HasMedia

{
    use HasFactory; 
    use InteractsWithMedia;
    use HasSlug;
    protected $fillable = [
        // 'image',
        'title',
        'content',
        'category_id',
        'user_id',
        'slug',
        'published_at',
        
    ];
    public function registerMediaConversions(?Media $media = null): void
{
    $this
        ->addMediaConversion('preview')
        ->width(400);
    $this
        ->addMediaConversion('large')
        ->width(1200);
        
}
 public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
public function registerMediaCollections(): void{
    $this->addMediaCollection('default')->singleFile();
}    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function claps()
    {
        return $this->hasMany(Clap::class);
    }
    public function readTime(){
    $wordCount = str_word_count(strip_tags($this->content));
    $readingTime = ceil($wordCount / 100); // Assuming an average reading speed of 200 words per minute
    return max(1, $readingTime);
}
    public function imageUrl($conversionName = '')
{
   $media =$this->getFirstMedia();
   if(!$media){
    return null;
   }
    if ($media->hasGeneratedConversion($conversionName)) {
        return $media->getUrl($conversionName);
    }
    return $media->getUrl();
}
}
