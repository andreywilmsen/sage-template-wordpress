# ⚖️ Veredict Advocacy - WordPress Theme (Sage 11 + Bootstrap)

Este é o tema oficial do projeto Veredict, desenvolvido sobre o framework Sage 11 (Roots). O projeto foi customizado para utilizar Bootstrap 5 com processamento Sass, removendo a dependência padrão do Tailwind CSS e garantindo compatibilidade total com o ambiente Local WP.

## 🛠️ Requisitos de Ambiente (Local)
- PHP: `8.2.29` (Versão estável do Local WP)
- Node.js: `^20.0`
- Composer: `^2.0`

## 🏗️ Guia de Configuração Estrutural (Passo a Passo)
Este guia documenta as alterações realizadas para converter a estrutura original do Sage 11 (Tailwind) para uma arquitetura baseada em Bootstrap.

### 1. Compatibilidade de PHP (Composer)
Para evitar erros de plataforma no Local WP, o arquivo `composer.json` foi configurado para travar a versão de desenvolvimento.

Arquivo: `composer.json`
Configuração no bloco `config`:
```json
"config": {
  "allow-plugins": {
    "roots/acorn": true
  },
  "platform": {
    "php": "8.2.29"
  }
}
```
Comando para aplicar:
bash
```bash
composer install --ignore-platform-reqs
```

### 2. Substituição do Motor de Frontend (NPM)
Remoção do Tailwind e instalação do Bootstrap 5, Popper.js e o compilador Dart Sass.
```bash
npm uninstall @tailwindcss/vite tailwindcss
npm install bootstrap @popperjs/core sass-embedded
```

### 3. Migração de Assets (CSS para SCSS)
As extensões dos arquivos de estilo foram alteradas para suportar os mixins e variáveis do Bootstrap.
Renomeação de arquivos:
de resources/css/app.css para resources/css/app.scss
de resources/css/editor.css para resources/css/editor.scss
Configuração do resources/css/app.scss:
```scss
$primary: #2d4a27;
$secondary: #f8f9fa;
$border-radius: 20px;
@import "bootstrap/scss/bootstrap";