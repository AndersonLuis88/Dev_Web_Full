<?php

namespace MF\Model;

use App\Connection;

class Container {

public static function getModel($model){
//retorna o modelo solicitado já instanciado, com a conexão estabelecida
//Instanciar modelo
$class = "\\App\\Models\\".ucfirst($model);

//Instância da Conexão
$conn = Connection::getDb();

return new $class($conn);

}

}

?>