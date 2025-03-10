<?php

use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Illuminate\Support\Facades\Mail;

new class extends Component {
    use Toast;

    public string $name = '';
    public string $firstname = '';
    public string $email = '';
    public string $subject = '';
    public array $informationRequest = []; // Nouvelle propriété pour les checkbox

    public array $rules = [
        'name' => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'informationRequest' => 'required|array|min:1', // Validation pour les checkbox
    ];
    
    // Personnaliser les noms des champs
    public function attributes()
    {
        return [
            'name' => 'Nom',
            'firstname' => 'Prénom',
            'email' => 'Email',
            'subject' => 'Objet de la demande',
            'informationRequest' => 'Informations demandées',
        ];
    }

    // Personnaliser les messages d'erreur
    public function messages()
    {
        return [
            'informationRequest.required' => 'Vous devez sélectionner au moins une option d\'information.',
        ];
    }

    public function submit(): void
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'firstname' => $this->firstname,
            'email' => $this->email,
            'subject' => $this->subject,
            'informationRequest' => $this->informationRequest, // Ajout des choix dans les données
        ];

        Mail::send(new \App\Mail\ContactMail($data));

        $this->success('Votre demande a été envoyée avec succès !', position: 'toast-top toast-center');

        $this->reset(['name', 'firstname', 'email', 'subject', 'informationRequest']);
    }
};
?>
<div style="max-width: 700px; margin: 0 auto;">
    <x-card class="w-full shadow-md shadow-gray-500" shadow separator>
        <h1 class="text-2xl font-bold mb-6">{{ __('Contactez-nous') }}</h1>

        <form wire:submit="submit">
            <div class="grid gap-6 md:grid-cols-2">
                <x-input wire:model="name" label="{{ __('Nom') }}" placeholder="{{ __('Entrez votre nom') }}"
                     />
                <x-input wire:model="firstname" label="{{ __('Prénom') }}" placeholder="{{ __('Entrez votre prénom') }}"
                     />
                <x-input wire:model="email" type="email" label="{{ __('Email') }}"
                    placeholder="{{ __('Entrez votre email') }}"  />
                <x-textarea wire:model="subject" label="{{ __('Objet de la demande') }}"
                    placeholder="{{ __('Objet de votre demande') }}"  />
            </div>

            <!-- Nouvelle section pour les checkbox -->
            <div class="mt-6">
                <h2 class="text-lg font-bold mb-2"> {{ __('Informations demandées') }} </h2>
                <div class="space-y-2">
                    <x-checkbox label="{{ __('Site vitrine') }}" wire:model="informationRequest"
                        value="site-vitrine" />
                    <x-checkbox label="{{ __('E-commerce') }}" wire:model="informationRequest" value="e-commerce" />
                    <x-checkbox label="{{ __('Blog') }}" wire:model="informationRequest" value="Blog" />
                    <x-checkbox label="{{ __('Marketing digital') }}" wire:model="informationRequest"
                        value="marketing-digital" />
                        <x-checkbox label="{{ __('Autres') }}" wire:model="informationRequest"
                        value="autres" />
                </div>
                <!-- Afficher les erreurs pour informationRequest -->
                {{-- @error('informationRequest')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror --}}
            </div>

            <div class="mt-6">
                <x-button type="submit" class="btn-primary" icon="o-paper-airplane">
                    {{ __('Envoyer') }}
                </x-button>
            </div>
        </form>
    </x-card>
</div>
