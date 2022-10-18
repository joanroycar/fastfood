<?php

namespace App\Models;

use App\Traits\CartTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use CartTrait;

    protected $fillable = ['code', 'name', 'price', 'price2', 'changes', 'cost', 'stock', 'minstock', 'category_id'];

    public static function rules($id)
    {
        if ($id <= 0) {
            return [
                'name'          => 'required|min:3|max:100|string|unique:products',
                'code'          => 'nullable|max:25',
                'category'      => 'required|not_in:elegir',
                'price'         => 'gt:0',
                'cost'          => 'gt:0',
                'stock'         => 'required',
                'minstock'      => 'required'
            ];
        } else {
            return [
                'name'      => "required|min:3|max:100|string|unique:products,name,{$id}",
                'code'      => 'nullable|max:25',
                'category'  => 'required|not_in:elegir',
                'price'     => 'gt:0',
                'cost'      => 'gt:0',
                'stock'     => 'required',
                'minstock'  => 'required'
            ];
        }
    }

    public static $messages = [
        'name.required'     => 'Nombre del producto requerido',
        'name.min'          => 'El nombre debe tener al menos 3 caracteres',
        'name.max'          => 'El nombre debe tener máximo 100 caracteres',
        'name.unique'       => 'El nombre ya existe',
        'code.max'          => 'El código debe tener máximo 25 caracteres',
        'category.required' => 'La categoría es requerida',
        'category.not_in'   => 'Elige una categoría válida',
        'cost.gt'           => 'El costo debe ser mayor a cero',
        'price.gt'          => 'El precio de venta debe ser mayor a cero',
        'stock.required' => 'Ingresa el stock',
        'minstock.required' => 'Ingresa el stock mínimo'
    ];



    ///RELACIONES
    public function sales()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }  
    public function images()
    {
        return $this->morphMany(Image::class, 'model');
    }

    //Get the product's most recent image.
    public function latestImage()
    {
        return $this->morphOne(Image::class, 'model')->latestOfMany();
    }


    //accessors
    public function getImgAttribute()
    {
        if (count($this->images)) {
            if (file_exists('storage/products/' . $this->images->last()->file))
                return  "storage/products/" . $this->images->last()->file;
            else
                return 'storage/image-not-found.png';
        } else {
            return 'storage/image-not-found.png';
        }
    }
    public function getLiveStockAttribute()
    {
        $stock = 0;
        $stockCart = $this->countInCart($this->id);
        if($stockCart > 0)  {
            $stock = $this->stock - $stockCart;
        } else {
            $stock = $this->stock;
        }
        return $stock;
    }



}
