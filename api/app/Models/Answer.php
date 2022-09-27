<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
		'answers_user_id',
		'answer',
	];

	public function questions()
	{
		return $this->belongsToMany(Question::class);
	}
}
