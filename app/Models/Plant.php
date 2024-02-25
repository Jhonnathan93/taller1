<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the plant primary key (id)
     * $this->attributes['name'] - string - contains the plant name
     * $this->attributes['description'] - text - contains the plant description
     * $this->attributes['imageUrl'] - string - contains the url of the plant image
     * $this->attributes['price'] - int - contains the plant price
     * $this->attributes['stock'] - int - contains the remain stock units of the plant
     */
    protected $fillable = ['name', 'description', 'imageUrl', 'price', 'stock'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getImageUrl(): string
    {
        return $this->attributes['imageUrl'];
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->attributes['imageUrl'] = $imageUrl;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }
}
