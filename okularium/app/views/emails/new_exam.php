<h1>Nová prohlídka byla objednána!</h1>
<h2>Informace:</h2>
<ul>
    <li>
        <b>Pacient:</b> <?= $data['exam']->user->name . ' ' . $data['exam']->user->surname ?>
    </li>
    <li>
        <b>Datum:</b> <?= date_format(date_create_from_format('Y-m-d', $data['exam']->date), 'j.n.Y') ?>
    </li>
    <li>
        <b>Čas:</b> <?= $data['exam']->time ?>
    </li>
    <li>
        <b>Důvod:</b> <?= (empty($data['exam']->reason))? 'Neuvedeno.' : $data['exam']->reason ?>
    </li>
</ul>
