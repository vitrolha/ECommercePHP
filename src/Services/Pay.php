<?php 
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(!isset($_SESSION)){
            session_start();
        }
    
        if (isset($_SESSION['id_list']) && !empty($_SESSION["id_list"])) {
            $_SESSION['id_list'] = [];
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processando Pagamento</title>
</head>
<body>
    <div class="processing-container">
        <div class="spinner"></div>
        <p class="processing-text">Processando pagamento...</p>
    </div>
    <div id="payment-result" class="result-message"></div>
    
    <button id="back-home-button" class="back-home-button" onclick="goBackToHome()">Voltar para a Página Inicial</button>
</body>
</html>

<style>
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
}

.processing-container {
    text-align: center;
}

.spinner {
    width: 50px;
    height: 50px;
    border: 5px solid #ccc;
    border-top-color: #007bff;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-bottom: 10px;
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.processing-text {
    font-size: 1.2em;
    color: #555;
}

.result-message {
    display: none;
    font-size: 1.4em;
    color: #007bff;
}

.back-home-button {
    display: none;
    margin-top: 20px;
    padding: 10px 20px;
    font-size: 1em;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.back-home-button:hover {
    background-color: #0056b3;
}


</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const processingTime = 3000; 
    const redirectDelay = 2000; 

    const processingContainer = document.querySelector('.processing-container');
    const resultMessage = document.getElementById('payment-result');
    const backHomeButton = document.getElementById('back-home-button');

    function simulatePaymentResult() {

        processingContainer.style.display = 'none';

        //const isSuccess = Math.random() > 0.3;

        const isSuccess = true;

        if (isSuccess) {
            resultMessage.textContent = "Pagamento concluído com sucesso!";
            resultMessage.style.color = "#28a745"; 
        } else {
            resultMessage.textContent = "Falha no processamento do pagamento.";
            resultMessage.style.color = "#dc3545"; 
        }


        resultMessage.style.display = 'block';
        backHomeButton.style.display = 'inline-block';
    }


    window.goBackToHome = function() {
        window.location.href = "/"; 
    };


    setTimeout(simulatePaymentResult, processingTime);
});

</script>