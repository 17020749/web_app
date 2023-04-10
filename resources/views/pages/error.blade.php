<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: gray;
            
        }
        .error-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .error-message {
            text-align: center;
        }
        .error-message h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .error-message p {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-message">
            <h1>{{ $statusCode}}</h1>
            <p>{{$message}}</p>
        </div>
    </div>
</body>
</html>