Projeto desenvolvido por SAIMON A.S ROCHA
1 - Conecte ao seu banco de dados e adicione as configurações no .env

2 - Rode as migrations: php artisan migrate

3 - Rode o seeders: php artisan db:seed --class=MateriasTableSeeder para criar os dados  no bd.
    3.1 - Ele irá criar no banco o nome de matérias e com fotos já estabelecidas, para testar por favor add outros tipos de fotos.

4 - Verifique o arquivo .env para confirmar os dados do BD

5 - Certifique-se que tenha um banco criado, coloque as configurações no .env

6 - Execute php artisan storage:link para criar a pasta onde as imagens serão alocadas - sem isso você não conseguirá adicionar nem editar as imagens.
OBS: Existe no public/img as imagens inicias do blog, copie e cole no storage logo após rodar o comando: storage:link


PARA NÃO INICIAR O BLOG SEM NADA EXECUTE A INSTRUÇÃO 3

Fotos - Font
1 Fotos foram retiradas do pexels.
https://www.pexels.com/pt-br/

Idéias:
1° Ao terminar de criar o básico solicitado pensei em adicionar um CRUD de materia onde eu consiga além de mostrar as materias que me possibilite cadastrar, editar e excluir.

2° Ao salvar uma foto pegar o nome original dela e lançar a foto em uma pasta especifica para que o sistema identifique e mostre essa foto para sua respectiva materia.

criar e editar: a idéia é que o usuario possa alterar a foto da materia caso tenha salvo errado ou por necessidade
excluir - Implementei o excluir para deletar uma materia quando a mesma não for mais util ou quando passar muito temp

3 - Utilizado o Store do Laravel para lidar com as fotos/img