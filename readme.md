# Linguagens utilizadas
* PHP Version 7.4.10
* CSS 3
* JavaScript/Jquery
* HTML 5
* MySQL

# Instruções
O projeto/desafio foi desenvolvido com PHP puro, sem utilizar composer ou npm, sem nenhum instalador de biblioteca
a não ser CDN do Jquery e do SweetAlert2.

Os uploads das imagens dos produtos estão sendo salvos em base64 no banco de dados, porém não é
recomendado por fazer grandes requisições com o banco de dados, o ideal seria armazenar em um 
servidor AWS na prática.

## Instalação

1. Dar um git clone no meu repositório: (O projeto está na branch: **assessment-backend-xp**)

    > git clone https://thainanprado@bitbucket.org/thainanprado/assessment-backend-xp.git

2. Logo em seguida, utilizar o script de SQL do banco de dados que está na pasta do projeto */sql* 
**(ecommerce.sql)**, aonde estará as tabelas categorias/produtos.

    Configuração da conexão do banco de dados (config.ini):
    
```
    HOST=localhost
    USER=root
    PASSWORD=''
    DATABASE=ecommerce
```
    
## Estrutura do projeto
```
    assets/
        css/
            style.css                                           
        images/                                                 
        js/
            category.js
            produt.js
            import.csv
    classes/
        class.category.php                                      
        class.controller.php                                    
        class.product.php                                       
    log/
    sql/
        ecommerce.sql                                           
    views/
        category/
            addCategory.php
            categories.php
        dashboard/
            dashboard.php
        product/
            addProduct.php
            products.php
        footer.php
        header.php
        link.php
        script.php
    config.ini
    crud.php
    index.php
    phpinfo.php
    readme.md 
```