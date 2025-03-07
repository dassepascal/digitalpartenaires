<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande de contact a été fait pour vous.  



    

    - Prénom : {{ $data['firstname'] }}
    - Nom : {{ $data['name'] }}
    - Email : {{ $data['email'] }}
    


    **Message :** <br/>
    {{ $data['subject'] }}



</x-mail::message>
