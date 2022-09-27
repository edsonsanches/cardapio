# cardapio

Site comum com template Boodstrap+Painel ADMIN+Area de Login+Banco de dados MySQL

-Cadastro de categorias

-Edição de categorias

-Excluir categoria (libera o botao de excluir apenas quando nao tem itens vinculados ao mesmo)

-Cadastro de Produtos

-Edição de Nome/Ingredientes/Valor/Categoria

-Edição de Produto ativo/desativo (com pequenas mudanças da para mudar a logica de tirar o item do cardapio para deixar ele visivel, porem, com tag de INDISPONIVEL)

-Excluir produto

-Edição de foto do produto (use uma foto quadrada para melhor qualidade da miniatura)

Popula os filtros e produtos na sessão de "cardapio" ou na tela de "Only cardapio" automaticamente

(Link para area administrativa no rodapé, (R) clicavel)

(Link para "only cardapio" no rodapé)

Usuario e senha padrão (admin admin), podendo ser alterado diretamente na base

PHP Puro, sem framework

arquivo BD/conecta.php precisa ser editado com os dados do seu banco

Existem varias melhorias, como melhorar a escrita do codigo, criptografar senha do admin, mudar senha e usuario do admin apos o primeiro acesso, enfim, mas para uso simples de um restaurante, com pequenas alterações já vai dar para usar.
