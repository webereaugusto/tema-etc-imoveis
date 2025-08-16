<?php
/**
 * Template para exibir um único imóvel do portfólio
 */

get_header();

while (have_posts()) :
    the_post();
    $imovel_data = get_imovel_data(get_the_ID());
    ?>

    <main class="main-content">
        <div class="container">
            
            <article class="single-portfolio">
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="portfolio-hero">
                        <?php the_post_thumbnail('portfolio-large'); ?>
                        <div class="status-badge status-<?php echo esc_attr($imovel_data['status']); ?>">
                            <?php echo ucfirst($imovel_data['status']); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="portfolio-info">
                    
                    <header class="portfolio-header">
                        <h1 class="portfolio-title"><?php the_title(); ?></h1>
                        
                        <?php if ($imovel_data['preco']) : ?>
                            <div class="price-highlight">
                                <strong>R$ <?php echo esc_html($imovel_data['preco']); ?></strong>
                            </div>
                        <?php endif; ?>
                    </header>
                    
                    <div class="portfolio-meta">
                        
                        <?php if ($imovel_data['area']) : ?>
                            <div class="meta-item">
                                <span class="meta-label"><i class="fas fa-expand-arrows-alt"></i> Área:</span>
                                <span class="meta-value"><?php echo esc_html($imovel_data['area']); ?> m²</span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($imovel_data['dimensoes']) : ?>
                            <div class="meta-item">
                                <span class="meta-label"><i class="fas fa-ruler-combined"></i> Dimensões:</span>
                                <span class="meta-value"><?php echo esc_html($imovel_data['dimensoes']); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($imovel_data['endereco']) : ?>
                            <div class="meta-item">
                                <span class="meta-label"><i class="fas fa-map-marker-alt"></i> Endereço:</span>
                                <span class="meta-value"><?php echo esc_html($imovel_data['endereco']); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($imovel_data['bairro']) : ?>
                            <div class="meta-item">
                                <span class="meta-label"><i class="fas fa-location-arrow"></i> Bairro:</span>
                                <span class="meta-value"><?php echo esc_html($imovel_data['bairro']); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($imovel_data['cidade']) : ?>
                            <div class="meta-item">
                                <span class="meta-label"><i class="fas fa-city"></i> Cidade:</span>
                                <span class="meta-value"><?php echo esc_html($imovel_data['cidade']); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($imovel_data['cep']) : ?>
                            <div class="meta-item">
                                <span class="meta-label"><i class="fas fa-mail-bulk"></i> CEP:</span>
                                <span class="meta-value"><?php echo esc_html($imovel_data['cep']); ?></span>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                    
                    <?php if (get_the_content()) : ?>
                        <div class="portfolio-description">
                            <h3>Descrição do Imóvel</h3>
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($imovel_data['observacoes']) : ?>
                        <div class="portfolio-notes">
                            <h3>Observações</h3>
                            <p><?php echo esc_html($imovel_data['observacoes']); ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <div class="portfolio-actions">
                        <a href="<?php echo home_url('/portfolio'); ?>" class="btn-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar ao Portfólio
                        </a>
                        
                        <?php
                        $phone = get_theme_mod('phone');
                        if ($phone) :
                        ?>
                            <a href="tel:<?php echo esc_attr($phone); ?>" class="btn-primary">
                                <i class="fas fa-phone"></i> Entrar em Contato
                            </a>
                        <?php endif; ?>
                    </div>
                    
                </div>
                
            </article>
            
            <!-- Imóveis Relacionados -->
            <?php
            $related_args = array(
                'post_type' => 'portfolio_imovel',
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID()),
                'post_status' => 'publish'
            );
            
            $related_query = new WP_Query($related_args);
            
            if ($related_query->have_posts()) :
            ?>
                <section class="related-properties">
                    <div class="container">
                        <h2 class="text-center mb-3">Outros Imóveis do Portfólio</h2>
                        
                        <div class="portfolio-grid portfolio-cols-3">
                            <?php
                            while ($related_query->have_posts()) :
                                $related_query->the_post();
                                $related_data = get_imovel_data(get_the_ID());
                            ?>
                                <div class="portfolio-item">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="portfolio-image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('portfolio-thumb'); ?>
                                            </a>
                                            <div class="status-badge status-<?php echo esc_attr($related_data['status']); ?>">
                                                <?php echo ucfirst($related_data['status']); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="portfolio-content">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        
                                        <div class="imovel-details">
                                            <?php if ($related_data['area']) : ?>
                                                <span class="area">
                                                    <i class="fas fa-expand-arrows-alt"></i> <?php echo esc_html($related_data['area']); ?>m²
                                                </span>
                                            <?php endif; ?>
                                            
                                            <?php if ($related_data['bairro']) : ?>
                                                <span class="location">
                                                    <i class="fas fa-map-marker-alt"></i> <?php echo esc_html($related_data['bairro']); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <a href="<?php the_permalink(); ?>" class="btn-ver-mais">Ver Detalhes</a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </section>
            <?php
            endif;
            wp_reset_postdata();
            ?>
            
        </div>
    </main>

    <?php
endwhile;

get_footer();
?>