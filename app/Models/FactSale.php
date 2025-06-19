<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FactSale
 * 
 * @property int $sales_id
 * @property int|null $segment_id
 * @property int|null $country_id
 * @property int|null $product_id
 * @property int|null $discount_band_id
 * @property int|null $time_id
 * @property float|null $units_sold
 * @property float|null $sale_price
 * @property float|null $gross_sales
 * @property float|null $discounts
 * @property float|null $sales
 * @property float|null $cogs
 * @property float|null $profit
 * 
 * @property DimSegment|null $dim_segment
 * @property DimCountry|null $dim_country
 * @property DimProduct|null $dim_product
 * @property DimDiscountBand|null $dim_discount_band
 * @property DimTime|null $dim_time
 *
 * @package App\Models
 */
class FactSale extends Model
{
	protected $table = 'fact_sales';
	protected $primaryKey = 'sales_id';
	public $timestamps = false;

	protected $casts = [
		'segment_id' => 'int',
		'country_id' => 'int',
		'product_id' => 'int',
		'discount_band_id' => 'int',
		'time_id' => 'int',
		'units_sold' => 'float',
		'sale_price' => 'float',
		'gross_sales' => 'float',
		'discounts' => 'float',
		'sales' => 'float',
		'cogs' => 'float',
		'profit' => 'float'
	];

	protected $fillable = [
		'segment_id',
		'country_id',
		'product_id',
		'discount_band_id',
		'time_id',
		'units_sold',
		'sale_price',
		'gross_sales',
		'discounts',
		'sales',
		'cogs',
		'profit'
	];

	public function dim_segment()
	{
		return $this->belongsTo(DimSegment::class, 'segment_id');
	}

	public function dim_country()
	{
		return $this->belongsTo(DimCountry::class, 'country_id');
	}

	public function dim_product()
	{
		return $this->belongsTo(DimProduct::class, 'product_id');
	}

	public function dim_discount_band()
	{
		return $this->belongsTo(DimDiscountBand::class, 'discount_band_id');
	}

	public function dim_time()
	{
		return $this->belongsTo(DimTime::class, 'time_id');
	}
}
