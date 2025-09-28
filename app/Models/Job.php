<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function employer()
    {
        return $this->belongsTo(\App\Models\Employer::class);
    }
    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class, 'job_listing_tag', 'job_listing_id', 'tag_id');
    }



    use HasFactory;

    // Tell Laravel to use the 'job_listings' table instead of 'jobs'
    protected $table = 'job_listings';
}
