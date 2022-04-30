<?php
//Elielder Oliveira

declare(strict_types=1);

class Produto
{
    /**
     * @var PDO
     */
    private $conexao;

    //Efetuando a conexão PDO -> Mysql na inicalização da class
    public function __construct()
    {
        try
        {
            $this->conexao = new PDO('mysql:host=127.0.0.1;dbname=exemplo;', 'root', '1234');
        } 
        catch(Exception $e)
        {
            echo $e->getMessage();
            die();
        }
    }

    //Ação do objeto
    public function list(): array
    {
        $sql = 'SELECT * FROM produtos';

        $produtos = [];

        foreach($this->conexao->query($sql) as $key => $value)
        {
            array_push($produtos, $value);
        }

        return $produtos;
    }

    //Ação do objeto
    public function insert(string $descricao): int
    {
        $sql = 'INSERT INTO produtos(descricao) VALUES(?)';

        $prepare = $this->conexao->prepare($sql);
        
        $prepare->bindParam(1, $descricao);
        $prepare->execute();
        
        return $prepare->rowCount();
    }

    //Ação do objeto
    public function update(string $descricao, int $id): int
    {
        $sql = 'UPDATE produtos SET descricao = ? WHERE id = ?';

        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $descricao);
        $prepare->bindParam(2, $id);
        $prepare->execute();

        return $prepare->rowCount();
    }

    //Ação do objeto
    public function delete(int $id): int
    {
        $sql = 'DELETE FROM produtos WHERE id = ?';

        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $id);
        $prepare->execute();

        return $prepare->rowCount();
    }

}

?>