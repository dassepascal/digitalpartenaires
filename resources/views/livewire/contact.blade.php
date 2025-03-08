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

<div class="container mx-auto p-5">
    <x-card class="w-full shadow-md shadow-gray-500" shadow separator>
        <h1 class="text-2xl font-bold mb-6">{{ __('Contactez-nous') }}</h1>

        <form wire:submit="submit">
            <div class="grid gap-6 md:grid-cols-2">
                <x-input wire:model="name" label="{{ __('Nom') }}" placeholder="{{ __('Entrez votre nom') }}"
                    required />
                <x-input wire:model="firstname" label="{{ __('Prénom') }}" placeholder="{{ __('Entrez votre prénom') }}"
                    required />
                <x-input wire:model="email" type="email" label="{{ __('Email') }}"
                    placeholder="{{ __('Entrez votre email') }}" required />
                <x-input wire:model="subject" label="{{ __('Objet de la demande') }}"
                    placeholder="{{ __('Entrez l\'objet de votre demande') }}" required />
            </div>

            <!-- Nouvelle section pour les checkbox -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Demande d\'information') }}</label>
                <div class="space-y-2">
                    <x-checkbox 
                        label="{{ __('Site vitrine') }}"
                        wire:model="informationRequest"
                        value="site-vitrine"
                    />
                    <x-checkbox 
                        label="{{ __('E-commerce') }}"
                        wire:model="informationRequest"
                        value="e-commerce"
                    />
                    <x-checkbox 
                        label="{{ __('Marketing digital') }}"
                        wire:model="informationRequest"
                        value="marketing-digital"
                    />
                </div>
                @error('informationRequest') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
            </div>

            <div class="mt-6">
                <x-button type="submit" class="btn-primary" icon="o-paper-airplane">
                    {{ __('Envoyer') }}
                </x-button>
            </div>
        </form>
    </x-card>
</div>