<x-mail::panel>
Veuillez cliquer sur le lien suivant pour accepter l'invitation envoyée par {{ $sender }}
</x-mail::panel>
<x-mail::button :url="$url" color="success">
Accepter l'Invitation
</x-mail::button>
