<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jogo de Combate à Dengue</title>
<style>
    #canvas {
        border: 1px solid black;
    }
    .legend {
        font-family: Arial, sans-serif;
        font-size: 14px;
        color: black;
        margin-top: 10px;
        text-align: center;
    }
    .ranking {
        font-family: Arial, sans-serif;
        font-size: 18px;
        color: black;
        margin-top: 20px;
        text-align: center;
        display: none;
    }
    .message {
        font-family: Arial, sans-serif;
        font-size: 16px;
        color: black;
        margin-top: 10px;
        text-align: center;
        display: none;
    }
</style>
</head>
<body>
<canvas id="canvas" width="400" height="400"></canvas>
<div class="ranking" id="ranking"></div>
<div class="message" id="message"></div>
<script>
    // Obtendo referência para o canvas
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");

    // Definindo variáveis do jogador
    var player = {
        x: canvas.width / 2,
        y: canvas.height / 2,
        radius: 10,
        speed: 5,
        dx: 0,
        dy: 0
    };

    // Definindo variáveis do jogo
    var mosquitoes = [];
    var waterContainers = [];
    var score = 0;
    var timer = 600;
    var mosquitoCollisions = 0;
    var waterCollected = 0;
    var mosquitoInterval = 2000; // Intervalo inicial de aparecimento dos mosquitos
    var lastWaterCollectedTime = Date.now(); // Variável para rastrear o tempo da última coleta de recipiente

    // Controles de movimento
    var moveUp = false;
    var moveDown = false;
    var moveLeft = false;
    var moveRight = false;

    // Contadores para tipos de focos eliminados
    var eliminatedFoci = {
        "Vazo": 0,
        "Garrafa": 0,
        "Pneu": 0,
        "Saco de lixo": 0
    };

    // Mensagens para tipos de focos eliminados
    var focusMessages = {
        "Vazo": "Você jogou fora um vaso contendo água, parabéns!",
        "Garrafa": "Você virou garrafas!",
        "Pneu": "Você eliminou água de pneus!",
        "Saco de lixo": "Você tampou sacos de lixo!"
    };

    // Função para exibir mensagem
    function showMessage(message) {
        var messageDiv = document.getElementById("message");
        messageDiv.textContent = message;
        messageDiv.style.display = "block";
        setTimeout(function() {
            messageDiv.style.display = "none";
        }, 3000);
    }

    // Função para desenhar o jogador
    function drawPlayer() {
        ctx.beginPath();
        ctx.arc(player.x, player.y, player.radius, 0, Math.PI * 2);
        ctx.fillStyle = "blue";
        ctx.fill();
        ctx.closePath();
    }

    // Função para mover o jogador
    function movePlayer() {
        player.x += player.dx;
        player.y += player.dy;

        // Limitando movimento dentro do canvas
        if (player.x < player.radius) {
            player.x = player.radius;
        }
        if (player.x > canvas.width - player.radius) {
            player.x = canvas.width - player.radius;
        }
        if (player.y < player.radius) {
            player.y = player.radius;
        }
        if (player.y > canvas.height - player.radius) {
            player.y = canvas.height - player.radius;
        }

        // Movendo o jogador com base nos controles
        if (moveUp) {
            player.dy = -player.speed;
        } else if (moveDown) {
            player.dy = player.speed;
        } else {
            player.dy = 0;
        }
        if (moveLeft) {
            player.dx = -player.speed;
        } else if (moveRight) {
            player.dx = player.speed;
        } else {
            player.dx = 0;
        }
    }

    // Função para desenhar os mosquitos
    function drawMosquitoes() {
        mosquitoes.forEach(function(mosquito) {
            ctx.beginPath();
            ctx.arc(mosquito.x, mosquito.y, mosquito.radius, 0, Math.PI * 2);
            ctx.fillStyle = "red";
            ctx.fill();
            ctx.closePath();
        });
    }

    // Função para desenhar os recipientes de água
    function drawWaterContainers() {
        waterContainers.forEach(function(container) {
            ctx.beginPath();
            ctx.rect(container.x, container.y, container.width, container.height);
            ctx.fillStyle = "#d9ead3"; // Verde claro
            ctx.fill();
            ctx.closePath();
        });
    }

    // Função para verificar colisões entre o jogador e os mosquitos e coleta de recipientes de água
    function checkCollisions() {
        // Colisões com mosquitos
        mosquitoes.forEach(function(mosquito, index) {
            var dx = player.x - mosquito.x;
            var dy = player.y - mosquito.y;
            var distance = Math.sqrt(dx * dx + dy * dy);
            if (distance < player.radius + mosquito.radius) {
                // Colisão com mosquito
                mosquitoes.splice(index, 1);
                score -= 10; // Pontuação diminui ao colidir com mosquito
                mosquitoCollisions++; // Incrementa o contador de colisões com mosquitos
                if (mosquitoCollisions > 2) {
                    endGame("Você morreu de dengue hemorrágica!");
                }
            }
        });

        // Colisões com recipientes de água
        waterContainers.forEach(function(container, index) {
            var dx = player.x - container.x;
            var dy = player.y - container.y;
            var distance = Math.sqrt(dx * dx + dy * dy);
            if (distance < player.radius + container.width / 2) {
                // Coleta de recipiente de água
                waterContainers.splice(index, 1);
                score += 50; // Pontuação aumenta ao coletar recipiente de água
                var type = container.type;
                eliminatedFoci[type]++; // Incrementa o contador do tipo de foco eliminado
                showMessage(focusMessages[type]); // Exibe mensagem específica para o tipo de foco eliminado
                waterCollected++; // Incrementa o contador de recipientes de água coletados
                lastWaterCollectedTime = Date.now(); // Atualiza o tempo da última coleta de recipiente
                if (waterCollected >= 5) { // Se coletar 5 recipientes, passar para a próxima fase
                    mosquitoInterval = Math.max(500, mosquitoInterval - 200); // Diminuir intervalo de aparecimento dos mosquitos
                    waterCollected = 0; // Reiniciar contador de recipientes coletados
                    clearInterval(createObjectsInterval); // Limpar intervalo atual
                    createObjectsInterval = setInterval(createObjects, mosquitoInterval); // Criar novo intervalo com a nova velocidade de aparecimento dos mosquitos
                    showMessage("Você avançou para a próxima fase!"); // Exibir mensagem de transição de fase
                }
            }
        });

        // Verificar se o jogador demorou mais de 5 segundos para coletar recipiente
        if (Date.now() - lastWaterCollectedTime > 5000) {
            mosquitoInterval *= 2; // Dobrar o intervalo de aparecimento dos mosquitos
            lastWaterCollectedTime = Date.now(); // Atualizar o tempo da última coleta de recipiente
            clearInterval(createObjectsInterval); // Limpar intervalo atual
            createObjectsInterval = setInterval(createObjects, mosquitoInterval); // Criar novo intervalo com a nova velocidade de aparecimento dos mosquitos
            showMessage("A quantidade de mosquitos aumentou!"); // Exibir mensagem de aumento de mosquitos
        }
    }

    // Função para atualizar a tela do jogo
    function update() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        movePlayer();
        drawPlayer();
        drawMosquitoes();
        drawWaterContainers();
        checkCollisions();

        // Exibindo pontuação na tela
        ctx.fillStyle = "black";
        ctx.font = "20px Arial";
        ctx.fillText("Pontuação: " + score, 10, 30);

        // Exibindo temporizador na tela
        ctx.fillText("Tempo: " + timer + "s", 10, 60);

        // Atualizando temporizador
        timer--;
        if (timer <= 0) {
            endGame("O tempo acabou!");
        }
    }

    // Função para criar mosquitos e recipientes de água em intervalos regulares
    function createObjects() {
        var mosquito = {
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            radius: 5
        };
        mosquitoes.push(mosquito);

        var container = {
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            width: 10,
            height: 10,
            type: Math.random() < 0.25 ? "Vazo" : Math.random() < 0.5 ? "Garrafa" : Math.random() < 0.75 ? "Pneu" : "Saco de lixo"
        };
        waterContainers.push(container);
    }

    // Criando objetos (mosquitos e recipientes de água) a cada 2 segundos
    var createObjectsInterval = setInterval(createObjects, 2000);

    // Atualizando tela a cada 30 milissegundos
    var updateInterval = setInterval(update, 30);

    // Função para finalizar o jogo
    function endGame(message) {
        clearInterval(createObjectsInterval);
        clearInterval(updateInterval);

        // Exibir mensagem de fim de jogo
        showMessage(message);

        // Exibir ranking final
        var rankingDiv = document.getElementById("ranking");
        rankingDiv.innerHTML = "<h2>Ranking Final</h2>";
        rankingDiv.style.display = "block";
        rankingDiv.innerHTML += "<p>Pontuação: " + score + "</p>";

        // Exibir contagem de focos eliminados por tipo
        rankingDiv.innerHTML += "<h3>Focos Eliminados por Tipo</h3>";
        for (var type in eliminatedFoci) {
            rankingDiv.innerHTML += "<p>" + type + ": " + eliminatedFoci[type] + "</p>";
        }
    }

    // Função para iniciar o movimento para cima
    function startMoveUp() {
        moveUp = true;
    }

    // Função para iniciar o movimento para baixo
    function startMoveDown() {
        moveDown = true;
    }

    // Função para iniciar o movimento para a esquerda
    function startMoveLeft() {
        moveLeft = true;
    }

    // Função para iniciar o movimento para a direita
    function startMoveRight() {
        moveRight = true;
    }

    // Função para parar o movimento para cima
    function stopMoveUp() {
        moveUp = false;
    }

    // Função para parar o movimento para baixo
    function stopMoveDown() {
        moveDown = false;
    }

    // Função para parar o movimento para a esquerda
    function stopMoveLeft() {
        moveLeft = false;
    }

    // Função para parar o movimento para a direita
    function stopMoveRight() {
        moveRight = false;
    }

    // Adicionando eventos de teclado para controlar o movimento do jogador
    document.addEventListener("keydown", function(event) {
        if (event.key === "ArrowUp" || event.key === "w") {
            startMoveUp();
        } else if (event.key === "ArrowDown" || event.key === "s") {
            startMoveDown();
        } else if (event.key === "ArrowLeft" || event.key === "a") {
            startMoveLeft();
        } else if (event.key === "ArrowRight" || event.key === "d") {
            startMoveRight();
        }
    });

    document.addEventListener("keyup", function(event) {
        if (event.key === "ArrowUp" || event.key === "w") {
            stopMoveUp();
        } else if (event.key === "ArrowDown" || event.key === "s") {
            stopMoveDown();
        } else if (event.key === "ArrowLeft" || event.key === "a") {
            stopMoveLeft();
        } else if (event.key === "ArrowRight" || event.key === "d") {
            stopMoveRight();
        }
    });

</script>
<div class="legend">
    <span style="color: #d9ead3;">Recipiente de Água</span>: Coletar para prevenir a reprodução do mosquito da dengue.<br>
    <span style="color: red;">Mosquito</span>: Evitar contato para não contrair a dengue.
</div>
<div class="message" id="message"></div>
<div class="ranking" id="ranking"></div>
</body>
</html>
