<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Erreur serveur - 500</title>

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
            overflow: hidden;
        }

        .lightning {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            opacity: 0;
            background: rgba(255, 255, 255, 0.3);
            animation: flash 4s infinite;
        }

        @keyframes flash {
            0%, 100% { opacity: 0; }
            49% { opacity: 0; }
            50% { opacity: 1; }
            51% { opacity: 0; }
            54% { opacity: 0; }
            55% { opacity: 0.8; }
            56% { opacity: 0; }
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 700px;
            width: 100%;
            padding: 60px 40px;
            text-align: center;
            animation: shake 0.6s ease-out;
            position: relative;
            z-index: 1;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        .error-icon {
            width: 150px;
            height: 150px;
            margin: 0 auto 30px;
            position: relative;
        }

        .warning-triangle {
            width: 100%;
            height: 100%;
            position: relative;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .warning-triangle svg {
            width: 100%;
            height: 100%;
            filter: drop-shadow(0 10px 20px rgba(102, 126, 234, 0.3));
        }

        .sparks {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .spark {
            position: absolute;
            width: 6px;
            height: 6px;
            background: #ff6b6b;
            border-radius: 50%;
            animation: sparkle 2s infinite;
        }

        .spark:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
        .spark:nth-child(2) { top: 30%; right: 15%; animation-delay: 0.5s; }
        .spark:nth-child(3) { bottom: 25%; left: 20%; animation-delay: 1s; }
        .spark:nth-child(4) { bottom: 30%; right: 10%; animation-delay: 1.5s; }

        @keyframes sparkle {
            0%, 100% {
                transform: scale(0) translateY(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.5) translateY(-10px);
                opacity: 1;
            }
        }

        .error-code {
            font-size: 120px;
            font-weight: 800;
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            line-height: 1;
            animation: glitch 3s infinite;
        }

        @keyframes glitch {
            0%, 90%, 100% { transform: translate(0); }
            91% { transform: translate(-2px, 2px); }
            92% { transform: translate(2px, -2px); }
            93% { transform: translate(-2px, -2px); }
            94% { transform: translate(2px, 2px); }
            95% { transform: translate(0); }
        }

        h1 {
            font-size: 32px;
            color: #2d3748;
            margin-bottom: 15px;
            font-weight: 700;
        }

        p {
            font-size: 18px;
            color: #718096;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .alert-box {
            background: #fff5f5;
            border: 2px solid #fc8181;
            border-radius: 12px;
            padding: 20px;
            margin: 30px 0;
            text-align: left;
        }

        .alert-box strong {
            color: #c53030;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .alert-box p {
            color: #742a2a;
            margin: 0;
            font-size: 15px;
        }

        .buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #f7fafc;
            transform: translateY(-3px);
        }

        .support-info {
            background: #f7fafc;
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
            text-align: left;
        }

        .support-info h3 {
            color: #2d3748;
            margin-bottom: 15px;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .support-info ul {
            list-style: none;
            padding: 0;
        }

        .support-info li {
            padding: 8px 0;
            color: #4a5568;
            position: relative;
            padding-left: 25px;
            font-size: 15px;
        }

        .support-info li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #48bb78;
            font-weight: bold;
            font-size: 18px;
        }

        .support-info a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .support-info a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .container {
                padding: 40px 25px;
            }

            .error-code {
                font-size: 80px;
            }

            h1 {
                font-size: 24px;
            }

            p {
                font-size: 16px;
            }

            .error-icon {
                width: 100px;
                height: 100px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="lightning"></div>

    <div class="container">
        <div class="error-icon">
            <div class="sparks">
                <div class="spark"></div>
                <div class="spark"></div>
                <div class="spark"></div>
                <div class="spark"></div>
            </div>
            <div class="warning-triangle">
                <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 20 L180 170 L20 170 Z" fill="#ff6b6b" stroke="#c53030" stroke-width="4"/>
                    <circle cx="100" cy="140" r="6" fill="white"/>
                    <path d="M100 80 L100 120" stroke="white" stroke-width="8" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

        <div class="error-code">500</div>

        <h1>Erreur interne du serveur</h1>

        <p>
            Une erreur inattendue s'est produite sur notre serveur.
            Nos équipes techniques ont été automatiquement notifiées et travaillent à résoudre le problème.
        </p>

        <div class="alert-box">
            <strong>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                Ce qui s'est passé :
            </strong>
            <p>Le serveur a rencontré une situation qu'il ne sait pas gérer. Ce problème est temporaire et nous travaillons activement à le résoudre.</p>
        </div>

        <div class="buttons">
            <a href="{{ url('/') }}" class="btn btn-primary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                Retour à l'accueil
            </a>
            <a href="javascript:location.reload()" class="btn btn-secondary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="23 4 23 10 17 10"/>
                    <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/>
                </svg>
                Réessayer
            </a>
        </div>

        <div class="support-info">
            <h3>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                </svg>
                Que faire maintenant ?
            </h3>
            <ul>
                <li>Rafraîchissez la page dans quelques instants</li>
                <li>Si le problème persiste, <a href="mailto:support@votre-site.com">contactez notre support technique</a></li>
                <li>Vérifiez notre <a href="{{ url('/status') }}">page de statut</a> pour les mises à jour</li>
                <li>Revenez plus tard, nous résolvons le problème rapidement</li>
            </ul>
        </div>
    </div>
</body>
</html>
