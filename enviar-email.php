<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    // Configurações do e-mail para o cliente
    $to = "gustavo.wilken@gmail.com"; // E-mail principal que recebe os dados
    $subject = "Nova mensagem de contato de $nome";
    $body = "Nome: $nome\nEmail: $email\nTelefone: $telefone\n\nMensagem:\n$mensagem";
    $headers = "From: $email";

    // Envia o e-mail para o cliente
    if (mail($to, $subject, $body, $headers)) {
        // Confirmação para o próprio usuário
        $subjectUser = "Confirmação de recebimento da sua mensagem";
        $bodyUser = "Olá $nome, recebemos sua mensagem com os dados a seguir:\n\nNome: $nome\nEmail: $email\nTelefone: $telefone\nMensagem:\n$mensagem\n\nObrigado pelo contato!";
        mail($email, $subjectUser, $bodyUser, "From: seu_email@dominio.com");

        // Redireciona para a página de sucesso
        header("Location: sucesso.html");
        exit;
    } else {
        echo "Houve um erro ao enviar sua mensagem. Tente novamente.";
    }
}
?>
