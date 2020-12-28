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
		
		Le démarrage de session ce fait à partir de l'interface categories, toutefois celle-ci m'a posée plusieurs problèmes. Il semble que mon application ne réponde plus correctement avec le modèle des Users. Les mots de passes des utilisateurs n'est plus hachée lorsqu'on les ajoute ou qu'on modifie le mot de passe.</br>
		Les actions CRUDE fonctionnait avant l'implémentation du démarrage de session et de l'obtention du token mais ne fonctionne pas actuellement. Le bouton edit est le seul qui fonctionne car son action est autorisé sans authentification. Il permet le get de l'objet.</br>
		Le captcha se retrouve dans le coin supérieur et doit etre coché avant l'action de login. Elle utilise un site-key fourni par Google. </br> </br>
		
		Le cliquer glisser fonctionne en glissant une image dans un formulaire de l'application. Toutefois, dans mon application, l'image est visible pendant quelques instants mais elle n'est pas ajouté a la base de données. </br>
		
		Les listes liées ne sont pas implémentés.
		
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