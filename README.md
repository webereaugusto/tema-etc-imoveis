# Tema WordPress ETC Imóveis 🏢

Um tema WordPress especializado para portfólio de ativos imobiliários, desenvolvido especificamente para a ETC Imóveis.

## 🚀 Características Principais

### ✨ Funcionalidades
- **Custom Post Type** para Portfólio de Imóveis
- **Taxonomia personalizada** para categorização
- **Meta fields** completos para dados dos imóveis
- **Shortcode** para exibir portfólio em qualquer página
- **Sistema de filtros** avançado
- **Design responsivo** e moderno
- **SEO otimizado**

### 📋 Campos de Imóvel
- Área (m²)
- Dimensões
- Endereço completo
- Bairro e Cidade
- CEP
- Status (Disponível/Ocupado/Manutenção)
- Preço
- Observações
- Galeria de imagens

### 🎨 Design Features
- Layout moderno e profissional
- Cards interativos com hover effects
- Status badges coloridos
- Grid responsivo
- Tipografia otimizada
- Cores personalizáveis via Customizer

## 📁 Estrutura de Arquivos

```
tema-etc-imoveis/
├── style.css                    # CSS principal do tema
├── functions.php                # Funcionalidades principais
├── index.php                    # Template principal
├── header.php                   # Cabeçalho
├── footer.php                   # Rodapé
├── single-portfolio_imovel.php  # Página individual do imóvel
├── archive-portfolio_imovel.php # Arquivo do portfólio
├── README.md                    # Este arquivo
└── assets/
    ├── css/
    └── js/
```

## ⚙️ Instalação

1. **Download do tema:**
   ```bash
   git clone https://github.com/webereaugusto/tema-etc-imoveis.git
   ```

2. **Upload para WordPress:**
   - Copie a pasta para `/wp-content/themes/`
   - Ative o tema no WordPress Admin

3. **Configuração inicial:**
   - Vá em **Aparência > Personalizar** para configurar cores e contato
   - Crie os menus em **Aparência > Menus**
   - Configure o logo em **Aparência > Personalizar > Identidade do Site**

## 🏗️ Como Usar

### Adicionando Imóveis

1. No WordPress Admin, vá em **Portfólio de Imóveis > Adicionar Novo**
2. Preencha os dados do imóvel:
   - **Título:** Use o formato "Tipo + Área + Localização"
     - Exemplo: "Loja Comercial 1.705m² - Recreio das Américas"
   - **Imagem destacada:** Foto principal do imóvel
   - **Detalhes:** Preencha todos os campos meta
   - **Categoria:** Selecione a categoria apropriada

### Categorias Sugeridas

Crie as seguintes categorias em **Portfólio de Imóveis > Categorias**:
- **Âncoras Premium** (+ 1.000m²)
- **Lojas Estratégicas** (500-1.000m²)
- **Lojas Compactas** (200-500m²)

### Usando o Shortcode

Para exibir o portfólio em qualquer página:

```php
// Básico
[portfolio_imoveis]

// Com parâmetros
[portfolio_imoveis limite="6" colunas="3" categoria="ancoras-premium"]
```

**Parâmetros disponíveis:**
- `limite`: Número de imóveis (-1 para todos)
- `colunas`: 2, 3 ou 4 colunas
- `categoria`: Slug da categoria específica

## 🎯 Títulos Recomendados

Seguindo o padrão **Tipo + Área + Localização**:

1. **Loja Comercial 1.705m² - Recreio das Américas**
2. **Espaço Comercial 1.166m² - Av. das Américas 13881**
3. **Loja Estratégica 795m² - Barra da Tijuca**
4. **Showroom 846m² - Av. das Américas 16459**
5. **Espaço Comercial 1.300m² - Jacarepaguá** ⚡ *DISPONÍVEL*
6. **Loja Comercial 352m² - Av. das Américas 13555**
7. **Loja Comercial 243m² - Av. das Américas 13533**
8. **Loja Comercial 359m² - Av. das Américas 13520A**
9. **Loja Comercial 359m² - Av. das Américas 13520B**
10. **Loja Comercial 260m² - Macaé Cavaleiros**
11. **Espaço Comercial 600m² - Recreio dos Bandeirantes** ⚡ *DISPONÍVEL*
12. **Loja Comercial 200m² - Jacarepaguá Claraval**

## 🎨 Personalização

### Cores (Customizer)
- Acesse **Aparência > Personalizar > Cores do Tema**
- Personalize a cor primária do site

### Informações de Contato
- Acesse **Aparência > Personalizar > Informações de Contato**
- Configure telefone e e-mail

### CSS Personalizado
Adicione CSS personalizado em **Aparência > Personalizar > CSS Adicional**

## 🔧 Desenvolvimento

### Hooks Disponíveis

```php
// Após configuração do tema
add_action('after_setup_theme', 'sua_funcao');

// Modificar query do portfólio
add_filter('portfolio_query_args', 'sua_funcao');

// Personalizar dados do imóvel
add_filter('imovel_meta_fields', 'sua_funcao');
```

### Funções Úteis

```php
// Obter dados de um imóvel
$dados = get_imovel_data($post_id);

// Verificar se é página do portfólio
if (is_post_type_archive('portfolio_imovel')) {
    // Código específico
}
```

## 📱 Responsividade

O tema é 100% responsivo com breakpoints:
- **Desktop:** 1200px+
- **Tablet:** 768px - 1199px
- **Mobile:** < 768px

## 🚀 Performance

- CSS e JS minificados
- Imagens otimizadas automaticamente
- Lazy loading nativo do WordPress
- Font Awesome via CDN

## 🆕 Changelog

### v1.0 (Agosto 2025)
- Lançamento inicial do tema
- Custom Post Type para imóveis
- Sistema de filtros completo
- Design responsivo
- Shortcode para portfólio
- Meta fields personalizados

## 📧 Suporte

Para suporte técnico ou customizações:
- **Email:** suporte@etcimoveis.com.br
- **GitHub Issues:** [Reportar problema](https://github.com/webereaugusto/tema-etc-imoveis/issues)

## 📄 Licença

Este tema foi desenvolvido especificamente para a ETC Imóveis. Todos os direitos reservados.

---

**Desenvolvido com ❤️ para a ETC Imóveis**