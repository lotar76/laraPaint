<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	use HasFactory;

	/**
	 * @var mixed
	 */
	protected $table = 'images';
	protected $primaryKey = 'id';
	protected $fillable = [
		'url',
		'title',
		'promt',
		'filename',
		'size',
		'width',
		'height',
		'user-id'
	];


}
