<?php

namespace App\Orchid\Screens;

use App\Models\Cities;
use App\Models\Client;
use Database\Factories\CitiesFactory;
use Orchid\Screen\Screen;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;

class ClientsEditScreen extends Screen
{
    public $clients;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Client $clients): iterable
    {
        return [
            'clients' => $clients
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->clients->exists ? 'Editar cliente' : 'Crear cliente';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Crear Cliente')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->clients->exists),

            Button::make('Actualizar')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->clients->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->clients->exists),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('clients.name')
                    ->title('Nombre de cliente')
                    ->placeholder('Nombre completo')
                    ->help('Para ayuda presione F1'),

                Relation::make('clients.city')
                    ->title('Ciudad')
                    ->fromModel(Cities::class, 'name')

            ])
        ];
    }
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Request $request)
    {
        $this->clients->fill($request->get('clients'))->save();

        Alert::info('Creación exitosa de cliente.');

        return redirect()->route('platform.clients.list');
    }
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->clients->delete();

        Alert::info('Cliente borrado!');

        return redirect()->route('platform.clients.list');
    }
}
