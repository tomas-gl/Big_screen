<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
		'survey_id',
		'num_question',
		'question',
		'type_question',
		'possible_answers',
	];

	public function answer()
	{
		return $this->hasOne(Answer::class);
	}
}
