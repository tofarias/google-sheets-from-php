# google-sheets-from-php
Read And Write Google Sheets From PHP


Primeiro você vai criar uma planilha no google drive e por enquanto compartilhar de modo que qualquer pessoa possa acessar (depois você poderá torná-la privada e ainda mantendo o funcionamento do script).

Você deve criar uma chave aqui: https://console.cloud.google.com/apis/

Crie um novo projeto, e crie uma credencial em "Chave da conta de serviço", escolhe JSON, no Papel escolha projeto e proprietário, após será feito o download de um arquivo json para a sua máquina, renomeie o arquivo para "servicekey.json" (este arquivo contem suas credenciais de acesso) coloque o arquivo na raiz do projeto.

Após criado o projeto você deve procurar o link no menu a esquerda "Biblioteca" (https://console.cloud.google.com/apis/library), e procurar por Google Sheet Api e depois ativá-la.

La no codigo php, na pasta public, existem dois arquivos: index.php e teste1.php.

O arquivo "teste1.php" é só pra testar a inserção de alguns dados na planilha, antes de executar abra o arquivo e substitua "ID-DA-PLANILHA" pelo id que consta na parte da URL da sua planilha do google, confome imagem id-planilha.png

Para executar abra o terminal e digite: php public/teste1.php

Se ocorrer erro de permissão, verifique novamente se lá no drive você compartilhou publicamente sua planilha, foi o único erro que ocorreu pra mim.

O arquivo index.php é conforme você me pediu, vai inserir informação na planilha conforme o mês corrente.
