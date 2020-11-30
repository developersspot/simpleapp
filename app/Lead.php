<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['member','source','g_source','title','thread_type','blocked_url','type','where_text','when','status','file_id','created_by','status'];
}
