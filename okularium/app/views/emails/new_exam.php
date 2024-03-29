<table style="width: 60%; background-color: #FF6347; margin: 0 20%; padding: 0 30px">
    <tbody>
    <tr>
        <td>
            <h1 style="color: white; font-size: 25px">Nová prohlídka byla objednána!</h1>
        </td>
    </tr>
    <tr>
        <td>
            <h2 style="color: white; font-size: 20px">Informace:</h2>
        </td>
    </tr>
    </tbody>
</table>
<table style="margin: 40px 20%">
    <tbody>
        <tr>
            <td style="font-size: 18px">
                <b>Pacient:</b> <?= $data['exam']->user->name . ' ' . $data['exam']->user->surname ?>
            </td>
        </tr>
        <tr>
            <td style="font-size: 18px">
                <b>Datum:</b> <?= date_format(date_create_from_format('Y-m-d', $data['exam']->date), 'j.n.Y') ?>
            </td>
        </tr>
        <tr>
            <td style="font-size: 18px">
                <b>Čas:</b> <?= $data['exam']->time ?>
            </td>
        </tr>
        <tr>
            <td style="font-size: 18px">
                <b>Důvod:</b> <?= (empty($data['exam']->reason))? 'Neuvedeno.' : $data['exam']->reason ?>
            </td>
        </tr>
    </tbody>
</table>
<table style="width: 60%; background-color: #FF6347; margin: 0 20%; padding: 30px">
    <tbody>
        <tr>
            <td style="color: white; font-size: 18px">
                Sokolská třída 2800/99, Ostrava
            </td>
            <td>
                <a href="http://okularium.cz/"><img src="https://i.ibb.co/SXYq0wG/icon-white.png" alt="Okularium" style="height: 18px"><span style="font-size: 18px; color: white; margin-left: 5px">Okularium</span></a>
            </td>
        </tr>
        <tr>
            <td style="color: white; font-size: 18px">
                739 029 743
            </td>
            <td>
                <a href="https://www.domaci-optika.cz/"><img src="https://i.ibb.co/zPcS69B/logo-glasses-white.png" alt="Domácí optika" style="width: 18px; height: 10px"><span style="font-size: 18px; color: white; margin-left: 5px">Domácí optika</span></a>
            </td>
        </tr>
        <tr>
            <td style="color: white; font-size: 18px">
                sylva.smehlikova@gmail.com
            </td>
        </tr>
    </tbody>
</table>