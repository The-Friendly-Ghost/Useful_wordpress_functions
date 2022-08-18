//SOURCE: https://www.youtube.com/watch?v=NOaFde0Yvy4

//If this code snippet is added to a html section, it will make the footer stick to
//the bottom on smartphone. If you also want this for tablet, edit 
//'window.innerWidth' to 1024

<script>
;( function() {
  // wait until gsap & ScrollTrigger available
  let chck_if_gsap_loaded = setInterval( function() {
    
    if (window.gsap && window.ScrollTrigger) {
      
      // register scrolTrigger
      gsap.registerPlugin(ScrollTrigger);

      // ... do your thing
      track_bottom_mobile_menu();

      // clear interval
      clearInterval(chck_if_gsap_loaded); 
      
    }
    
  }, 500 );
 
  function track_bottom_mobile_menu() {
     if(window.innerWidth <= 767){ 
      const site_footer = document.querySelector( "#[SECTION-CSS-ID]" );
      const show_hide_header = gsap.from( site_footer, {
          
          yPercent: 100,
          duration: 0.25,
          ease: "sine.out",
          
      } ).progress( 1 );
      
      ScrollTrigger.create( {
          
          start: "top top-=" + 250,
          onUpdate: ( self ) => {
              
              if( self.direction === -1 ) show_hide_header.play();
              else show_hide_header.reverse();
              
          }
          
      } );
     };
  }
  
} )();
</script>
