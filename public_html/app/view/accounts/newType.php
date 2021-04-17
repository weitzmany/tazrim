<?

$R->layout('base',[
    'css' => [
        'accounts.css'
    ],
    'js' => [
        'accounts.js'
    ]
]);


$R->section('content');

?>

<form method="post">
        <div class="form-group">
            <input id="name" name="name" type="text" class="form-control">
            <label for="name" class="form-label">Name</label>
        </div>
</form>

<?

$R->stop();