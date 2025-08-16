<footer class="site-footer">
    <div class="container">
        
        <div class="footer-content">
            
            <div class="footer-section">
                <h3>ETC Imóveis</h3>
                <p>Especialistas em ativos imobiliários estratégicos. Oferecemos as melhores oportunidades de investimento e locação no mercado imobiliário.</p>
                
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Links Rápidos</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'fallback_cb' => false,
                ));
                ?>
            </div>
            
            <div class="footer-section">
                <h3>Portfólio</h3>
                <?php
                $categorias = get_terms(array(
                    'taxonomy' => 'categoria_imovel',
                    'hide_empty' => true,
                    'number' => 5
                ));
                
                if (!empty($categorias)) :
                ?>
                    <ul>
                        <?php foreach ($categorias as $categoria) : ?>
                            <li>
                                <a href="<?php echo get_term_link($categoria); ?>">
                                    <?php echo esc_html($categoria->name); ?>
                                    <span>(<?php echo $categoria->count; ?>)</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            
            <div class="footer-section">
                <h3>Contato</h3>
                
                <?php
                $phone = get_theme_mod('phone');
                $email = get_theme_mod('email');
                ?>
                
                <?php if ($phone) : ?>
                    <p>
                        <i class="fas fa-phone"></i>
                        <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
                    </p>
                <?php endif; ?>
                
                <?php if ($email) : ?>
                    <p>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                    </p>
                <?php endif; ?>
                
                <p>
                    <i class="fas fa-map-marker-alt"></i>
                    Rio de Janeiro - RJ
                </p>
                
            </div>
            
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> ETC Imóveis. Todos os direitos reservados.</p>
        </div>
        
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>