<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RentalTenancy
 *
 * @property int $id
 * @property int $rental_id
 * @property int $user_id
 * @property string|null $signed_at
 * @property string|null $start_at
 * @property string|null $end_at
 * @property string $rent_periodicity
 * @property string $deposit_paid_at
 * @property float $rent_deposit
 * @property float $rent_monthly
 * @property float $application_fees
 * @property float $late_payment_fees
 * @property string $late_payment_after
 * @property string $late_payment_periodicity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereApplicationFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereDepositPaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereLatePaymentAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereLatePaymentFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereLatePaymentPeriodicity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereRentDeposit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereRentMonthly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereRentPeriodicity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereRentalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereSignedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereUserId($value)
 * @mixin \Eloquent
 * @property int $landlord_id
 * @property int $tenant_id
 * @property-read \App\User $landlord
 * @property-read \App\Rental $rental
 * @property-read \App\User $tenant
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereLandlordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalTenancy whereTenantId($value)
 */
class RentalTenancy extends Model
{
    public function setRentDepositAttribute($value)
    {
        $this->attributes['rent_deposit'] = str_replace(',', '', $value);
    }
    public function setRentMonthlyAttribute($value)
    {
        $this->attributes['rent_monthly'] = str_replace(',', '', $value);
    }


    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function landlord()
    {
        return $this->belongsTo(User::class, 'landlord_id');
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

}
