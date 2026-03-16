<!DOCTYPE html>
<html>
<head>
    <title>Nouveau message de contact</title>
</head>
<body style="font-family: sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; border: 1px solid #eee; padding: 20px; border-radius: 10px;">
        <h2 style="color: #1A1B4B; border-bottom: 2px solid #00A3A2; padding-bottom: 10px;">Nouveau message de contact</h2>
        <p><strong>Nom :</strong> {{ $data['name'] }}</p>
        <p><strong>Email :</strong> {{ $data['email'] }}</p>
        <p><strong>Objet :</strong> {{ $data['subject'] }}</p>
        <p><strong>Service :</strong> {{ $data['service'] }}</p>
        <p><strong>Message :</strong></p>
        <div style="background: #f9f9f9; padding: 15px; border-radius: 5px; white-space: pre-wrap;">{{ $data['message'] }}</div>
    </div>
</body>
</html>
