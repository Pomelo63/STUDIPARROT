LE PROJET Garage automobile

Vincent Parrot, fort de ses 15 années d'expérience dans la réparation automobile, a ouvert son propre garage à Toulouse en 2021.

Depuis 2 ans, il propose une large gamme de services: réparation de la carrosserie et de la mécanique des voitures ainsi que leur entretien régulier pour garantir leur performance et leur sécurité. De plus, le Garage V. Parrot met en vente des véhicules d'occasion afin d'accroître son chiffre d'affaires.

Vincent Parrot considère son atelier comme un véritable lieu de confiance pour ses clients et leurs voitures doivent, selon lui, à tout prix être entre de bonnes mains.

Bien qu'il fournisse grâce à ses employés un service de qualité et personnalisé à chaque client, Vincent Parrot reconnaît qu'il doit être visible sur internet s'il veut se faire définitivement une place parmi la concurrence. Il a donc contacté l’agence de création de sites web dont vous faites partie pour un premier devis, qu'il a accepté.

Vous aurez alors pour mission de créer une application web vitrine pour le Garage V. Parrot, en mettant en avant la qualité des services délivrés par cette récente entreprise.

 

 

LES ATTENDUS DU CLIENT

 

Pour les clients:

Site vitrine, pour présenter les services réalisés au sein de leurs ateliers, la possibilité de lire et

déposer un retour d'expérience (Vincent Parrot est très soucieux de la satisfaction de ses Clients et tiens

à créer une réelle confiance avec eux). Les utilisateurs devront aussi être en capacité de communiquer facilement avec l'atelier.

Pour améliorer la visibilité des véhicules en vente, Vincent souhaite aussi qu'un espace soit dédié à cela. à fin de faciliter la recherche

des filtres sur les km, prix et année de mis en circulation devront être incorporé.

 

Pour les employés:

Une partie réservée à l'administration u garage devra être incorporée à l'appli WEB. accessible uniquement après connexion.

Deux type de profils devront être créé, le profil 'administrateur' et un profil 'employé'.

 

Tâches à réalisés dans l'application et profil associé

 

Gérer les comptes utilisateurs : profil = Admin. (ajout,suppresion);

Gérer les informations du garage : profil = Admin. (modification);

Gérer les prestations proposées par le garage : profil = Admin. (ajout, suppression);

Gérer les véhicules proposés à la vente : profil = Admin, employé. (ajout, suppression);

Gérer les avis client : profil = Admin, employé. (validation, suppression);

Suivre les messages laissé par les clients: = Admin, employé. (supression);

 

Information à stocker dans la base de donnée :

 

Utilisateur : int ID(unique),string Nom,string Prénom,string Email(unique),string mdp(crypté),string fonction,string rôle(admin,employé).

Informations : string rue, int codepostal, string ville, string email, int telephone, string horaire.

Prestations: int ID(unique), string Prestation, string catégory(mécanique,entretien,carrosserie).

Véhicule: int ID(unique), string Ref (type : 'ref' + time()), string image principale, string liste d'image, string titre, int prix, string energie, int année de mise en circulation,int kilomètre, string couleur, string type de boite, string état globale, string options.

Commentaire : int ID(unique),Date, string Nom de l'envoyeur,string contenu,int Note.

Messages: Date, string Nom, string Prénom, string email, int telephone, string sujet, string contenu.

============================================================================
pour lancer la base de donnée en local procéder comme suivent:
-Remplacer les informations issue de db/dbbuilder.php:
$hostname = 'localhost';
$database = 'vparrot';
$username = 'root';
$password = '';
Par vos identifiants.

- Excecuter dans son navigateur les liens suivants http://localhost/ecf/db/dbbuilder.php.

Attention il est impératif d'utiliser un logiciel permettant de mettre en place un serveur local : ex XAMPP, WAMPP
- Admin login (email/password) is: vparrot@parrot.com && mdp is Vparrot+

================================================================================>
