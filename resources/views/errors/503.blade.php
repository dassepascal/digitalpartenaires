<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maintenance en cours</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #333;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 100%;
            padding: 60px 40px;
            text-align: center;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            position: relative;
        }

        .gear {
            width: 100%;
            height: 100%;
            border: 8px solid #667eea;
            border-radius: 50%;
            position: relative;
            animation: rotate 3s linear infinite;
        }

        .gear::before,
        .gear::after {
            content: '';
            position: absolute;
            background: #667eea;
        }

        .gear::before {
            width: 20px;
            height: 40px;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
        }

        .gear::after {
            width: 40px;
            height: 20px;
            left: -20px;
            top: 50%;
            transform: translateY(-50%);
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        h1 {
            font-size: 32px;
            color: #2d3748;
            margin-bottom: 20px;
            font-weight: 700;
        }

        p {
            font-size: 18px;
            color: #718096;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .info {
            background: #f7fafc;
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 8px;
            text-align: left;
            margin-top: 30px;
        }

        .info strong {
            color: #2d3748;
            display: block;
            margin-bottom: 10px;
        }

        .countdown {
            font-size: 16px;
            color: #667eea;
            font-weight: 600;
            margin-top: 15px;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 20px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }

        @media (max-width: 600px) {
            .container {
                padding: 40px 25px;
            }

            h1 {
                font-size: 26px;
            }

            p {
                font-size: 16px;
            }

            .icon {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">
            <div class="gear"></div>
        </div>

        <h1>Maintenance en cours</h1>

        <p>
            Notre site est actuellement en cours de maintenance pour vous offrir une meilleure expérience.
            Nous serons de retour très bientôt !
        </p>

        <div class="info">
            <strong>Mode maintenance activé</strong>
            Le site sera de nouveau disponible sous peu.
        </div>

        @if(isset($retryAfter))
            <div class="countdown">
                Temps estimé : {{ $retryAfter }} secondes
            </div>
        @endif

        <a href="mailto:support@votre-site.com" class="btn">Nous contacter</a>
    </div>

    <script>
        // Recharge automatique toutes les 30 secondes
        setTimeout(() => {
            location.reload();
        }, 30000);
    </script>
</body>
</html>
