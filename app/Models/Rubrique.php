<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rubrique
 * 
 * @property int $id_rubrique
 * @property string|null $nom
 * @property int $id_news
 * 
 * @property Newsletter $newsletter
 * @property Collection|Abonne[] $abonnes
 *
 * @package App\Models
 */
class Rubrique extends Model
{
	use HasFactory;
	protected $table = 'rubrique';
	protected $primaryKey = 'id_rubrique';
	public $timestamps = false;

	protected $casts = [
		'id_news' => 'int'
	];

	protected $fillable = [
		'nom',
		'id_news'
	];

	public function newsletter()
	{
		return $this->belongsTo(Newsletter::class, 'id_news');
	}

	public function abonnes()
	{
		return $this->hasMany(Abonne::class, 'id_table_rubrique');
	}
}
