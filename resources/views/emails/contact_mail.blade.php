<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <p>Hello!</p>
    
    <p>You received a new message via the Kowloon contact form.</p>
    <p><strong>From:</strong> {{ $email }}</p>
    <p><strong>Message: </strong></p>
    <p>{{ $contact_message }}</p>
    
    <p>Have a nice day and don't forget to answer this customer!</p>
</body>
</html>