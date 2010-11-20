{{> partials/header}}

<h2>Modules</h2>

<ul>
{{#module}}
	<li><a href="./code/{{code}}/">{{capitalCode}}: {{name}}</a></li>
{{/module}}
	<li><a href="./add/">Add module</a></li>
</ul>

{{> partials/footer}}
