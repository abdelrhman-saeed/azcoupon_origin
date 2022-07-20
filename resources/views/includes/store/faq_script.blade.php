<script type="application/ld+json">
    {
        "@context":"https://schema.org",
        "@type":"FAQPage",
        "mainEntity":
        [
            <?php
                $visibledfag = 1;
                foreach($store->widgets()->orderBy('id', 'DESC')->get() as $widget):
                    if($widget->title && $widget->description):
                    
                        $title = str_replace('"', "", $widget->title);
                        $desc = str_replace('"', "", $widget->description);
        
                        if( $visibledfag != 1 ):
                            echo ',';
                        endif;
                        
                        echo '{
                                "@type":"Question",
                                "name":"' . $title . '",
                                "acceptedAnswer":
                                {
                                    "@type":"Answer",
                                    "text":"' . $desc . '"
                                }
                            }';
                                
                        $visibledfag++;
                    endif;
                endforeach;
            ?>
        ]
    }
</script>