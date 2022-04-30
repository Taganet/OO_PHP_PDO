<?php

require ('./src/Produto.php');

$produto = new Produto();

switch($_GET['Operacao'])
{
    case 'list';
        echo '<h3>Produtos: </h3>';

        foreach($produto->list() as $value)
        {
            echo 'ID: ' .$value['id']. '<br />Descrição: ' .$value['descricao']. '<hr>';
        }
        break;
    
    case 'insert';
        $status = $produto->insert($_GET['valor']);

        if(!$status)
        {
            echo 'Cadastro não efetuado!';
            return false;
        }

        echo 'Cadastro efetuado com sucesso!';
        break;
    
    case 'update';
        $status = $produto->update($_GET['valor'], $_GET['id']);

        if(!$status)
        {
            echo 'Atualização não efetuado!';
            return false;
        }
        
        echo 'Atualização efetuada com sucesso!';
        break;
          
    case 'delete';
        $status = $produto->delete($_GET['id']);

        if(!$status)
        {
            echo 'Item não excluído!';
            return false;
        }
        
        echo 'Item excluído!';
        break;
        
}


?>