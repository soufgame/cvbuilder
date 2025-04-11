<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Si le formulaire a été soumis, vous pouvez traiter les données ici
    // (par exemple, les sauvegarder en base de données ou les envoyer par e-mail)
    // Ensuite, rediriger vers le fichier de génération PDF
    header('Location: generate.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Creator - Créez votre CV professionnel en quelques minutes</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- En-tête du site -->
    <header>
        <div class="header-container">
            <a href="#" class="logo">CV Creator</a>
            <nav>
               
            </nav>
        </div>
    </header>

    <!-- Contenu principal -->
    <main>
        <!-- Section héro -->
        <section class="hero">
            <div class="hero-content">
                <h2>Créez un CV professionnel en quelques minutes</h2>
                <p>Notre outil simple et intuitif vous permet de créer un CV attrayant qui mettra en valeur vos compétences et expériences auprès des recruteurs.</p>
            </div>
           
        </section>

        <!-- Formulaire de CV -->
        <div class="container">
            <div class="form-header">
                <h1>Formulaire de création de CV</h1>
                <p class="subheader">Remplissez les champs ci-dessous pour générer votre CV professionnel</p>
            </div>
            <form action="generate.php" method="POST">

                <div class="form-section">
                    <div>
                        <label for="nom">Nom Complet</label>
                        <input type="text" id="nom" name="nom" required placeholder="Entrez votre nom complet">
                    </div>

                    <div>
                        <label for="poste">Poste recherché</label>
                        <input type="text" id="poste" name="poste" required placeholder="Exemple : Assistant administratif">
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="Exemple : vous@exemple.com">
                    </div>

                    <div>
                        <label for="telephone">Numéro de téléphone</label>
                        <input type="tel" id="telephone" name="telephone" required placeholder="Exemple : 123-456-7890">
                    </div>

                    <div>
                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" required placeholder="Exemple : 123 Rue de Exemple, Paris">
                    </div>

                    <div>
                        <label for="competences">Compétences</label>
                        <input type="text" id="competences" name="competences" placeholder="Exemple : Microsoft Office, Gestion du temps, Service client">
                    </div>

                    <div>
                        <label for="langues">Langues</label>
                        <input type="text" id="langues" name="langues" placeholder="Exemple : Anglais (Courant), Français (Natif)">
                    </div>

                    <div>
                        <label for="interets">Intérêts</label>
                        <input type="text" id="interets" name="interets" placeholder="Exemple : Lecture, Musique, Voyage">
                    </div>

                    <div class="full-width">
                        <label for="profil">Profil</label>
                        <textarea id="profil" name="profil" placeholder="Exemple : Professionnel organisé avec une expérience dans la gestion des équipes..."></textarea>
                    </div>

                    <div class="full-width">
                        <label for="experiences">Expériences professionnelles</label>
                        <textarea id="experiences" name="experiences" placeholder="Exemple : Assistant marketing - Entreprise ABC, Janv 2020 - Déc 2021..."></textarea>
                    </div>

                    <div class="full-width">
                        <label for="formation">Formation</label>
                        <textarea id="formation" name="formation" placeholder="Exemple : Licence en Administration des Affaires, Université XYZ, 2015-2018..."></textarea>
                    </div>

                    <div class="full-width">
                        <label for="certifications">Certifications</label>
                        <textarea id="certifications" name="certifications" placeholder="Exemple : Certificat en gestion de projet, 2020..."></textarea>
                    </div>

                    <div class="full-width">
                        <label for="projets">Projets</label>
                        <textarea id="projets" name="projets" placeholder="Exemple : Développement d'une application mobile pour XYZ..."></textarea>
                    </div>

                    <div class="full-width">
                        <label for="references">Références</label>
                        <textarea id="references" name="references" placeholder="Exemple : Jean Dupont, CEO, Entreprise XYZ..."></textarea>
                    </div>
                </div>

                <div class="button-container">
                    <button type="submit">Générer mon CV</button>
                </div>
            </form>
        </div>

        <!-- Section Fonctionnalités -->
        <section class="features">
            <h2 class="section-title text-center">Pourquoi choisir notre outil de création de CV</h2>
            <p class="section-description text-center">Nous vous proposons une solution simple et efficace pour mettre en valeur votre parcours professionnel.</p>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3 class="feature-title">Rapide et Efficace</h3>
                    <p class="feature-description">Créez votre CV professionnel en moins de 10 minutes grâce à notre interface intuitive.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <h3 class="feature-title">Design Moderne</h3>
                    <p class="feature-description">Des modèles élégants conçus par des professionnels du recrutement pour vous démarquer.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3 class="feature-title">Compatible Tous Appareils</h3>
                    <p class="feature-description">Créez et modifiez votre CV depuis n'importe quel appareil, à tout moment.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3 class="feature-title">Optimisé pour les ATS</h3>
                    <p class="feature-description">Nos CV sont optimisés pour être facilement détectés par les logiciels de recrutement.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3 class="feature-title">Sécurité des Données</h3>
                    <p class="feature-description">Vos informations personnelles sont protégées et ne sont jamais partagées avec des tiers.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">💯</div>
                    <h3 class="feature-title">Satisfaction Garantie</h3>
                    <p class="feature-description">Des milliers d'utilisateurs satisfaits ont décroché des entretiens grâce à nos CV.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Pied de page -->
    <footer>
        <div class="footer-container">
            <div class="copyright">© 2025 CV Creator - Tous droits réservés</div>
            <div class="footer-links">
                <a href="#">Conditions d'utilisation</a>
                <a href="#">Politique de confidentialité</a>
                <a href="#">FAQ</a>
                <a href="#">Contact</a>
            </div>
        </div>
    </footer>
</body>
</html>