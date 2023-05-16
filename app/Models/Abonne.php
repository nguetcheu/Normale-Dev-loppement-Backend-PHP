<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Abonne
 * 
 * @property int $id_abonne
 * @property string $nom
 * @property string $prenom
 * @property int $age
 * @property string $sexe
 * @property string $profession
 * @property string $rue
 * @property string $code_postal
 * @property string $ville
 * @property string $pays
 * @property string $telephone
 * @property string $email
 * @property int $id_table_rubrique
 * @property int $id_motivation
 * 
 * @property Motivation $motivation
 * @property Rubrique $rubrique
 *
 * @package App\Models
 */
class Abonne extends Model
{
	use HasFactory;
	protected $table = 'abonne';
	protected $primaryKey = 'id_abonne';
	public $timestamps = false;

	protected $casts = [
		'age' => 'int',
		'id_table_rubrique' => 'int',
		'id_motivation' => 'int'
	];

	protected $fillable = [
		'nom',
		'prenom',
		'age',
		'sexe',
		'profession',
		'rue',
		'code_postal',
		'ville',
		'pays',
		'telephone',
		'email',
		'id_table_rubrique',
		'id_motivation'
	];

	public function motivation()
	{
		return $this->belongsTo(Motivation::class, 'id_motivation');
	}

	public function rubrique()
	{
		return $this->belongsTo(Rubrique::class, 'id_table_rubrique');
	}
}
