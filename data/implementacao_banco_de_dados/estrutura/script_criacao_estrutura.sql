/* Sript de criação do banco de dados da aplicação de gerenciamento de vacinas em um petshop */

/* Tabela 'Endereco' */
CREATE TABLE endereco (
    id_endereco INT NOT NULL AUTO_INCREMENT,

    rua VARCHAR(50) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado VARCHAR(30) NOT NULL,
    complemento VARCHAR(60),

    PRIMARY KEY (id_endereco)
);

/* Tabela Usuario: */
CREATE TABLE usuario (
    id_usuario INT NOT NULL AUTO_INCREMENT,
    endereco_id INT NOT NULL,

    username VARCHAR(20) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    data_nascimento DATE,
    sexo ENUM('M', 'F', 'Outro') NOT NULL,

    PRIMARY KEY (id_usuario),
    FOREIGN KEY (endereco_id) REFERENCES endereco(id_endereco)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

/*Tabela 'veterinario' */
CREATE TABLE veterinario (
    id_veterinario INT NOT NULL AUTO_INCREMENT,
    endereco_id INT NOT NULL,

    username VARCHAR(20) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    numero_crmv VARCHAR(5) NOT NULL UNIQUE,
    nome VARCHAR(50) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    data_nascimento DATE NOT NULL,
    sexo ENUM('M', 'F', 'Outro') NOT NULL,

    PRIMARY KEY (id_veterinario),
    FOREIGN KEY (endereco_id) REFERENCES endereco(id_endereco)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

/* Tabela 'tipo_pet' */
CREATE TABLE tipo_pet (
    id_tipo_pet INT NOT NULL AUTO_INCREMENT,
    nome_tipo VARCHAR(50) NOT NULL,

    PRIMARY KEY (id_tipo_pet)
);


/* tabela 'pet' */
CREATE TABLE pet (
    id_pet INT NOT NULL AUTO_INCREMENT,
    usuario_dono_id INT NOT NULL,
    tipo_pet_id INT NOT NULL,
    raca_pet VARCHAR(50) NOT NULL,
    apelido VARCHAR(50) NOT NULL,
    idade TINYINT UNSIGNED NOT NULL,
    sexo ENUM('M', 'F', 'Outro') NOT NULL,
    PRIMARY KEY (id_pet),
    FOREIGN KEY (usuario_dono_id) REFERENCES usuario(id_usuario),
    FOREIGN KEY (tipo_pet_id) REFERENCES tipo_pet(id_tipo_pet)
);

/* tabela 'vacina': */
CREATE TABLE vacina (
    id_vacina INT NOT NULL AUTO_INCREMENT,
    tipo_pet_id INT NOT NULL,
    nome_tipo VARCHAR(100) NOT NULL,
    descricao_tipo VARCHAR(255) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (id_vacina),
    FOREIGN KEY (tipo_pet_id) REFERENCES tipo_pet(id_tipo_pet)
);

/* tabela 'agendamento_vacina' */
CREATE TABLE agendamento_vacina (
    id_agendamento_vacina INT NOT NULL AUTO_INCREMENT,
    usuario_relacionado_id int not null,
    pet_id INT NOT NULL,
    veterinario_id INT NOT NULL,
    vacina_id INT NOT NULL,
    data_agendamento DATE NOT NULL,
    data_realizacao DATE,
    status_agendamento enum('agendado', 'realizado') not null,
    PRIMARY KEY (id_agendamento_vacina),
    FOREIGN KEY (pet_id) REFERENCES pet(id_pet),
    FOREIGN KEY (veterinario_id) REFERENCES veterinario(id_veterinario),
    FOREIGN KEY (vacina_id) REFERENCES vacina(id_vacina)
);

