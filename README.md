
# GERENCIAMENTO DE TAREFAS
Projeto desenvolvido para criar tarefas com ordens prioritárias.

## Estrutura do Projeto
O projeto está estruturado em pacotes que representam diferentes partes do sistema seguindo padrão MVC.
-Controller
    -TarefasController - Controlador Geral
-Migration
    -Definições das tabelas para salvar as tarefas e ter a estrutura pronta do sistema.
-Views
    -layout - Padrão do projeto.
    -Tarefas - view de tarefas, responsavel pelas tarefas.
## Instalação
Tenha em sua máquina: PHP, COMPOSER e um DB destinado à aplicação que você acabou de baixar.
Inicie alterando o arquivo .env para comunicar-se com um banco de dados, após isso, rode as migrations com o comando PHP ARTISAN MIGRATE. Agora, no projeto, execute PHP ARTISAN SERVE, ele irá se conectar e abrir uma janela no navegador. Com isso, já é possível visualizar as tarefas, cadastrar, sendo possível também alterar e excluir.
#Para usar no celular rode o servidor -> php artisan serve --host=0.0.0.0
#Digite o IP do seu computador : + porta que o servidor estiver rodando
#Não esqueça de deixar o celular na mesma rede.
#Testado Iphone 13

## Stack utilizada
**PHP**
**HTML**
**CSS**
**LARAVEL**
**BLADE**
**MYSQL**
**TAILWIND**


# Funcionalidades

**Listagem:** Listando tarefas NÃO concluídas.

**Cadastro** Cadastro básico.

**Edição** Edição básica.

**Exclusão** Solicita se realmente deseja excluir com o modal.

**Leitura** Clique no titulo para ler, vai abrir um Modal com a descrição completa.

**Filtros**
```bash
  Encerramento e Prioridade.
  Listagem Por Encerramento -> Ordem Asc
  Listagem por Prioridade -> Alta, Média e Baixa
```

## Contribuindo
Contribuições são sempre bem-vindas! Se você encontrar algum problema, ou desejar adicionar novas funcionalidades, sinta-se à vontade para abrir uma issue ou enviar um pull request.