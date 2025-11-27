<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page introuvable - 404</title>

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

        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 1; }
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 700px;
            width: 100%;
            padding: 60px 40px;
            text-align: center;
            animation: fadeIn 0.6s ease-out;
            position: relative;
            z-index: 1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .error-code {
            font-size: 120px;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            line-height: 1;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .astronaut {
            width: 150px;
            height: 150px;
            margin: 0 auto 30px;
            position: relative;
            animation: floating 4s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px) rotate(-5deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        .astronaut svg {
            width: 100%;
            height: 100%;
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

        .suggestions {
            background: #f7fafc;
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
            text-align: left;
        }

        .suggestions h3 {
            color: #2d3748;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .suggestions ul {
            list-style: none;
            padding: 0;
        }

        .suggestions li {
            padding: 8px 0;
            color: #4a5568;
            position: relative;
            padding-left: 25px;
        }

        .suggestions li::before {
            content: "→";
            position: absolute;
            left: 0;
            color: #667eea;
            font-weight: bold;
        }

        .suggestions a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .suggestions a:hover {
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

            .astronaut {
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
    <div class="stars">
        <div class="star" style="top: 20%; left: 10%;"></div>
        <div class="star" style="top: 40%; left: 80%; animation-delay: 1s;"></div>
        <div class="star" style="top: 60%; left: 20%; animation-delay: 2s;"></div>
        <div class="star" style="top: 80%; left: 70%; animation-delay: 0.5s;"></div>
        <div class="star" style="top: 30%; left: 50%; animation-delay: 1.5s;"></div>
        <div class="star" style="top: 70%; left: 90%; animation-delay: 2.5s;"></div>
    </div>

    <div class="container">
        <div class="astronaut">
            <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="80" r="40" fill="#667eea" opacity="0.2"/>
                <circle cx="100" cy="80" r="30" fill="#667eea"/>
                <circle cx="90" cy="75" r="5" fill="white"/>
                <circle cx="110" cy="75" r="5" fill="white"/>
                <path d="M 90 90 Q 100 95 110 90" stroke="white" stroke-width="2" fill="none"/>
                <ellipse cx="100" cy="130" rx="35" ry="45" fill="#764ba2"/>
                <rect x="70" y="110" width="15" height="40" rx="7" fill="#667eea"/>
                <rect x="115" y="110" width="15" height="40" rx="7" fill="#667eea"/>
                <rect x="75" y="165" width="15" height="25" rx="5" fill="#764ba2"/>
                <rect x="110" y="165" width="15" height="25" rx="5" fill="#764ba2"/>
            </svg>
        </div>

        <div class="error-code">404</div>

        <h1>Oups ! Page introuvable</h1>

        <p>
            La page que vous recherchez semble s'être perdue dans l'espace.
            Elle a peut-être été déplacée ou n'existe plus.
        </p>

        <div class="buttons">
            <a href="{{ url('/') }}" class="btn btn-primary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                Retour à l'accueil
            </a>
            <a href="javascript:history.back()" class="btn btn-secondary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="19" y1="12" x2="5" y2="12"/>
                    <polyline points="12 19 5 12 12 5"/>
                </svg>
                Page précédente
            </a>
        </div>

        <div class="suggestions">
            <h3>Suggestions :</h3>
            <ul>
                <li>Vérifiez l'URL pour détecter d'éventuelles fautes de frappe</li>
                <li><a href="{{ url('/') }}">Retournez à la page d'accueil</a></li>
                <li>Utilisez la recherche pour trouver ce que vous cherchez</li>
                {{-- TO DO : changer l(url) --}}
                <li><a href="mailto:support@halteausilence.fr">Contactez notre support</a> si le problème persiste</li>
            </ul>
        </div>
    </div>

    <script>
        // Génère des étoiles aléatoires
        const starsContainer = document.querySelector('.stars');
        for (let i = 0; i < 30; i++) {
            const star = document.createElement('div');
            star.className = 'star';
            star.style.top = Math.random() * 100 + '%';
            star.style.left = Math.random() * 100 + '%';
            star.style.animationDelay = Math.random() * 3 + 's';
            starsContainer.appendChild(star);
        }
    </script>
</body>
</html>
