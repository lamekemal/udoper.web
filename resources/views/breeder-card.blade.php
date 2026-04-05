<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Carte de Membre - {{ $breeder->full_name }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .card { border: 1px solid #000; padding: 20px; width: 400px; margin: 0 auto; }
        .header { text-align: center; font-size: 18px; font-weight: bold; }
        .info { margin-top: 20px; }
        .info p { margin: 5px 0; }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            Coopérative UDOPER-AD<br>
            Carte de Membre
        </div>
        <div class="info">
            <p><strong>Nom Complet:</strong> {{ $breeder->full_name }}</p>
            <p><strong>Email:</strong> {{ $breeder->email }}</p>
            <p><strong>Contact:</strong> {{ $breeder->contact }}</p>
            <p><strong>Date de Naissance:</strong> {{ $breeder->date_of_birth ? \Carbon\Carbon::parse($breeder->date_of_birth)->format('d/m/Y') : '' }}</p>
            <p><strong>Lieu de Naissance:</strong> {{ $breeder->place_of_birth }}</p>
            <p><strong>Adresse:</strong> {{ $breeder->neighborhood }}, {{ $breeder->borough }}, {{ $breeder->city }}, {{ $breeder->geographic_location }}</p>
            <p><strong>Numéro Éleveur:</strong> {{ $breeder->breeder_number }}</p>
            <p><strong>Date d'Adhésion:</strong> {{ $breeder->date_of_membership ? \Carbon\Carbon::parse($breeder->date_of_membership)->format('d/m/Y') : '' }}</p>
            <p><strong>Date d'Inscription:</strong> {{ $breeder->date_of_registration ? \Carbon\Carbon::parse($breeder->date_of_registration)->format('d/m/Y') : '' }}</p>
            <p><strong>Organisation:</strong> {{ $breeder->organization }}</p>
        </div>
    </div>
</body>
</html>