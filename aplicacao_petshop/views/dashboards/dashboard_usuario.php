<?php 
    include_once $_SERVER['DOCUMENT_ROOT']  . '/estudos_php/aplicacao_petshop/views/includes/header.php';
?>

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Bem-vindo ao Painel do Cliente</h1>
        <p class="lead">Gerencie seus pets e acompanhe os agendamentos de vacinas de forma simples e rápida.</p>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-primary">
                <div class="card-body text-center">
                    <h5 class="card-title">Meus Pets</h5>
                    <p class="card-text">Visualize, cadastre, edite e gerencie todos os seus pets.</p>
                    <a href="/estudos_php/aplicacao_petshop/views/crud/crud_pets.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-success">
                <div class="card-body text-center">
                    <h5 class="card-title">Agendamentos de Vacina</h5>
                    <p class="card-text">Consulte, agende ou acompanhe a vacinação dos seus animais.</p>
                    <a href="/estudos_php/aplicacao_petshop/views/crud/crud_agendamentos_vacina_cliente.php" class="btn btn-success">Acessar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include_once $_SERVER['DOCUMENT_ROOT']  . '/estudos_php/aplicacao_petshop/views/includes/footer.php';
?>