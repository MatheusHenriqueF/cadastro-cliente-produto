## Instalação

Para instalar o sistema e deixa-lo funcionando normalmente, você deve seguir as etapas seguintes:

- 1. Baixe o pacote completo do sistema que está aqui no GitHub.
- 2. Após baixado, descompacte a pasta, e envie essa pasta para o seu diretório raiz da sua hospedagem ou servidor local, como o diretório www ou htdocs.
- 3. Após enviado o sistema para seu servidor, dentro da pasta do sistema, procure e abra o arquivo .env.
- 4. Neste arquivo, procure por "mysql", onde você achará a configuração de conexão com o banco de dados. Você deverá configurar com as informações do seu servidor, por exemplo:
<br><br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=<b>nome_da_sua_database</b><br>
DB_USERNAME=<b>nome_do_usuario_do_servidor (Usuário Padrão é: root)</b><br>
DB_PASSWORD=<b>senha_do_usuario_do_servidor (Senha Padrão é: root ou em branco)</b><br><br>

- 5. Você ainda não terá criado a sua database. Você deverá acessar seu MySQL e criar uma Database, poderá utilizar qualquer nome. Depois de criar, você deve procurar o arquivo <b>mbgroup.sql</b> que vai estar dentro da pasta do sistema que você baixou. Você deverá então acessar seu banco de dados MySQL, e restaurar/importar esse banco mbgroup.sql dentro do banco que acabou de criar. 

- 6. Feito isso, o sistema estará funcionando normalmente para uso.

