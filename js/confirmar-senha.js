function confirmarSenha() {
    if (document.getElementById('usuaSenha').value == document.getElementById('usuaSenhaConfirma').value && document.getElementById('usuaSenha').value.length >= 8) {
        document.getElementById('enviar').disabled = false;
    }
}
