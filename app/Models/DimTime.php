<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DimTime
 * 
 * @property int $time_id
 * @property Carbon $date
 * @property int $year
 * @property int $quarter
 * @property int $month_number
 * @property string $month_name
 * 
 * @property Collection|FactSale[] $fact_sales
 *
 * @package App\Models
 */
class DimTime extends Model
{
	protected $table = 'dim_time';
	protected $primaryKey = 'time_id';
	public $timestamps = false;

	protected $casts = [
		'date' => 'datetime',
		'year' => 'int',
		'quarter' => 'int',
		'month_number' => 'int'
	];

	protected $fillable = [
		'date',
		'year',
		'quarter',
		'month_number',
		'month_name'
	];

	public function fact_sales()
	{
		return $this->hasMany(FactSale::class, 'time_id');
	}
}
