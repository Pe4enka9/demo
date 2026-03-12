<?php

namespace App\Models;

use App\Enums\AppStatus;
use App\Enums\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int|null $service_id
 * @property string $address
 * @property string $phone
 * @property Carbon $date
 * @property string|null $another_service
 * @property PaymentMethod $payment_method
 * @property AppStatus $status
 * @property string|null $reason
 *
 * @property-read Service $service
 */
class Application extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'datetime',
        'payment_method' => PaymentMethod::class,
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
