<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# API Laravel - Gerenciamento de Tarefas

Esta API foi desenvolvida com Laravel para realizar o gerenciamento de tarefas. Ela permite a criação, leitura, atualização e exclusão de tarefas, além de suportar categorias para organizá-las. O objetivo principal é fornecer uma solução flexível e eficiente para gerenciar listas de tarefas.

## Funcionalidades

- **Criação de Tarefas**: Permite a criação de novas tarefas com `title`, `description`, `status` e uma `category`.
- **Leitura de Tarefas**: Listagem de todas as tarefas ou visualização de uma tarefa específica pelo seu `id`.
- **Atualização de Tarefas**: Atualiza os campos `title`, `description` e `status` de uma tarefa existente.
- **Exclusão de Tarefas**: Remove uma tarefa específica com base no seu `id`.
- **Gerenciamento de Categorias**: Criação, listagem, atualização e exclusão de categorias que podem ser atribuídas às tarefas.

## Requisitos

### Requisitos Funcionais

- A API permite operações CRUD (Create, Read, Update, Delete) para tarefas.
- Suporte a categorias para organizar tarefas.
- Validação de dados de entrada para garantir que todos os campos obrigatórios estejam presentes.
- Documentação da API através de uma ferramenta como Postman.
- A API é capaz de lidar com múltiplas requisições simultâneas.

### Requisitos Não Funcionais

- **Validação de Entrada**: Garante que os dados inseridos sejam válidos e estejam no formato esperado.
- **Documentação**: Documentação completa da API para facilitar seu uso.
- **Desempenho**: A API foi projetada para ser escalável e eficiente, lidando com grandes volumes de requisições.

## Endpoints

### Rotas para Tarefas (`Tasks`)

- `GET /api/tasks` - Listar todas as tarefas.
- `POST /api/tasks` - Criar uma nova tarefa.
- `GET /api/tasks/{id}` - Exibir uma tarefa específica.
- `PUT /api/tasks/{id}` - Atualizar uma tarefa existente.
- `DELETE /api/tasks/{id}` - Excluir uma tarefa.

### Rotas para Categorias (`Categories`)

- `GET /api/categories` - Listar todas as categorias.
- `POST /api/categories` - Criar uma nova categoria.
- `GET /api/categories/{id}` - Exibir uma categoria específica.
- `PUT /api/categories/{id}` - Atualizar uma categoria existente.
- `DELETE /api/categories/{id}` - Excluir uma categoria.

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/DiegoRodrigues76/projeto-laravel-tasks.git

2. Navegue até o diretório do projeto:
   ```bash
   cd projeto-laravel-tasks

3. Instale as dependências do Laravel:
   ```bash
   composer install

4. Copie o arquivo de exemplo .env e configure o banco de dados:
   ```bash
   cp .env.example .env

5. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   
6. Execute as migrações do banco de dados:
   ```bash
   php artisan migrate
   
7. Inicie o servidor de desenvolvimento:
   ```bash
   php artisan serve

## Uso

Após instalar o projeto e rodar o servidor, você pode usar uma ferramenta como o <a href=“https://www.postman.com/“>Postman</a> para testar os endpoints da API.

### Criar uma Tarefa
```bash
POST /api/tasks
```

Exemplo do corpo da requisição:
```json
{
  "title": "Comprar mantimentos",
  "description": "Comprar pão, leite e ovos",
  "status": "pendente",
  "category_id": 1
}
```

### Listar Tarefas
```bash
GET /api/tasks
```

### Atualizar Tarefa
```bash
PUT /api/tasks/{id}
```

Exemplo do corpo da requisição:
```json
{
  "title": "Comprar mantimentos (Atualizado)",
  "description": "Comprar pão, leite e ovos (atualizado)",
  "status": "concluído"
}
```

### Exluir uma Tarefa
```bash
DELETE /api/tasks/{id}
```

## Requisitos

- PHP 8 ou superior
- Composer
- Banco de Dados (ainda a decidir)
