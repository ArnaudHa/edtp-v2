<?php

namespace App\Models;

use App\Events\CourseUpdated;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
    use HasFactory, Notifiable;

    protected $dispatchesEvents = [
        'updated' => CourseUpdated::class,
        'deleted' => CourseUpdated::class
    ];

    public function getPlaceAttribute()
    {
        $result = explode('.', $this->room);

        if(count($result) === 3) {
            return $result[0] > 29 ? 'Petit CNAM' : 'Grand CNAM';
        }

        return false;
    }

    public function getDurationAttribute(): string
    {
        $emojis = [ '😀', '🥳', '😱', '☠️' ];
        $from = Carbon::parse($this->start);
        $to = Carbon::parse($this->end);
        $durationHours = $from->diffInHours($to);
        $durationMinutes = $from->addHours($durationHours)->diffInMinutes($to);

        $selectedEmoji = $emojis[0];

        if($durationHours === 1) {
            $selectedEmoji = $emojis[1];
        }

        if($durationHours === 2 || $durationHours === 3) {
            $selectedEmoji = $emojis[2];
        }

        if($durationHours > 3) {
            $selectedEmoji = $emojis[3];
        }

        return $selectedEmoji . ' ' . ($durationMinutes === 0 ? $durationHours . 'h' : $durationHours . 'h' . $durationMinutes);
    }

    public function getIsVisioAttribute()
    {

    }
}
