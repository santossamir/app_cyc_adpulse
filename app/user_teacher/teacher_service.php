<?php 
    class UserService{
        private $conexion;
        private $id_user;
        private $name_user;
        private $email_user;
        private $password_user;

        public function __construct(Conexion $conexion, User $email_user){
            $this->conexion = $conexion->connect();
            $this->name_user = $name_user;
            $this->email_user = $email_user;
            $this->password_user = $password_user;
        }

        public function insert(){
            $query_insert = 'insert into tb_users(user)values(:user)';
            $stmt = $this->conexion->prepare($query_insert);
            $stmt->bindValue(':user', $this->user->__get('user'));
            $stmt->execute();
        }

        public function login(){ 
            $query_consultar = '
                select 
                   id_user,
                   name_user,
                   email_user,
                   password_user
                from
                   tb_users
            ';
            $stmt = $this->conexion->prepare($query_consultar);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }     
    }
?>