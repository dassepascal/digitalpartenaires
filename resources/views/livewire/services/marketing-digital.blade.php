<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>
<div class="bg-gray-900 text-white">
    <div class="container mx-auto p-8">
        <h1
            class=" text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-700  to-violet-500 pt-10 mb-6">
            Donnez un élan à votre précence en ligne</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 min-h-screen">
        <!-- Section gauche avec l'image -->
        <div class="flex items-center justify-center bg-black">
            <img src="{{ asset('storage/photos/femmeOrdi.png') }}" alt="Femme sur ordinateur" class="max-w-full h-auto">
        </div>

        <!-- Section droite avec le texte -->
        <div class="p-10 flex flex-col justify-center">
            <h1
                class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-700  to-violet-500 mb-6">
                Introduction au<br> marketing digital</h1>
            <p class="text-lg mb-6">
                Le marketing digital est devenu une composante essentielle de la stratégie de toute entreprise moderne.
                Il s'agit de l'ensemble des actions marketing menées à travers les canaux numériques, tels que les sites
                web,
                les réseaux sociaux, les moteurs de recherche et les emails, afin de toucher les consommateurs et de
                promouvoir les produits ou services.
                Dans un monde de plus en plus digitalisé, il est crucial pour les entreprises de comprendre les
                principes fondamentaux
                du marketing digital dans le but de réussir à atteindre leurs objectifs commerciaux.
            </p>

        </div>


    </div>

    <div class="container mx-auto p-8">
        <h1
            class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-700  to-violet-500 mb-6">
            Définition et importance du marketing digital</h1>

        <p class="mb-8 text-gray-300">
            Le marketing digital englobe toutes les stratégies marketing utilisant des canaux numériques. Il s'agit
            d'une approche globale qui vise à atteindre les consommateurs où ils se trouvent, en ligne, et à interagir
            avec eux de manière personnalisée. Il est devenu indispensable pour les entreprises car il offre une
            multitude d'avantages, tels que la mesure précise des résultats, la possibilité de cibler des audiences
            spécifiques, la création de contenu engageant et l'interaction directe avec les clients.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-800 p-6 rounded-lg">
                <h2 class="text-xl font-bold mb-2">Augmentation de la visibilité</h2>
                <p>Le marketing digital permet aux entreprises d'atteindre un public plus large, augmentant ainsi leur
                    visibilité et leur portée.</p>
            </div>

            <div class="bg-gray-800 p-6 rounded-lg">
                <h2 class="text-xl font-bold mb-2">Amélioration de l'engagement</h2>
                <p>Des plateformes numériques comme les réseaux sociaux facilitent l'interaction avec les clients,
                    permettant de créer des relations plus fortes et d'améliorer l'engagement avec la marque.</p>
            </div>

            <div class="bg-gray-800 p-6 rounded-lg">
                <h2 class="text-xl font-bold mb-2">Réduction des coûts</h2>
                <p>Contrairement aux méthodes marketing traditionnelles, le marketing digital peut être plus rentable,
                    permettant de cibler des audiences spécifiques et de mesurer l'impact des campagnes.</p>
            </div>

            <div class="bg-gray-800 p-6 rounded-lg">
                <h2 class="text-xl font-bold mb-2">Mesure et analyse</h2>
                <p>Le marketing digital offre une possibilité unique de suivre et d'analyser les résultats des
                    campagnes, permettant d'optimiser les stratégies et d'améliorer les performances.</p>
            </div>
        </div>


        <h1
            class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-700  to-violet-500 mb-6 mt-10">
            Les 7 points clés du marketing digital</h1>
        <p class="mb-8">Maîtriser les 7 points clés du marketing digital permet aux entreprises de construire une
            stratégie solide et de maximiser leurs résultats. Ces éléments interdépendants doivent être soigneusement
            considérés pour atteindre les objectifs marketing.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-800 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-700 text-white font-bold py-2 px-4 rounded">1</div>
                    <h2 class="ml-4 text-2xl font-semibold">Définir votre marché cible</h2>
                </div>
                <p>Identifiez précisément votre audience en déterminant des critères tels que l'âge, le niveau d'études,
                    les revenus, les centres d'intérêt et les besoins. Cette segmentation vous permettra d'adapter vos
                    actions marketing pour toucher efficacement votre public cible.</p>
            </div>

            <div class="bg-gray-800 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-700 text-white font-bold py-2 px-4 rounded">2</div>
                    <h2 class="ml-4 text-2xl font-semibold">Analyser la concurrence (benchmarking) </h2>
                </div>
                <p> Étudiez les stratégies de vos concurrents pour comprendre leurs forces et leurs faiblesses. Cette
                    analyse vous aidera à élaborer des tactiques marketing plus performantes et à identifier des
                    opportunités sur le marché.</p>
            </div>

            <div class="bg-gray-800 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-700 text-white font-bold py-2 px-4 rounded">3</div>
                    <h2 class="ml-4 text-2xl font-semibold">Optimisation du référencement (SEO)</h2>
                </div>
                <p>Améliorez la visibilité de votre site sur les moteurs de recherche en optimisant son contenu et sa
                    structure. Une bonne stratégie SEO augmente le trafic organique et la notoriété de votre marque.
                </p>
            </div>

            <div class="bg-gray-800 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-700 text-white font-bold py-2 px-4 rounded">4</div>
                    <h2 class="ml-4 text-2xl font-semibold">Utilisation des réseaux sociaux</h2>
                </div>
                <p>Soyez présent sur les plateformes sociales pertinentes pour votre public cible. Les réseaux sociaux
                    permettent d'interagir directement avec votre audience, de créer de l'engagement et de renforcer la
                    visibilité de votre marque. </p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-700 text-white font-bold py-2 px-4 rounded">5</div>
                    <h2 class="ml-4 text-2xl font-semibold">Mettre en place des campagnes publicitaires payantes (SEA):
                    </h2>
                </div>
                <p> Utilisez des annonces payantes pour atteindre rapidement votre audience cible et augmenter votre
                    visibilité en ligne. Les campagnes SEA, comme le paiement par clic (PPC), complètent efficacement le
                    SEO en générant du trafic qualifié vers votre site.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-700 text-white font-bold py-2 px-4 rounded">6</div>
                    <h2 class="ml-4 text-2xl font-semibold"> Optimiser votre site web :
                    </h2>
                </div>
                <p>Assurez-vous que votre site internet est bien conçu, convivial et adapté aux besoins de votre
                    audience. Un site performant est essentiel pour convertir les visiteurs en clients et refléter une
                    image professionnelle de votre entreprise. </p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-700 text-white font-bold py-2 px-4 rounded">7</div>
                    <h2 class="ml-4 text-2xl font-semibold"> Analyser la concurrence (benchmarking):
                    </h2>
                </div>
                <p>Étudiez les stratégies de vos concurrents pour comprendre leurs
                    forces et leurs faiblesses. Cette analyse vous aidera à élaborer des tactiques marketing plus
                    performantes
                    et à identifier des opportunités sur le marché. </p>
            </div>

        </div>
    </div>

    <div class="container mx-auto p-8">
        <h1
            class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-700  to-violet-500 mb-6 mt-5">
            1. Stratégie digitale : la base de votre succès.</h1>
        <p class="mb-6">La première étape cruciale du marketing digital consiste à définir une stratégie claire et des
            objectifs précis. Il est essentiel d'identifier les cibles, leurs besoins et leurs motivations, et
            d’élaborer une stratégie cohérente pour atteindre les résultats souhaités. Cela implique de définir les
            objectifs SMART (<span class="text-blue-400">Specific, Measurable, Achievable, Relevant, Time-bound</span>)
            et de choisir les canaux numériques les plus pertinents pour atteindre le public cible.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-800 p-4 rounded-lg">
                <h2 class="text-xl font-semibold mb-2">1. Analyse de la situation</h2>
                <p>Commencez par un audit complet de votre présence en ligne pour identifier les forces, faiblesses,
                    opportunités et menaces. Cette analyse vous permet de comprendre votre positionnement actuel et
                    d'élaborer une stratégie marketing pertinente. Comprendre le marché, les concurrents et les besoins
                    du public cible <span class="text-yellow-400">est essentiel</span> pour définir une stratégie
                    efficace.</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-lg">
                <h2 class="text-xl font-semibold mb-2">2. Objectifs précis</h2>
                <p>Fixez des objectifs clairs et mesurables pour votre stratégie digitale. Qu'il s'agisse d'accroître la
                    notoriété de votre marque, d'augmenter les ventes ou de fidéliser votre clientèle, nos experts vous
                    accompagnent pour définir les meilleurs indicateurs clés de performance (KPI).</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-lg">
                <h2 class="text-xl font-semibold mb-2">3. Segmentation et ciblage</h2>
                <p>Identifier les segments de clients pertinents et les cibler avec des messages et des contenus adaptés
                    permet d'augmenter l'efficacité des campagnes.</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-lg">
                <h2 class="text-xl font-semibold mb-2">4. Choix des canaux</h2>
                <p>Sélectionner les plateformes digitales les plus pertinentes pour atteindre le public cible et
                    répondre aux objectifs marketing est une étape importante.</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-lg md:col-span-2">
                <h2 class="text-xl font-semibold mb-2">5. Élaboration du budget</h2>
                <p>Déterminer les ressources financières nécessaires pour réaliser les campagnes marketing et les
                    allouer efficacement aux différents canaux.</p>
            </div>
        </div>
   
    </div>
    <div class="container mx-auto p-8">
        <h1
            class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-700  to-violet-500 mb-6 mt-5">
            2. Création de contenu de qualité</h1>
        <p class="mb-6">Créer du contenu pertinent, engageant et de haute qualité est essentiel pour captiver
            l’attention du public et l’inciter à interagir avec la marque. Il est important de comprendre les besoins et
            les intérêts du public cible, et de créer du contenu qui répond à ces attentes.</p>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-gray-800 p-6 rounded-lg">
                <h3 class="text-xl font-bold mb-2">1. Recherche et planification</h3>
                <p>Comprendre les besoins et les intérêts du public cible est essentiel pour créer du contenu pertinent
                    et engageant.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg">
                <h3 class="text-xl font-bold mb-2">2. Création de contenu</h3>
                <p>Produire du contenu de qualité, tel que des articles de blog, des vidéos, des infographies, des
                    publications sur les réseaux sociaux et des emails, qui répondent aux besoins et aux intérêts du
                    public cible.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg">

                <h3 class="text-xl font-bold mb-2">3. Optimisation et distribution</h3>
                <p>Adapter le contenu aux différents canaux et formats, en optimisant le SEO et en utilisant les bons
                    outils de distribution pour maximiser la visibilité et la portée.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg">
                <h3 class="text-xl font-bold mb-2">4. Mesure et analyse</h3>
                <p>Suivre les performances du contenu, analyser les résultats et adapter les stratégies en fonction des
                    insights obtenus pour améliorer l’engagement et l’efficacité.</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto  p-8">
        <!-- En-tête -->
        <h1
            class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-700  to-violet-500 mb-6 mt-5">
            3. Référencement: optimisez votre visibilité</h3>
            <h2
                class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-700  to-violet-500 mb-2 mt-5">
                3.1 SEO</h2>
            <p>
                L'optimisation du référencement (SEO) est essentielle pour améliorer la visibilité du site web sur les
                moteurs de recherche. Il s'agit de mettre en place des stratégies pour améliorer le classement du site
                dans les résultats de recherche, ce qui permet d'attirer un trafic qualifié et de générer des leads.
                L'objectif est de rendre le site web plus pertinent et plus accessible pour les moteurs de recherche.
            </p>

            <!-- Cartes de contenu -->
            <div class="grid md:grid-cols-3 gap-6 mt-5">
                <!-- On-Page -->
                <div class=" bg-gray-800 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-blue-600 mb-4">Optimisation On-Page</h2>
                    <p class="">
                        Comprend l'optimisation du contenu du site web, la structure du site, les mots-clés et les
                        balises médi pour améliorer la visibilité et l'attractivité du site.
                    </p>
                </div>

                <!-- Off-Page -->
                <div class="bg-gray-800 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-green-600 mb-4">Optimisation Off-Page</h2>
                    <p>
                        Se concentre sur les actions menées en dehors du site web, comme la construction de liens, la
                        présence sur les réseaux sociaux et la création de contenu de qualité pour améliorer la
                        réputation et la visibilité du site.
                    </p>
                </div>

                <!-- Analyse -->
                <div class="bg-gray-800 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-purple-600 mb-4">Analyse et suivi</h2>
                    <p>
                        Il est essentiel de suivre les performances SEO, d'analyser les résultats et d'adapter les
                        stratégies en fonction des insights obtenus pour maximiser l'impact.
                    </p>
                </div>
            </div>

            <h2
                class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-700  to-violet-500 mb-2 mt-5">
                3.2 SEA</h2>
            <p>Réalisez des campagnes publicitaires Google Ads (SEA) ciblées pour atteindre votre public cible et
                générer des leads qualifiés.</p>
            <h2
                class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-700  to-violet-500 mb-2 mt-5">
                3.2 Netlinking</h2>
            <p>Réalisez des campagnes publicitaires Google Ads (SEA) ciblées pour atteindre votre public cible et
                générer des leads qualifiés.</p>
                <x-button label="{{'Demander un devis 😃'}}" class="btn-primary mt-5" link="/contact">
            
                </x-button>
    </div>
    
</div>
