# 📦 Laravel Order Processing API

Este projeto é uma API de processamento de pedidos construída com Laravel.

---

## 🚀 Funcionalidades

- Endpoint `POST /api/orders` para criação de pedidos.
- Cálculo do valor total do pedido com base em preços de produtos.
- Desconto de 10% aplicado automaticamente em pedidos acima de R$500.
- Validação robusta usando `FormRequest`.
- Arquitetura desacoplada com uso de:
  - Interface `PriceCalculatorInterface`
  - Implementação `DefaultPriceCalculator`
  - Serviço `OrderService`
  - Repositório `ProductRepository`
- Testes unitários e de integração com PHPUnit.
- Seeders e factories para simulação de produtos.

---

## 📎 Exemplo de Requisição

**POST** `/api/orders`

```json
{
  "customer_id": 123,
  "items": [
    { "product_id": 1, "quantity": 2 },
    { "product_id": 2, "quantity": 1 }
  ]
}
```

**Resposta**

```json
{
  "total": 495,
  "discount": 55,
  "items": [
    {
      "product_id": 1,
      "unit_price": 100,
      "quantity": 2,
      "subtotal": 200
    },
    {
      "product_id": 2,
      "unit_price": 350,
      "quantity": 1,
      "subtotal": 350
    }
  ]
}
```

---

## 🧪 Rodando os testes

```bash
php artisan test
```

Os testes cobrem:

- Lógica de preço e desconto
- Serviço orquestrador
- Endpoint de API completo
- Mock da interface via PHPUnit

---

## 🛠️ Setup do Projeto

### Requisitos

- PHP 8.1+
- Composer
- MySQL ou SQLite

### Passos para rodar:

```bash
git clone https://github.com/seu-usuario/orders-api.git
cd orders-api

cp .env.example .env
php artisan key:generate

# Configure o .env com o seu banco (ou use SQLite)
php artisan migrate --seed
php artisan serve
```

---

## 📁 Estrutura

```
app/
├── Http/
│   ├── Controllers/OrderController.php
│   ├── Requests/OrderRequest.php
├── Services/
│   ├── OrderService.php
│   └── DefaultPriceCalculator.php
├── Interfaces/
│   └── PriceCalculatorInterface.php
├── Repositories/
│   └── ProductRepository.php
```

---

## 💡 Notas Técnicas

- Arquitetura SOLID com injeção via service container.
- `FormRequest` para validação desacoplada.
- `Factory` e `Seeder` de `Product` para simulação.
- Testes com `RefreshDatabase`.
- Cobertura de comportamento esperado com mocks e testes reais.

---

## 👨‍💻 Autor

Desenvolvido por **Bruno Abreu** 

