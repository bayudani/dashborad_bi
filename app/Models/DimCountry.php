<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DimCountry
 * 
 * @property int $country_id
 * @property string $country
 * 
 * @property Collection|FactSale[] $fact_sales
 *
 * @package App\Models
 */
class DimCountry extends Model
{
	protected $table = 'dim_country';
	protected $primaryKey = 'country_id';
	public $timestamps = false;

	protected $fillable = [
		'country'
	];

	public function fact_sales()
	{
		return $this->hasMany(FactSale::class, 'country_id');
	}
}
