<?php namespace MspPack\OutLookCalendar;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calendar_events';
	
    protected $guarded = [];
}