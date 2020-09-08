<?php require('partials/header.php'); ?>

<h1> Submit Your name</h1>

<form method="post" , action="/users">

    <input name="name" placeholder="submit name" />
    <input name="food" placeholder="submit favorite food" />
    <input type="submit" value="submit" />
</form>

<h1> Tasks</h1>

<?php foreach ($tasks as $task) :  ?>
    <ol>
        <?= $task->description; ?>
        <?= $task->completed ? '<input type="checkbox" checked>'
            :
            '<input type="checkbox">' ?>
    </ol>
<?php endforeach; ?>
</ul>
<?php require('partials/footer.php'); ?>