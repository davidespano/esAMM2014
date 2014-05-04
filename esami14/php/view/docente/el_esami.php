<h2 class="icon-title" id="h-cerca">Elenco storico esami</h2>

<div class="input-form">
    <h3>Filtro</h3>
    <form method="post" action="docente/el_esami<?= $vd->scriviToken('?')?>">
        <label for="insegnamento">Insegnamento</label>
        <select name="insegnamento" id="insegnamento">
            <option value="qualsiasi">Qualsiasi</option>
            <?php foreach ($insegnamenti as $insegnamento) { ?>
                <option value="<?= $insegnamento->getCodice() ?>" ><?= $insegnamento->getTitolo() ?></option>
            <?php } ?>
        </select>
        <label for="matricola">Matricola</label>
        <input name="matricola" id="matricola" type="text"/>
        <br/>
        <label for="nome">Cognome</label>
        <input name="nome" id="cognome" type="text"/>
        <br/>
        <label for="nome">Nome</label>
        <input name="nome" id="nome" type="text"/>
        <br/>
        <label for="data">Data</label>
        <input name="data" id="data" type="text"/>
        <br/>
        <button type="submit" name="cmd" value="e_cerca">Filtra</button>
    </form>
</div>



<h3>Elenco Esami</h3>
<?php if (count($el_esami) == 0) { ?>
    <p>Nessun esame trovato</p>
<? } else { ?>
    <table>
        <thead>
            <tr>
                <th>Insegnamento</th>
                <th>Crediti</th>
                <th>Matricola</th>
                <th>Studente</th>
                <th>Voto</th>
                <th>Membri</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($el_esami as $esame) {
                ?>
                <tr <?= $i % 2 == 0 ? 'class="alt-row"' : '' ?>>
                    <td><?= $esame->getInsegnamento()->getTitolo() ?></td>
                    <td><?= $esame->getInsegnamento()->getCfu() ?></td>
                    <td><?= $esame->getStudente()->getMatricola() ?></td>
                    <td><?= $esame->getStudente()->getNome() ?>  <?= $esame->getStudente()->getCognome() ?></td>
                    <td><?= $esame->getVoto() ?></td>
                    <td>
                        <ul class="none no-space">
                            <?php
                            foreach ($esame->getCommissione() as $docente) {
                                echo '<li>' . $docente->getNome() . ' ' . $docente->getCognome() . '</li>';
                            }
                            ?>
                        </ul>
                    </td>

                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
<?php } ?>