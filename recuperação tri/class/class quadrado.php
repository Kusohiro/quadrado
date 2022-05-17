<?php 

class quadrado {
	private $lado;
	private $cor;
	
	 public function __construct($lado, $cor){
            $this->setlado($lado);
            $this->setcor($cor);
        }
	public function __toString(){
		$str = "lado: ".$this->getlado() ."<br> cor: ".$this->getcor() ."<br> area: ".$this->area()." <br> perimetro: ".$this->perimetro()." <br> diagonal: ".$this->diagonal();
		return $str;
	}
	 public function getlado(){ return $this->lado; }
        public function getcor(){ return $this->cor; }
		
        public function setlado($lado){ if ($lado > 0)$this->lado = $lado; }
        public function setcor($cor){ if (strlen($cor) > 0)$this->cor = $cor; }
	
	public function area(){
		return $this->lado * $this->lado;
	}
	public function perimetro(){
		return $this->lado * 4;

	}
	public function diagonal(){
		$lado2 = $this->lado * $this->lado;
		$diagonal2 = $lado2 + $lado2;
		return sqrt($diagonal2);
	}
 public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO quadrado (lado, cor) VALUES (:lado, :cor)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":lado", $this->lado);
            $stmt->bindParam(":cor", $this->cor);
            return $stmt->execute();
        }
        public function buscar($id){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM quadrado WHERE id = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($id){
            require_once("../conf/Conexao.php");
            $query = "UPDATE quadrado
                    SET lado = :lado, cor = :cor
                    WHERE id = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":lado", $this->lado);
            $stmt->bindParam(":cor", $this->cor);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
        public function excluir($id){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM quadrado WHERE id = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
    }
?>
