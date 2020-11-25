<html>
    <head>
        <title>À propos</title>
        <meta charset="utf-8" />
    </head>
    <body>
		<h1> À propos </h1>
        <p>
            Samuel Tremblay</br> </br>

			420-5B7 MO Applications Internet </br> </br>
			
			Automne 2020, Collège Montmorency </br>
        </p>
		
		<p>
		Cette application sert pour les techniciens en laboratoire pour des prescriptions de clients. </br>
		Les trois types d'utilisateurs sont les techniciens, les superviseurs et les pharmaciens. </br>
		Les techniciens ne peuvent pas éditer les clients mais peuvent en créer. Les superviseurs peuvent éditer les clients. </br> </br>
		
		La fonction d'autocomplete est implémenter avec les noms de médicaments et elle est fonctionnelle dans l'action d'ajout et d'édition d'une prescription. (/Pharmacie_TP/prescriptions) </br>
		Toutefois, l'autocomplete n'est pas fonctionnel dans le controlleur dédié à l'admin pour une raison quelquonque. Je n'ai pas réussi à faire fonctionner les listes liées. </br>
		Je souhaitais choisir une catégorie de médicaments qui nous sortirait une liste des médicaments appartenant à cette catégorie. </br> </br>
		
		Pour la fonction monopage de l'application, j'ai choisi le controlleur Categories. Celui ci s'affiche en monopage pour les utilisateurs réguliers et utilise le Bootstrap pour l'interface Admin.
		L'action d'édition n'est pas fonctionnel dans ces interfaces. </br>
		
		Les pdf fonctionnent pour le controlleur Prescriptions.
		
		Lien Github <a href="https://github.com/MightVerak/PrescriptionsTP">ici<a>
		</p>
		
		<p> Concepteur de la base de donnée actuelle: <br/>
			<img src="/Pharmacie_TP/webroot/img/prescription_concepteur.PNG" alt="concept" style="width:500px;height:400px;">
		</p>
		
		<p> 
			Modèle de la base de données de référence: </br> </br>
			<img src="/Pharmacie_TP/webroot/img/prescription_model.gif" alt="conceptOriginale" style="width:750px;height:600px;">
		</p>
			<a href="http://www.databaseanswers.org/data_models/pharmacies_and_prescriptions/index.htm">Lien pour la base de données de référence</a>
    </body>
</html>