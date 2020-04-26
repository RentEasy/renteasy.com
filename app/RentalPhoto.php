<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RentalPhoto
 *
 * @property int $id
 * @property int $rental_id
 * @property string $name
 * @property string $filename
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalPhoto whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalPhoto whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalPhoto whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalPhoto whereRentalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalPhoto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RentalPhoto extends Model
{
    //
}
