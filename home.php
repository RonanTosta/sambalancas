<?php
require('conexao.php');

try {
    // Consultando os serviços e parceiros ativos
    $servicos = $pdo->query("SELECT * FROM servicos WHERE ativo = 1")->fetchAll(PDO::FETCH_ASSOC);
    $parceiros = $pdo->query("SELECT * FROM parceiros WHERE ativo = 1")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro na consulta SQL: ' . $e->getMessage();
    $servicos = [];
    $parceiros = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sam Balanças</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>

<body id="home">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">
            <img src="img/navbar.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Início</a></li>
                <li class="nav-item"><a class="nav-link" href="#sobre">Sobre</a></li>
                <li class="nav-item"><a class="nav-link" href="#servicos">Serviços</a></li>
                <li class="nav-item"><a class="nav-link" href="#clientes">Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
                <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Imagem principal -->
    <div class="container-fluid flex p-2 my-2">
        <img src="img/topo.png" class="w-50 d-block mx-auto">
    </div>

    <!-- Carrossel de Imagens -->
    <div class="container mt-1 p-1">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-target="#carouselExample" data-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-target="#carouselExample" data-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-target="#carouselExample" data-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active my-5">
                    <img src="img/servicos.png" class="d-block w-50 mx-auto" alt="Imagem 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h4></h4>
                        <p>
                        <h4></h4>
                        </p>
                    </div>
                </div>
                <div class="carousel-item my-5">
                    <img src="img/informacoes.png" class="d-block w-50 mx-auto" alt="Imagem 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5></h5>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item my-5">
                    <img src="img/local3.png" class="d-block w-50 mx-auto" alt="Imagem 3">
                    <br>
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-center text-dark">Endereço</h3>
                        <p>
                        <h4 class="text-center text-dark">Av: Brasília, 1317</h4>
                        </p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
    </div>

    <!-- Sobre a Empresa -->
    <section id="sobre" class="container my-4">
        <h2>Sam Balanças</h2><br>
        <p> A empresa Sam Balanças surgiu a partir de um sonho de ser proprietário do próprio empreendimento combinado à
            paixão por
            manutenções. Percebemos a oportunidade de oferecer suporte técnico de qualidade para comerciantes da área de
            balanças, visto
            que, em nossa cidade havia um déficit de profissionais qualificados
            nesse ramo. A responsabilidade e o capricho de nossa empresa garantem que seu equipamento de medição esteja
            em perfeitas
            condições de trabalho. Você precisa de sua balança e nós precisamos de você! Pense no seu negócio e nós
            pensamos na sua
            balança para você! Entre em contato conosco que resolveremos seu problema. <br><br>

        <h3>Missão</h3>
        Disponibilizar o melhor atendimento para nossos clientes garantindo o
        desenvolvimento das habilidades e competências exigidas pela demanda do mercado. <br><br>

        <h3>Visão</h3>
        Ser referência em assistência técnica de balanças em Frutal e região, atuando com padrão de excelência. <br><br>

        <h3>Valores</h3>
        Qualidade <br>
        Ética <br>
        Responsabilidade <br>
        Confiabilidade <br>
        Eficiência <br>
        Organização <br>
        Inovação <br>
        </p>
    </section>

    <!-- Serviços -->
    <section id="servicos" class="container my-5 border-container">
        <h2 class="text-secondary">Serviços</h2>
        <div class="row">
            <?php if (empty($servicos)): ?>
                <p>Nenhum serviço cadastrado no momento.</p>
            <?php else: ?>
                <?php foreach ($servicos as $servico): ?>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="servicos">
                            <h3 class="text-center text-secondary"><?= htmlspecialchars($servico['nome_servico']) ?></h3>
                            <img src="uploads/<?= htmlspecialchars($servico['imagem']) ?>" class="d-block w-50 mx-auto"
                                alt="Serviço">
                            <p class="text-center"><?= htmlspecialchars($servico['descricao']) ?></p>
                            <p><?= $imagemPath ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Clientes -->
    <section id="clientes" class="container my-5 border-container">
        <h2 class="text-secondary">Nossos Clientes</h2>
        <div class="row">
            <?php if (empty($parceiros)): ?>
                <p>Nenhum parceiro cadastrado no momento.</p>
            <?php else: ?>
                <?php foreach ($parceiros as $parceiro): ?>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="clientes">
                            <img src="uploads/<?= htmlspecialchars($parceiro['logo']) ?>" class="d-block w-50 mx-auto"
                                alt="<?= htmlspecialchars($parceiro['nome_parceiro']) ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Contato -->
    <section id="contato" class="container my-5">
        <h2>Contato</h2><br>
        <div class="row">
            <div class="col-md-6">
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Mensagem</label>
                        <textarea class="form-control" id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-md-6">
                <h3>Localização</h3>
                <p>Av. Brasília, 1317 - Estudantil, Frutal - MG, 38200-000</p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.603816275971!2d-48.9357732!3d-20.0348279!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94bcb143d7eebbe1%3A0xc342761f783197a4!2sAv.%20Bras%C3%ADlia%2C%201317%20-%20Estudantil%2C%20Frutal%20-%20MG%2C%2038200-000!5e0!3m2!1sen!2sbr!4v1690738083629!5m2!1sen!2sbr"
                    width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <footer class="bg-light text-dark text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; 2024 Sam Balanças. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/emailjs-com@2.6.4/dist/email.min.js"></script>
    <script src="script.js"></script>
</body>

</html>