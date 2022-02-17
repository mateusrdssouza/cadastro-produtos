# Desafio Promobit

## Framework utilizado
- [Laravel] - The PHP Framework for Web Artisans

## Instalação
É necessário instalar o [Composer], ferramenta utilizada para a instalação dos recursos do projeto.

Após a instalação, executar o comando abaixo no terminal na pasta do projeto para baixar as dependências necessárias:
```sh
composer install
```

Renomeie o arquivo **.env.production** para **.env**. Este arquivo armazenará as variávies de ambiente da aplicação.

Execute o comando abaixo no terminal para gerar as tabelas no banco de dados. Serão criadas as tabelas propostas no desafio, além das tabelas para autenticação de usuário:
```sh
php artisan migrate
```
\* As configurações do banco de dados são definidas no arquivo **.env**. Nesse caso, defini o nome do banco como **desafio** e utilizei as informações *default* do MySQL de IP, usuário e senha.

Após esses passos, a aplicação está pronta para uso.

Basta executar o comando abaixo para iniciar o servidor.
```sh
php artisan serve
```
O Laravel irá, por padrão, servir a aplicação no endereço http://localhost:8000/.

### SQL de extração de relatório de relevância de produtos
```SQL
SELECT t.id, t.name, COUNT(pt.tag_id) AS quantidade
FROM tag AS t
LEFT JOIN product_tag AS pt ON pt.tag_id = t.id
LEFT JOIN product AS p ON p.id = pt.product_id
GROUP BY t.id, pt.tag_id
ORDER BY t.name;
```

[Laravel]: <https://laravel.com/>
[Composer]: <https://getcomposer.org/>
