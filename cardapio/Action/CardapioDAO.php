<?php 

namespace connect;

class CardapioDAO {
    public function create(Cardapio $p) {
        // insercao no bd 
        $sql = 'insert into cardapio (foto, nome, tipo, descricao, valor) values (?,?,?,?,?)';
        $stmt = Conn::getConn()->prepare($sql); 
  
        // acessando os dados da classe Orgao, com os getters 
        $stmt->bindValue(1, $p->getFoto()); 
        $stmt->bindValue(2, $p->getNome()); 
        $stmt->bindValue(3, $p->getTipo()); 
        $stmt->bindValue(4, $p->getDescricao()); 
        $stmt->bindValue(5, $p->getValor()); 
 
        // fazendo a query com o banco de dados   
        if ($stmt->execute()):
            return true;
        else:
            return false;
        endif;
    }

    public function read() {
        // insercao no bd 
        $sql = 'select * from cardapio';
        $stmt = Conn::getConn()->prepare($sql); 
        $stmt->execute();
 
        // fazendo a query com o banco de dados   
        if ($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            return $resultado; 
        else: 
            // Caso não haja, irá retornar um array vazio 
            return []; 
        endif;
    }
}