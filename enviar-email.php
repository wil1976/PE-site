<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Configura o e-mail de destino e o conteúdo do e-mail
    $to = "gustavo@peservico.com.br"; // Substitua pelo seu endereço de e-mail
    $subject = "Nova mensagem de contato de $nome";
    $body = "Nome: $nome\nEmail: $email\n\nMensagem:\n$mensagem";
    $headers = "From: $email";

    // Tenta enviar o e-mail
    if (mail($to, $subject, $body, $headers)) {
        // Redireciona para a página de sucesso
        header("Location: sucesso.html");
        exit();
    } else {
        // Mostra uma mensagem de erro se o e-mail não foi enviado
        echo "Houve um erro ao enviar sua mensagem. Tente novamente.";
    }
}
?>
