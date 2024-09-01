document.addEventListener("DOMContentLoaded", function() {
    emailjs.init("YOUR_EMAILJS_USER_ID");

    function checkAdmin() {
        fetch('/check-admin')
            .then(response => response.json())
            .then(data => {
                if (!data.loggedIn) {
                    window.location.href = '/login.html';
                }
            });
    }

    if (window.location.pathname === '/admin.html') {
        checkAdmin();
    }

    // Função para carregar logos dos clientes
    function loadClientes() {
        fetch('/clientes')
            .then(response => response.json())
            .then(clientes => {
                const clientesDiv = document.getElementById('clientes-logos');
                if (clientesDiv) {
                    clientesDiv.innerHTML = '';
                    clientes.forEach(cliente => {
                        const logoDiv = document.createElement('div');
                        logoDiv.className = 'col-3';
                        logoDiv.innerHTML = `<img src="${cliente.logo}" class="img-fluid" alt="${cliente.nome}">`;
                        clientesDiv.appendChild(logoDiv);
                    });
                }
            });
    }

    // Carregar logos de clientes ao carregar a página de administração
    if (document.getElementById('clientes-logos')) {
        loadClientes();
    }

    // Enviar formulário de contato
    document.getElementById("contactForm")?.addEventListener("submit", function(event) {
        event.preventDefault();

        const serviceID = "default_service";
        const templateID = "template_xxxx";

        const templateParams = {
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            message: document.getElementById("message").value
        };

        emailjs.send(serviceID, templateID, templateParams)
            .then(response => {
                alert("Mensagem enviada com sucesso!", response.status, response.text);
            }, error => {
                alert("Falha ao enviar a mensagem.", error);
            });
    });

    // Enviar formulário de cliente
    document.getElementById("clienteForm")?.addEventListener("submit", function(event) {
        event.preventDefault();

        const cliente = {
            nome: document.getElementById("clienteNome").value,
            logo: document.getElementById("clienteLogo").value
        };

        fetch('/clientes', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(cliente)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadClientes();
                alert("Cliente salvo com sucesso!");
            } else {
                alert("Falha ao salvar o cliente.");
            }
        });
    });
});
