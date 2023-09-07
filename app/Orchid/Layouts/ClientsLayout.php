<?php

namespace App\Orchid\Layouts;

use App\Models\Cities;
use App\Models\Client;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class ClientsLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'client';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('name', 'Cliente')
                ->render(function (Client $client) {
                    return $client->name;
                }),
            TD::make('city', 'Ciudad')
                ->render(function ($client) {
                    $city = Cities::where('cod', $client->city)->first();
                    return $city->name;
                })
        ];
    }
}
