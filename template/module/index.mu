{{> partials/header}}

<h2>Modules</h2>

<ul>
{{#module}}
	<li><a href="./code/{{code}}/">{{capitalCode}}: {{name}}</a></li>
{{/module}}
</ul>

{{> partials/footer}}
