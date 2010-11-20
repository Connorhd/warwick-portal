{{> partials/header}}

{{#added}}
<div class="success">
	Module added.
</div>
{{/added}}

<form action="" method="post">
        <fieldset>
                <legend>Add a module</legend>
                <p>
                        <label for="code">Module code</label><br>
                        <input type="text" class="title" name="code" id="code">
                </p>
                <p>
                        <label for="name">Module name</label><br>
                        <input type="text" class="text" name="name" id="name">
                </p>
                <p>
                        <input type="submit" value="Submit" name="submit">
                </p>
        </fieldset>
</form>

{{> partials/footer}}
