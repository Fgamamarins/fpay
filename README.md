<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Como instalar o pacote no seu projeto Laravel/Lumen

Dentro do seu projeto, no terminal execute o seguinte comando:

```composer require fausto/fpay-module "dev-master"```

Após o pacote ser instalado, deve adicionar o provider no arquivo ```config/app.php```, para isso basta abrir o arquivo e adicionar no array de providers a seguinte linha ```
\Fgmarins\Fpay\FpayServiceProvider::class```

Obs: O provider deve ser adicionado para mergear o arquivo de rotas e elas ficarem disponiveis para requisição.

Após ter feito isso deve adicionar o ***CLIENT_CODE*** e ***CLIENT_KEY*** no seu arquivo ***.env***

Para a execução do teste pode ser adicionado as seguintes linhas no arquivo ***.env***

```
CLIENT_CODE=FC-SB-15
CLIENT_KEY=6ea297bc5e294666f6738e1d48fa63d2
```

Feito isso o pacote já está pronto para ser utilizado.

Os endpoints a serem utilizados são os seguintes:

- ```/api/v1/fpay/sales``` (GET)
- ```/api/v1/fpay/namedocument``` (GET)
- ```/api/v1/fpay/installments``` (GET)

Os parâmetros que podem ser enviados são os mesmos para ambas as rotas, sendo eles os seguintes:

```
nu_referencia - (String | Max 20 caracteres)
nu_venda - (String | Max 20 caracteres)
page - (Integer)
per_page - (Integer)
dt_venda - (Date | YYYY-mm-dd)
```

Obs: Os parâmetros so opcionais.

## Rotas de teste no Postman (collection)

Para importar as rotas de teste criadas basta abrir o **Postman** acessar ```File > Import > Raw Text``` no menu superior e adicionar o seguinte texto:

```
{
	"info": {
		"_postman_id": "7c6ae951-c5d2-4f23-a2ea-783b0a55ba16",
		"name": "FpayModule",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
	},
	"item": [
		{
			"name": "Sales",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{url}}/api/v1/fpay/sales?nu_referencia=REF0001&nu_venda=38425-uGet3-2KFMj&page=0&per_page=10&dt_venda=2020-04-14",
					"host": [
						"{{url}}"
					],
					"path": [
						"api",
						"v1",
						"fpay",
						"sales"
					],
					"query": [
						{
							"key": "nu_referencia",
							"value": "REF0001"
						},
						{
							"key": "nu_venda",
							"value": "38425-uGet3-2KFMj"
						},
						{
							"key": "page",
							"value": "0"
						},
						{
							"key": "per_page",
							"value": "10"
						},
						{
							"key": "dt_venda",
							"value": "2020-04-14"
						}
					]
				}
			},
			"response": []
		},
		{
			"name": "NameAndDocument",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{url}}/api/v1/fpay/namedocument?nu_referencia=REF0001&nu_venda=38425-uGet3-2KFMj&page=0&per_page=10&dt_venda=2020-04-14",
					"host": [
						"{{url}}"
					],
					"path": [
						"api",
						"v1",
						"fpay",
						"namedocument"
					],
					"query": [
						{
							"key": "nu_referencia",
							"value": "REF0001"
						},
						{
							"key": "nu_venda",
							"value": "38425-uGet3-2KFMj"
						},
						{
							"key": "page",
							"value": "0"
						},
						{
							"key": "per_page",
							"value": "10"
						},
						{
							"key": "dt_venda",
							"value": "2020-04-14"
						}
					]
				}
			},
			"response": []
		},
		{
			"name": "Installments",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{url}}/api/v1/fpay/installments?nu_referencia=REF0001&nu_venda=38425-uGet3-2KFMj&page=0&per_page=10&dt_venda=2020-04-14",
					"host": [
						"{{url}}"
					],
					"path": [
						"api",
						"v1",
						"fpay",
						"installments"
					],
					"query": [
						{
							"key": "nu_referencia",
							"value": "REF0001"
						},
						{
							"key": "nu_venda",
							"value": "38425-uGet3-2KFMj"
						},
						{
							"key": "page",
							"value": "0"
						},
						{
							"key": "per_page",
							"value": "10"
						},
						{
							"key": "dt_venda",
							"value": "2020-04-14"
						}
					]
				}
			},
			"response": []
		}
	]
}
```

Após adicionar o JSON clicar em ```Continue``` e a collection será importada.

Feito isso deve criar uma variável URL com a rota base da sua aplicação, após ter feito isso os endpoints poderão ser requisitados.

## Testes

<p align="center">
  <img src="https://trello-attachments.s3.amazonaws.com/60af23b88567a77eda4b6941/784x518/a9d547856d9677cb58b6d123440ec48b/image.png">
</p>
