# Sistema de Vacinas 💉

## 1 - Escopo da aplicação:
Este sistema simula o funcionamento de um petshop em relação ao controle de vacinação de animais. A aplicação permite que clientes cadastrem seus pets e agendem vacinas, enquanto veterinários têm acesso aos agendamentos para realizá-los ou excluí-los. O sistema é baseado em PHP puro, com responsividade usando Bootstrap, e oferece geração de relatórios em PDF.

---

## 2 - Módulos / Funcionalidades

### 👤 Cliente:
- **Módulo 1:** Cadastro, gerenciamento e exclusão de pets.
- **Módulo 2:** Agendamento e visualização de vacinas para seus pets.

### 🩺 Veterinário:
- Visualização de agendamentos relacionados ao seu nome.
- Marcação de vacinas como “realizadas”.
- Exclusão de agendamentos, se necessário.

---

## 3 - Organização das pastas

A aplicação segue o padrão MVC (Model-View-Controller), com a seguinte estrutura resumida:
```
APLICACAO_PETSHOP/
│
├── controllers/ # Controladores das rotas e ações da aplicação
├── models/ # Lógica de negócio e comunicação com o banco
├── public/ # Arquivos estáticos (CSS, imagens)
├── views/ # Páginas da interface separadas por tipo
├── relatorios/ # Geração de PDFs com a FPDF
├── vendor/ # Bibliotecas externas
├── index.php # Ponto de entrada da aplicação
```
---

## 4 - Tecnologias usadas

- ✅ **PHP 8.1**
- ✅ **Bootstrap 5** (para layout e responsividade)
- ✅ **MySQL** (armazenamento dos dados)
- ✅ **mysqli** (comunicação com o banco)
- ✅ **FPDF** (geração de relatórios em PDF)

---

## 5 - Considerações

Este é um projeto em evolução, e sugestões de melhoria, correções e novas ideias são muito bem-vindas!  
Sinta-se à vontade para abrir issues ou enviar pull requests.

---

## 6 - Meus contatos
- [LinkedIn](https://www.linkedin.com/in/luis-felipe-8725a1291/)
- [Email](mailto:luisfelipecontato08@gmail.com)
