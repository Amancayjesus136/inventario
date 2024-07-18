<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JsonData extends Model
{
    use HasFactory;

    protected $fillable = ['json_data', 'status_orden'];

    protected $casts = [
        'json_data' => 'array',
        'status_orden' => 'integer',
    ];

    public function calculateTotalPrice()
    {
        $totalPrice = 0;

        // Decodificar el JSON si es un string
        $jsonData = is_string($this->json_data) ? json_decode($this->json_data, true) : $this->json_data;

        if (is_array($jsonData)) {
            foreach ($jsonData as $item) {
                if (isset($item['selectedPrice'])) {
                    $totalPrice += (float) $item['selectedPrice'];
                }
            }
        }

        return $totalPrice;
    }

    public static function calculateTotalPriceAll()
    {
        $totalPrice = 0;

        $allRecords = self::all();
        foreach ($allRecords as $record) {
            $totalPrice += $record->calculateTotalPrice();
        }

        return $totalPrice;
    }
}
