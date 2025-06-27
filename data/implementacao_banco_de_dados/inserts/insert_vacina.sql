INSERT INTO vacina (
    tipo_pet_id, nome_tipo, descricao_tipo, valor
) VALUES
    -- Vacinas para Cachorro
    (1, 'Vacina V8', 'Protege contra cinomose, parvovirose, adenovirose e outras doenças.', 120.00),
    (1, 'Vacina V10', 'Ampla proteção contra doenças virais, incluindo leptospirose.', 150.00),
    (1, 'Vacina Antirrábica', 'Protege contra a raiva, obrigatória por lei.', 80.00),
    (1, 'Vacina Giárdia', 'Previne infecção por giárdia em cães.', 90.00),
    (1, 'Vacina Gripe Canina', 'Protege contra doenças respiratórias como a tosse dos canis.', 100.00),
    
    -- Vacinas para Gato
    (2, 'Vacina Quádrupla', 'Protege contra rinotraqueíte, calicivirose, panleucopenia e clamidiose.', 130.00),
    (2, 'Vacina Antirrábica', 'Protege contra a raiva, obrigatória por lei.', 85.00),
    (2, 'Vacina Leucemia Felina', 'Protege contra o vírus da leucemia felina (FeLV).', 140.00),
    (2, 'Vacina Giárdia', 'Previne infecção por giárdia em felinos.', 95.00),
    (2, 'Vacina Calicivirose', 'Específica contra o calicivírus felino.', 90.00),

    -- Vacinas para Cavalo
    (3, 'Vacina Contra Influenza', 'Protege contra gripe equina.', 200.00),
    (3, 'Vacina Contra Tétano', 'Previne o tétano em cavalos.', 180.00),
    (3, 'Vacina Contra Raiva', 'Protege contra a raiva, obrigatória por lei.', 170.00),
    (3, 'Vacina Rinopneumonite', 'Previne doenças respiratórias em equinos.', 210.00),
    (3, 'Vacina Contra Encefalomielite', 'Protege contra encefalomielite equina.', 220.00),

    -- Vacinas para Passarinho
    (4, 'Vacina Contra Newcastle', 'Protege contra a doença de Newcastle.', 50.00),
    (4, 'Vacina Contra Bouba Aviária', 'Previne a bouba aviária em aves.', 60.00),
    (4, 'Vacina Contra Bronquite Infecciosa', 'Protege contra a bronquite em aves.', 55.00),
    (4, 'Vacina Contra Coriza', 'Previne doenças respiratórias em pássaros.', 70.00),
    (4, 'Vacina Contra Gumboro', 'Protege contra a doença infecciosa de Gumboro.', 65.00),

    -- Vacinas para Gado
    (5, 'Vacina Contra Febre Aftosa', 'Proteção obrigatória contra febre aftosa.', 40.00),
    (5, 'Vacina Contra Botulismo', 'Previne a intoxicação alimentar causada pelo Clostridium botulinum.', 45.00),
    (5, 'Vacina Contra Clostridiose', 'Protege contra infecções causadas por Clostridium.', 50.00),
    (5, 'Vacina Contra Raiva', 'Proteção contra a raiva em bovinos.', 35.00),
    (5, 'Vacina Contra Brucelose', 'Obrigatória para controle de brucelose em fêmeas.', 55.00);