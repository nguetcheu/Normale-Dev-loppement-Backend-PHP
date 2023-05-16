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
 * Class Newsletter
 * 
 * @property int $id
 * @property string|null $sujet
 * @property Carbon $date_envoi
 * @property string $contenu
 * 
 * @property Collection|Rubrique[] $rubriques
 *
 * @package App\Models
 */
class Newsletter extends Model
{
	use HasFactory;
	protected $table = 'newsletter';
	public $timestamps = false;

	protected $casts = [
		'date_envoi' => 'datetime'
	];

	protected $fillable = [
		'sujet',
		'date_envoi',
		'contenu'
	];

	public function rubriques()
	{
		return $this->hasMany(Rubrique::class, 'id_news');
	}
}
