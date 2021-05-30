<?php


namespace App\Infrastructure\Data;


class Data
{
    public static $contacts = [
        [
            'id' => '1',
            'name' => 'Juan',
            'number' => '+51999888000',
        ],
        [
            'id' => '2',
            'name' => 'Henry',
            'number' => '+51999222777',
        ],
        [
            'id' => '3',
            'name' => 'Enrique',
            'number' => '+51999644711',
        ],
        [
            'id' => '4',
            'name' => 'Juliana',
            'number' => '+51950433380',
        ]
    ];

    public static function findOne(string $value, string $field): array
    {
        foreach (Data::$contacts as $item) {
            if ($item["$field"] == $value) {
                return $item;
            }
        }
        return [];
    }
}