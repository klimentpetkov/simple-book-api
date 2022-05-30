<?php

namespace App;

use App\Notifications\BookPublished;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'author_id', 'cover'];

    // Author relation
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    // A path to book resource
    public function path()
    {
        return '/books/' . $this->id;
    }

    // Model events
    public static function boot() {
	    parent::boot();

        /**
         * When a book is created a Users notifications are queued for sending
         */
	    static::created(function($book) {
	        Log::info('Book Created Event:' . json_encode($book));

            Notification::send(
                User::where([
                    ['is_author', '=', 0],
                    ['receive_notifications', '=', 1]
                ])->get(),
                new BookPublished($book)
            );
	    });
	}
}
