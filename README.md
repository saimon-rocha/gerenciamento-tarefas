<h1>Projeto desenvolvido por SAIMON A.S ROCHA</h1>
    <h2>Instruções:</h2>
    <ol>
        <li>Conecte ao seu banco de dados e adicione as configurações no <code>.env</code>.</li>
        <li>Rode as migrations: <code>php artisan migrate</code>.</li>
        <li>
            Rode o seeders: <code>php artisan db:seed --class=MateriasTableSeeder</code> para criar os dados no bd.
            <ul>
                <li>Ele irá criar no banco o nome de matérias e com fotos já estabelecidas, para testar por favor
                    adicione outros tipos de fotos.</li>
            </ul>
        </li>
        <li>Verifique o arquivo <code>.env</code> para confirmar os dados do BD.</li>
        <li>Certifique-se de que tenha um banco criado, coloque as configurações no <code>.env</code>.</li>
        <li>Execute <code>php artisan storage:link</code> para criar a pasta onde as imagens serão alocadas - sem
            isso você não conseguirá adicionar nem editar as imagens.</li>
    </ol>
    <p><strong>OBS:</strong> Existe no <code>public/img</code> as imagens iniciais do blog, copie e cole no storage
        logo após rodar o comando: <code>storage:link</code>.</p>
    <p>PARA NÃO INICIAR O BLOG SEM NADA EXECUTE A INSTRUÇÃO 3</p>
    <h2>Fotos - Font</h2>
    <p>Fotos foram retiradas do <a href="https://www.pexels.com/pt-br/" target="_blank">Pexels</a>.</p>
    <h2>Idéias:</h2>
    <ol>
        <li>
            Ao terminar de criar o básico solicitado pensei em adicionar um CRUD de materia onde eu consiga além de
            mostrar as matérias que me possibilite cadastrar, editar e excluir.
        </li>
        <li>
            Ao salvar uma foto pegar o nome original dela e lançar a foto em uma pasta especifica para que o sistema
            identifique e mostre essa foto para sua respectiva matéria.
            <ul>
                <li>Criar e editar: a idéia é que o usuário possa alterar a foto da matéria caso tenha salvo errado
                    ou por necessidade.</li>
                <li>Excluir: Implementei o excluir para deletar uma matéria quando a mesma não for mais útil ou
                    quando passar muito tempo.</li>
            </ul>
        </li>
        <li>Utilizado o Store do Laravel para lidar com as fotos/img.</li>
    </ol>
