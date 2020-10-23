<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $fillable = [
        'user_id', 'total', 'subtotal', 'lat', 'lon', 'street', 'house', 'details', 'zone', 'estado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(InvoiceProduct::class, 'invoices_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * TODO: cambiar a zone_id
     */
    public function zones()
    {
        return $this->belongsTo(Zone::class, 'zone', 'id');
    }
}
