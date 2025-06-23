-- Visualizações de dados relacionados ao contexto da aplicação.

-- Views que retornam todos os valores das tabelas principais:
CREATE VIEW view_usuario AS
SELECT *
FROM usuario;

CREATE VIEW view_pet AS
SELECT *
FROM pet;

CREATE VIEW view_veterinario AS
SELECT *
FROM veterinario;

CREATE VIEW view_vacina AS
SELECT *
FROM vacina;

CREATE VIEW view_agendamento_vacina AS
SELECT *
FROM agendamento_vacina;

-- view que retorna os dados de determinado usuário juntamente com seu endereço:
CREATE VIEW view_usuario_endereco AS
SELECT 
    usuario.nome,
    usuario.telefone,
    usuario.cpf,
    usuario.data_nascimento,
    usuario.sexo,
    endereco.rua,
    endereco.bairro,
    endereco.cidade,
    endereco.estado,
    endereco.complemento
FROM usuario
INNER JOIN endereco ON usuario.endereco_id = endereco.id_endereco;

-- Mesma implementação de view_usuario_endereco, mas em relação a veterinário:
CREATE VIEW view_veterinario_endereco AS
SELECT 
    veterinario.nome,
    veterinario.telefone,
    veterinario.cpf,
    veterinario.data_nascimento,
    veterinario.sexo,
    endereco.rua,
    endereco.bairro,
    endereco.cidade,
    endereco.estado,
    endereco.complemento
FROM veterinario
INNER JOIN endereco ON veterinario.endereco_id = endereco.id_endereco;

