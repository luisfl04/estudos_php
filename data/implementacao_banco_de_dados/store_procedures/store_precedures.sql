/* Procedures relacionadas ao contexto das tabelas da aplicação */


-- Store procedure que atualiza o status dos agendamentos para 'realizado' onde a data_realizacao foi preenchida.
DELIMITER $$

CREATE PROCEDURE AtualizarStatusAgendamento()
BEGIN
    UPDATE agendamento_vacina
    SET status_agendamento = 'realizado'
    WHERE data_realizacao IS NOT NULL
      AND status_agendamento != 'realizado';
END$$

DELIMITER ;

-- Procedure que verifica os digítos de CPFs  enviados para inserção nas tabela de clientes e veterinários, para que garantam que apenas valores
-- numéricos sejam inseridos.
DELIMITER $$

CREATE PROCEDURE ValidarCPF(IN cpf_valor VARCHAR(11))
BEGIN
    IF cpf_valor NOT REGEXP '^[0-9]{11}$' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'CPF inválido: deve conter exatamente 11 dígitos numéricos.';
    END IF;
END$$

DELIMITER ;

