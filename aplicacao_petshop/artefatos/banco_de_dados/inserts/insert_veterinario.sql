-- Inserindo valores relacionados aos endereços dos veterinários, primeiramente: 
INSERT INTO endereco (
    rua, bairro, cidade, estado, complemento
) VALUES
    ('Rua das Flores', 'Jardim Primavera', 'São Paulo', 'São Paulo', 'Apto 12'),
    ('Avenida dos Pássaros', 'Vila Nova', 'Rio de Janeiro', 'Rio de Janeiro', 'Casa 3'),
    ('Travessa do Sol', 'Centro', 'Belo Horizonte', 'Minas Gerais', 'Próximo à Praça Central');

-- Agora, inserindo os veterinários:
INSERT INTO veterinario (
    endereco_id, username, senha, numero_crmv, nome, telefone, cpf, data_nascimento, sexo
) VALUES
    ('1', 'anasilva321', 'ana321', 'CRMV1', 'Ana Silva', '11987654321', '12345678901', '1990-05-15', 'F'),
    ('2', 'brunosantos432', 'bruna432', 'CRMV2', 'Bruna Santos', '21998765432', '98765432109', '1988-08-22', 'F'),
    ('3', 'carlosalmeida321', 'carlos321', 'CRMV3', 'Carlos Almeida', '31987654321', '11223344556', '1985-03-10', 'M');
