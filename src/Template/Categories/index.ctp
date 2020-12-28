<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js',
	'https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit',
        ], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build([
    'prefix' => 'api',
    'controller' => 'Categories'], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Categories/index', ['block' => 'scriptBottom']);
?>
<!-- salt =
<?php
use Cake\Utility\Security;
echo Security::salt();
?>
-->

<div ng-app="app" ng-controller="CategoryCRUDCtrl">
	<div id="example1"></div>
	<p style="color:red;">{{ captcha_status}}</p>
	<input type="hidden" id="id" ng-model="categorie.id" /></td>
	
	  <table>
		<tr>
			<td width="200">Utilisateur (username):</td>
			<td><input type="text" id="username" ng-model="user.username" /></td>
		</tr>
		<tr>
			<td width="200">Mot de passe (password):</td>
			<td><input type="text" id="password" ng-model="user.password" /></td>
		</tr>
		<tr>
		<a ng-click="login(user)">[Connexion] </a>
		<a ng-click="logout()">[Déconnexion] </a>
		<a ng-click="changePassword(user.password)">[Changer le mot de passe] </a>
		</tr>
	</table>
	
    <table>
        <tr>
            <td width="100">Category:</td>
            <td><input type="text" id="category" ng-model="categorie.category" /></td>
        </tr>
    </table>
    <br />
	<button ng-click="addCategory(categorie.category)">Add Category</button>
	<button ng-click="updateCategory(categorie.id, categorie.category)">Update Category</button>
    <!--<a ng-click="getCategory(category.id)">Get Category</a>-->

    <br />
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <br />

	<table class="hoverable bordered">
		<thead>
			<tr>
				<th class="text-align-center" ng-init="getAllCategories()">ID</th>
				<th class="width-30-pct">Category</th>
				<th class="text-align-center">Actions</th>
			</tr>
		</thead>
		
		<tbody ng-init="getAllCategories()">
			<tr ng-repeat="categorie in categories| filter:search">
				<td class="text-align-center">
					{{categorie.id}}
				</td>
				<td>
					{{categorie.category}}
				</td>
				<td>
					<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalCategoryAddEdit" ng-click="getCategory(categorie.id)">Edit</button>
					<button type="button" class="btn btn-danger btn-sm" ng-click="deleteCategory(categorie.id)">Delete</button>
				</td>
			</tr>
		</tbody>
	</table>		
</div>