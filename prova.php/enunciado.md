### Opção 1: O Simulador de Frete "Logística Express"

**Cenário:** Uma transportadora precisa de um sistema que calcule o valor do frete com base na distância e no peso da mercadoria.

- **Requisitos Técnicos:**
    - Um formulário (POST) para captar: Distância (km), Peso (kg) e Tipo de Envio (Normal ou Expresso).
    - **Lógica de Cálculo:**
        - Valor base: R$ 10,00.
        - Cobrar R$ 0,50 por km rodado.
        - Se o peso for maior que 20kg, adicionar uma taxa de R$ 30,00.
        - Se o envio for "Expresso", o valor total aumenta em 20%.
        

---
### Opção 2: Sistema de Vendas "Black Friday" (Cupom de Desconto)

**Cenário:** Uma loja quer aplicar descontos dinâmicos no carrinho de compras dependendo do valor gasto e de um código promocional.

- **Requisitos Técnicos:**
    - Campos: Valor da Compra e Código do Cupom (Texto).
    - **Lógica de Cálculo:**
        - Se o valor for acima de R$ 500,00, ganha 10% de desconto automático.
        - Se o usuário digitar o cupom "AMIGAO10", ganha mais R$ 10,00 de desconto fixo.
        - Exibir o "Valor Original", o "Desconto Aplicado" e o "Valor Final".

### Opção 3: O "Calculador de XP" (Sistema de RPG/Games)

**Cenário:** Um novo jogo de RPG precisa de uma página para calcular se o jogador subiu de nível após uma missão.

- **Entradas (POST):** Nível Atual, XP Acumulado e Dificuldade da Missão (Fácil, Média, Difícil).
- **Lógica de Cálculo:**
    - Cada missão dá uma base de 100 XP.
    - Se a dificuldade for **Média**, multiplica por 1.5. Se for **Difícil**, multiplica por 2.0.
    - **O "Level Up":** Se o novo total de XP for maior que 1000, exibe uma mensagem: "PARABÉNS! Você subiu para o nível X+1".

### Opção 4: O "Filtro de Streamer" (Cálculo de Donates/Sub)

**Cenário:** Um streamer da Twitch/YouTube quer saber quanto ele vai receber "limpo" no final do mês após as taxas das plataformas.

- **Entradas (POST):** Valor Total de Donates, Número de "Subs" (Inscrições) e Plataforma (Twitch ou YouTube).
- **Lógica de Cálculo:**
    - Na **Twitch**, a plataforma fica com 50% do valor dos Subs.
    - No **YouTube**, a taxa é de 30%.
    - **Desafio:** Se o valor final for menor que R$ 100,00, exibir um aviso: "Saldo insuficiente para saque mínimo".