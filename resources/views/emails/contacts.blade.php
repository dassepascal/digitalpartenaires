<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande de contact a été faite pour vous.  

- Prénom : {{ $data['firstname'] }}  
- Nom : {{ $data['name'] }}  
- Email : {{ $data['email'] }}  

**La demande concerne :**  
- Site vitrine : {{ in_array('site-vitrine', $data['informationRequest']) ? 'Oui' : 'Non' }}  
- E-commerce : {{ in_array('e-commerce', $data['informationRequest']) ? 'Oui' : 'Non' }}  
- Marketing digital : {{ in_array('marketing-digital', $data['informationRequest']) ? 'Oui' : 'Non' }}  

**Message :**  
{{ $data['subject'] }}

</x-mail::message>