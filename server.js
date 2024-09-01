const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

let clientes = [
    { nome: "Cliente 1", logo: "logo1.png" },
    { nome: "Cliente 2", logo: "logo2.png" },
    { nome: "Cliente 3", logo: "logo3.png" },
    { nome: "Cliente 4", logo: "logo4.png" }
];

app.use(bodyParser.json());
app.use(express.static('public'));

app.get('/clientes', (req, res) => {
    res.json(clientes);
});

app.post('/clientes', (req, res) => {
    const cliente = req.body;
    clientes.push(cliente);
    res.json({ success: true });
});

app.listen(port, () => {
    console.log(`Servidor rodando em http://localhost:${3000}`);
});
