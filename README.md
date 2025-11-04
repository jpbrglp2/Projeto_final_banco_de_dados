# 📘 CRUD de Alunos — PHP + MySQL (PDO)

Um sistema simples de **gerenciamento de alunos**, desenvolvido em **PHP** utilizando **PDO** para acesso seguro ao **MySQL**.  
Permite **cadastrar, listar, editar e excluir** alunos diretamente pela interface principal.

---

## 🧱 Funcionalidades

- ✅ Cadastrar novos alunos  
- ✅ Listar todos os alunos cadastrados  
- ✅ Editar informações de alunos existentes  
- ✅ Excluir alunos  
- ✅ Proteção contra **SQL Injection** e **XSS**  
- ✅ Interface responsiva com **Bootstrap 5**

---

## ⚙️ Tecnologias utilizadas

- **PHP 8+**
- **MySQL 5.7+ / MariaDB**
- **PDO (PHP Data Objects)**
- **Bootstrap 5.3**
- **HTML5 + CSS3**

---

## 🗂 Estrutura de pastas
```
crud_alunos/
│
├── conexao.php       # Conexão com o banco via PDO
├── index.php         # Página principal (listar e cadastrar)
├── editar.php        # Edição de alunos
└── excluir.php       # Exclusão de alunos
```
---

## 🧩 Banco de Dados

Crie um banco chamado `alunos` e a tabela `alunos`:

```sql
CREATE DATABASE escola;
USE escola;

CREATE TABLE alunos (
  id INT(4) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(30) DEFAULT NULL,
  idade INT(2) DEFAULT NULL,
  contato VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
````
---

## 🚀 Como executar o projeto

### 1️⃣ Clonar o repositório
```bash
git clone https://github.com/jpbrglp2/Projeto_final_banco_de_dados
cd crud_alunos
````

### 2️⃣ Configurar a conexão

Edite o arquivo `conexao.php` com os dados do seu MySQL:

```php
$host = 'localhost';
$dbname = 'escola';
$username = 'root';
$password = '';
````
## 🧠 Explicação técnica

- O acesso ao banco é feito via **PDO** com **prepared statements**, prevenindo ataques de **SQL Injection**.  
- O uso de `htmlspecialchars()` impede **XSS** (injeção de scripts).  
- O layout é construído com **Bootstrap 5**, garantindo **responsividade e simplicidade**.  
- Todas as operações do **CRUD** são feitas em **arquivos separados** para maior clareza.


