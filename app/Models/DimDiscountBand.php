<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DimDiscountBand
 * 
 * @property int $discount_band_id
 * @property string $discount_band
 * 
 * @property Collection|FactSale[] $fact_sales
 *
 * @package App\Models
 */
class DimDiscountBand extends Model
{
	protected $table = 'dim_discount_band';
	protected $primaryKey = 'discount_band_id';
	public $timestamps = false;

	protected $fillable = [
		'discount_band'
	];

	public function fact_sales()
	{
		return $this->hasMany(FactSale::class, 'discount_band_id');
	}
}
