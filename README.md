# Desafio Promobit

## Framework utilizado
- [Laravel] - The PHP Framework for Web Artisans

## Instalação

Execute o comando abaixo para iniciar os containers:
```sh
docker-compose up -d
```

Execute o comando abaixo para instalar as dependências do projeto:
```sh
docker-compose exec app composer install
```

Execute o comando abaixo para replicar o conteúdo do arquivo **.env.production** para o arquivo **.env**:
```sh
cp .env.production .env
```

Execute o comando abaixo para gerar as tabelas no banco de dados:
```sh
docker-compose exec app php artisan migrate
```

Após esses passos, a aplicação está pronta para uso.

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
