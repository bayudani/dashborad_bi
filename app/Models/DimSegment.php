<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DimSegment
 * 
 * @property int $segment_id
 * @property string $segment
 * 
 * @property Collection|FactSale[] $fact_sales
 *
 * @package App\Models
 */
class DimSegment extends Model
{
	protected $table = 'dim_segment';
	protected $primaryKey = 'segment_id';
	public $timestamps = false;

	protected $fillable = [
		'segment'
	];

	public function fact_sales()
	{
		return $this->hasMany(FactSale::class, 'segment_id');
	}
}
