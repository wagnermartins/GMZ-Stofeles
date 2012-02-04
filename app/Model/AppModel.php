<?php
/**
 * Model da aplicação
 * 
 * @author		Thiago Belem <contato@thiagobelem.net>
 * 
 * @package		AssandoSites
 * @subpackage	Model
 */

/**
 * Model da aplicação
 */
class AppModel extends Model {

    /**
    * Cacheia todas as consultas
    * 
    * @var boolean
    */
    public $cacheQueries = true;

    /**
    * Estados do Brasil
    * 
    * @var array
    */
    public $estadosBrasil = array(
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'DF' => 'Distrito Federal',
        'ES' => 'Espírito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MT' => 'Mato Grosso',
        'MS' => 'Mato Grosso do Sul',
        'MG' => 'Minas Gerais', 
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TO' => 'Tocantins'
    );

    /**
    * Verifica se é um estado válido
    * 
    * @param array $data
    * 
    * @return boolean
    */
    public function estadoBrasil($data) {
            $estado = array_shift($data);

            return in_array($estado, array_keys($this->estadosBrasil));
    }

    /**
    * Compara dois campos
    * 
    * @param array $data
    * 
    * @return boolean
    */
    public function equalToField($data, $field) {
            $data = array_shift($data);

            return isset($this->data[$this->alias][$field]) && ($data == $this->data[$this->alias][$field]);
    }

    /**
    * Gera uma nova senha alfa-numérica e segura
    * 
    * @param int $length Tamanho da senha
    * 
    * @return string
    */
    public function generatePassword($length = 8) {
            $password = uniqid(Configure::read('Security.salt'), true);
            $password = sha1($password);

            return substr($password, 0, $length);
    }

    /**
    * Formata um telefone, adicionando parentesis e hifen
    *
    * @param string
    *
    * @return string
    */
    public function formatPhone($phone) {
            $phone = preg_replace('/[^0-9]/', '', $phone);

            return preg_replace('/^([0-9]{2})([0-9]{4})([0-9]{4})$/', '($1) $2-$3', $phone);
    }
	
}