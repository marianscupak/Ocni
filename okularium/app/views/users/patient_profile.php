<main class="container">
    <div class="mainSection">
        <h1><?= $data['user']->name . ' ' . $data['user']->surname ?></h1>
        <h1>Cizi profil</h1>
        <h2><?= ucfirst($data['user']->role) ?></h2>
    </div>
</main>