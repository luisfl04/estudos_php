<?php 
    include_once $_SERVER['DOCUMENT_ROOT']  . '/estudos_php/aplicacao_petshop/views/includes/header.php';
?>

<div class="container my-5" style="height:100vh;">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Bem-vindo ao Painel do Veterinario</h1>
        <p class="lead">Gerencie suas vacinas e seus relatórios de forma simples e fácil.</p>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-primary">
                <div class="card-body text-center">
                    <h5 class="card-title">Agendamentos de Vacinas</h5>
                    <p class="card-text">Visualize, realize, exclua e gere relatórios de todos os seus agendamentos.</p>
                    <a href="/estudos_php/aplicacao_petshop/views/crud/crud_agendamentos_vacina_veterinario.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
    </div>

<?php 
    include_once $_SERVER['DOCUMENT_ROOT']  . '/estudos_php/aplicacao_petshop/views/includes/footer.php';
?>