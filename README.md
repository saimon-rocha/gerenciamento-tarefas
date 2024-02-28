Projeto desenvolvido por SAIMON A.S ROCHA

1 - Rode as migrations.
2 - Rode o seeders: php artisan db:seed --class=MateriasTableSeeder para criar os dados  no bd.
    2.1 - Ele irá criar no banco o nome de matérias e com fotos já estabelecidas, para testar por favor add outros tipos de fotos.
3 - Verifique o arquivo .env para confirmar os dados do BD
4 - Certifique-se que tenha um banco criado com o nome da configuração do .env

Fotos - Font
1 Fotos foram retiradas do pexels.
https://www.pexels.com/pt-br/


Idéias:
1° Ao terminar de criar o básico solicitado pensei em adicionar um CRUD de materia onde eu consiga além de mostrar as materias que me possibilite cadastrar, editar e excluir.

2° Ao salvar uma foto pegar o nome original dela e lançar a foto em uma pasta especifica para que o sistema identifique e mostre essa foto para sua respectiva materia.

criar e editar: a idéia é que o usuario possa alterar a foto da materia caso tenha salvo errado ou por necessidade
excluir - Implementei o excluir para deletar uma materia quando a mesma não for mais util ou quando passar muito temp

3 - Utilizado o Store do Laravel para lidar com as fotos/img