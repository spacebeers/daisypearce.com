        </section>
        
        <div class="flair flair-right">
            <?php echo file_get_contents(get_template_directory() . '/assets/flair.svg', true); ?>
            <hr />
        </div>

        <footer class="site-footer">        
            <div class="footer-grid">
                <div class="footer-grid-left">
                    <?php dynamic_sidebar('footer-area-left-sidebar'); ?>
                </div>
                <div class="footer-grid-right">
                    <?php dynamic_sidebar('footer-area-right-sidebar'); ?>
                </div>
            </div>
            <div class="footer-grid">
                <div class="footer-grid-left">
                    <p>Copyright &copy; Daisy Pearce <?php echo date("Y"); ?> </p>
                </div>
                <div class="footer-grid-right">
                <p>Website by <a href="https://atomichorse.agency" rel="noopener" target="_blank">Atomic Horse</a></p>
                </div>
            </div>
        </footer>
    </div>

    <?php wp_footer(); ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-3539496-13"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-3539496-13');
    </script>
</body>
</html>