-- Trigger que verifica o valor de cpf inserido na tabela 'usuario' usando a procedure de verificação:
DELIMITER $$

CREATE TRIGGER ValidarCPFUsuario
BEFORE INSERT ON usuario
FOR EACH ROW
BEGIN
    CALL ValidarCPF(NEW.cpf);
END$$

DELIMITER ;

-- Mesma implementação da trigger acima, em relação a veterinário:
DELIMITER $$

CREATE TRIGGER ValidarCPFVeterinario
BEFORE INSERT ON veterinario
FOR EACH ROW
BEGIN
    CALL ValidarCPF(NEW.cpf);
END$$

DELIMITER ;

