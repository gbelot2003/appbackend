<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    /**
     * @var string
     */
    protected $table = 'invoices_products';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'invoices_id', 'prod_cant'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoices()
    {
        return $this->belongsTo(Invoice::class, 'invoices_id');
    }


}
