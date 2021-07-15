<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class ArticlesSubChannels extends Model
{
    protected $collection = 'articles_sub_channels';
    public $timestamps = false;
    
}
