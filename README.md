# O Patusco Back End

![GitHub repo size](https://img.shields.io/github/repo-size/LuanHSL/patusco-api?style=for-the-badge)
![GitHub language count](https://img.shields.io/github/languages/count/LuanHSL/patusco-api?style=for-the-badge)
![GitHub forks](https://img.shields.io/github/forks/LuanHSL/patusco-api?style=for-the-badge)

> Este projeto é uma api para o projeto [Patusco Client](https://github.com/LuanHSL/patusco-client), contém 2 níveis de acesso `receptionist` e `doctor`.

## 💻 Pré-requisitos

Antes de começar, verifique se você atendeu aos seguintes requisitos:

- [PHP 8.2^](https://www.php.net/downloads)
- [MySql](https://www.mysql.com/)
- [Composer](https://getcomposer.org/)

## 🚀 Instalando Patusco Api

Para instalar, siga estas etapas:
```
git clone https://github.com/LuanHSL/patusco-api.git
```
```
cd patusco-api
```
```
composer install
```

## Executando Patusco Api

Para executar, siga estas etapas:

- Duplique o arquivo `.env.example` e renomeie para `.env`
- Altere os valores da conexão do banco para seu banco local
- Rode as migrations
```
php artisan migrate
```
- Rode as seeds
```
php artisan db:seed
```
- Suba o servidor
```
php artisan serve
```

## Deploy Patusco Api

O projeto esta hospedado nesse [link](https://patusco.luanhdev.com/)

Login no sistema como recepcionista
```
email: receptionist@receptionist.com
password: password
```

Login no sistema como doutor
```
email: doctor1@receptionist.com
password: password
```
```
email: doctor2@receptionist.com
password: password
```
```
email: doctor3@receptionist.com
password: password
```

## 📫 Contribuindo para Patusco Api

Para contribuir com Patusco Api, siga estas etapas:

1. Bifurque este repositório.
2. Crie um branch: `git checkout -b develop`.
3. Faça suas alterações e confirme-as: `git commit -m '<mensagem_commit>'`
4. Envie para o branch original: `git push origin <nome_do_projeto> / <local>`
5. Crie a solicitação de pull.

Como alternativa, consulte a documentação do GitHub em [como criar uma solicitação pull](https://help.github.com/en/github/collaborating-with-issues-and-pull-requests/creating-a-pull-request).
