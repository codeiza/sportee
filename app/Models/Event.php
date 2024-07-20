<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'start_date', 'end_date'];

    public function getpendingEvents(){
        return $this->where('status', 'pending')->count();
    }

    public function getdoneEvent(){
        return $this->where('status', 'done')->count();
    }

    public function getCourt1Event(){
        return $this->where('title', 'Court1')->count();
    }

    public function getCourt2Event(){
        return $this->where('title', 'Court2')->count();
    }

    public function getCourt3Event(){
        return $this->where('title', 'Court3')->count();
    }



    public static function countByStatus()
    {
        return self::select('status', \DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();
    }
}
