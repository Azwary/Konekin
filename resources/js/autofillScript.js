document.addEventListener('DOMContentLoaded', function () {
    // Mendengarkan peristiwa yang dikirim dari halaman pertama
    window.LaravelEcho.connector.socket.on('autofillDescription', function (data) {
        document.getElementById('description').value = data.description;
    });
});
