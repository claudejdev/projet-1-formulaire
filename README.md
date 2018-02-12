## Compétences travaillées
- groupe: Maitriser Git (renforcement)
- frontend: css frameworks (initiation)
- backend: PHP programming (initiation aux structures logiques)
- Méthodo: expression d'une solution en chemin logique, via UML (initiation)
- frontend: html sémantique (renforcement)
- frontend: html accessibilité (initiation)
- frontend: Amélioration progressive (initiation)

## Situation-problème
La société *Hackers Poulette* ™ vend des kits et accessoires pour Rasperri Pi à monter soi-même. Elle souhaite permettre à ses utilisateurs de contacter son support technique.
Ta mission: développer un script en php, permettant d'afficher un formulaire de contact et de traiter sa réponse: sanitisation, validation, puis envoi et feedback à l'utilisateur.

![Hackers Poulette Logo](./hackers-poulette-logo.png "Logo Hackers Poulette (via Hipster Logo Generator")


## Critères de performance
- Le formulaire sera du html sémantique, validé par le W3C, et accessible aux non-voyants.
- Si l'utilisateur commet une erreur, lui retourner le formulaire, avec les réponses valides remises dans leurs inputs respectifs.
- Idéalement: afficher les messages d'erreurs à proximité de leur champ respectif.
- Le formulaire effectuera un nettoyage (*sanitization*) et une validation *serverside*
- Si la validation est ok, il enverra le contenu du message par email à une adresse spécifiée.
- implémentation de la technique antispam du *honeypot*
- Les messages d'erreur sont bien formulés, de manière à aider l'utilisateur. (lire [The Four H of Writing Error Messages](http://uxmas.com/2012/the-4-hs-of-writing-error-messages) )
- Ton code est publié sur un repository intitulé "`projet-1-formulaire`"

## Critères de perfectionnement (à implémenter dans un second temps)
- Expérience-utilisateur (UX) soignée (clarté, pertinence, correction (pas de bugs, orthographe correcte...)).

## Découpage de la difficulté en séquences pédagogiques
### Séquence 0: Planifier le travail à effectuer
Etude de la demande, UML, prototypage, Git.

**Champs du formulaire**: prénom & nom + email + pays + message + genre (H/F) + sujet (3 sujets possibles, plusieurs choix possibles)
Tous les champs sont obligatoires, sauf le sujet (dans ce cas, valeur = "Autre")

### Séquence 1: le formulaire de contact (html)
objectif 1: html sémantique, préparer l' **amélioration progressive**  
objectif 2: html accessible aux non-voyants

### Séquence 2: formulaire de contact (css, via framework css)
Utiliser le framework [CSS Bootstrap](http://getbootstrap.com/) pour améliorer rapidement le rendu visuel et l'ergonomie de ton formulaire.

**Charte Graphique du client**

font: https://www.fontsquirrel.com/fonts/bellota 
couleurs: #15c5bd + #FFF + #303030


### Séquence 3: formulaire de contact (php)
- présentation: architecture serveur/client (transmissif, 10")
- tester un script PHP en local
- **afficher les données brut** reçues du formulaire (utiliser la fonction php `print_r();` ([voir la doc php](http://php.net/manual/en/function.print-r.php) )
### Séquence 4: traiter les données du formulaire (php)
- [Parcours-tutoriel](php-introduction.md): "structures logiques de la programmation en PHP"    
	- variables
	- manipulation: concaténation, addition, quelques exemples de fonctions utiles...
	- conditions
	- Boucles
- [sanitization](https://github.com/becodeorg/Turing-promo-4/tree/master/parcours/2-PHP/Doc/Sanitisation-en-PHP): neutraliser tout encodage nocif (`<script>`)
- validation: champs obligatoires + Email valide
- Envoi + Feedback
