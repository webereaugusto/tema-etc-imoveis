<?php
/**
 * Template para arquivo de portfólio de imóveis
 */

get_header(); ?>

<main class="main-content">
    <div class="container">
        
        <header class="page-header">
            <h1 class="page-title">Portfólio de Imóveis</h1>
            <p class="page-description">Conheça nossos ativos imobiliários estratégicos</p>
        </header>
        
        <!-- Filtros -->
        <div class="portfolio-filters">
            <form method="GET" class="filters-form">
                
                <div class="filter-row">
                    
                    <div class="filter-group">
                        <label for="filter-categoria">Categoria:</label>
                        <select name="categoria" id="filter-categoria">
                            <option value="">Todas as categorias</option>
                            <?php
                            $categorias = get_terms(array(
                                'taxonomy' => 'categoria_imovel',
                                'hide_empty' => true
                            ));
                            
                            $selected_categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
                            
                            foreach ($categorias as $categoria) :
                            ?>
                                <option value="<?php echo esc_attr($categoria->slug); ?>" <?php selected($selected_categoria, $categoria->slug); ?>>
                                    <?php echo esc_html($categoria->name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="filter-status">Status:</label>
                        <select name="status" id="filter-status">
                            <option value="">Todos</option>
                            <?php
                            $selected_status = isset($_GET['status']) ? $_GET['status'] : '';
                            ?>
                            <option value="disponivel" <?php selected($selected_status, 'disponivel'); ?>>Disponível</option>
                            <option value="ocupado" <?php selected($selected_status, 'ocupado'); ?>>Ocupado</option>
                            <option value="manutencao" <?php selected($selected_status, 'manutencao'); ?>>Em Manutenção</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="filter-area">Área mínima (m²):</label>
                        <input type="number" name="area_min" id="filter-area" value="<?php echo isset($_GET['area_min']) ? esc_attr($_GET['area_min']) : ''; ?>" placeholder="Ex: 200">
                    </div>
                    
                    <div class="filter-actions">
                        <button type="submit" class="btn-primary">Filtrar</button>
                        <a href="<?php echo get_post_type_archive_link('portfolio_imovel'); ?>" class="btn-secondary">Limpar</a>
                    </div>
                    
                </div>
                
            </form>
        </div>
        
        <?php
        // Aplicar filtros na query
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        
        $args = array(
            'post_type' => 'portfolio_imovel',
            'posts_per_page' => 12,
            'paged' => $paged,
            'post_status' => 'publish',
            'meta_query' => array()
        );
        
        // Filtro por categoria
        if (!empty($_GET['categoria'])) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'categoria_imovel',
                    'field' => 'slug',
                    'terms' => sanitize_text_field($_GET['categoria'])
                )
            );
        }
        
        // Filtro por status
        if (!empty($_GET['status'])) {
            $args['meta_query'][] = array(
                'key' => '_status',
                'value' => sanitize_text_field($_GET['status']),
                'compare' => '='
            );
        }
        
        // Filtro por área mínima
        if (!empty($_GET['area_min'])) {
            $args['meta_query'][] = array(
                'key' => '_area_m2',
                'value' => intval($_GET['area_min']),
                'type' => 'NUMERIC',
                'compare' => '>='
            );
        }
        
        $portfolio_query = new WP_Query($args);
        ?>
        
        <?php if ($portfolio_query->have_posts()) : ?>
            
            <div class="results-info">
                <p>Encontrados <?php echo $portfolio_query->found_posts; ?> imóveis</p>
            </div>
            
            <div class="portfolio-grid portfolio-cols-3">
                <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
                    <?php $imovel_data = get_imovel_data(get_the_ID()); ?>
                    
                    <div class="portfolio-item">
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="portfolio-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('portfolio-thumb'); ?>
                                </a>
                                <div class="status-badge status-<?php echo esc_attr($imovel_data['status']); ?>">
                                    <?php echo ucfirst($imovel_data['status']); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <div class="portfolio-content">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            
                            <div class="imovel-details">
                                <?php if ($imovel_data['area']) : ?>
                                    <span class="area">
                                        <i class="fas fa-expand-arrows-alt"></i> <?php echo esc_html($imovel_data['area']); ?>m²
                                    </span>
                                <?php endif; ?>
                                
                                <?php if ($imovel_data['bairro']) : ?>
                                    <span class="location">
                                        <i class="fas fa-map-marker-alt"></i> <?php echo esc_html($imovel_data['bairro']); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            <?php if ($imovel_data['preco']) : ?>
                                <div class="price">R$ <?php echo esc_html($imovel_data['preco']); ?></div>
                            <?php endif; ?>
                            
                            <a href="<?php the_permalink(); ?>" class="btn-ver-mais">Ver Detalhes</a>
                        </div>
                        
                    </div>
                    
                <?php endwhile; ?>
            </div>
            
            <?php
            // Paginação
            echo paginate_links(array(
                'total' => $portfolio_query->max_num_pages,
                'current' => $paged,
                'prev_text' => '&laquo; Anterior',
                'next_text' => 'Próximo &raquo;',
            ));
            ?>
            
        <?php else : ?>
            
            <div class="no-results">
                <h2>Nenhum imóvel encontrado</h2>
                <p>Não encontramos imóveis que correspondam aos filtros selecionados. Tente ajustar os critérios de busca.</p>
                <a href="<?php echo get_post_type_archive_link('portfolio_imovel'); ?>" class="btn-primary">Ver Todos os Imóveis</a>
            </div>
            
        <?php endif; ?>
        
        <?php wp_reset_postdata(); ?>
        
    </div>
</main>

<?php get_footer(); ?>