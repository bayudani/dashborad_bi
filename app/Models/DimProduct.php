<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DimProduct
 * 
 * @property int $product_id
 * @property string $product
 * @property float|null $manufacturing_price
 * 
 * @property Collection|FactSale[] $fact_sales
 *
 * @package App\Models
 */
class DimProduct extends Model
{
	protected $table = 'dim_product';
	protected $primaryKey = 'product_id';
	public $timestamps = false;

	protected $casts = [
		'manufacturing_price' => 'float'
	];

	protected $fillable = [
		'product',
		'manufacturing_price'
	];

	public function fact_sales()
	{
		return $this->hasMany(FactSale::class, 'product_id');
	}
}
