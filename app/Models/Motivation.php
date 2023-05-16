<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Motivation
 * 
 * @property int $id
 * @property string|null $intitule
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Abonne[] $abonnes
 *
 * @package App\Models
 */
class Motivation extends Model
{
	use HasFactory;
	protected $table = 'motivation';

	protected $fillable = [
		'intitule'
	];

	public function abonnes()
	{
		return $this->hasMany(Abonne::class, 'id_motivation');
	}
}
