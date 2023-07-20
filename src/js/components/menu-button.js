(function() {

  // Menu Toggle
  const menuToggle = document.getElementById('menu-toggle');
  
  if(menuToggle){
    menuToggle.addEventListener('click', function(e){
      e.preventDefault();
      
      if(this.getAttribute('aria-expanded') === "true"){
        closeMobileMenu();
      }else{
        openMobileMenu();
      }
    });
  }

  function openMobileMenu(){
    menuToggle.setAttribute('aria-expanded', 'true');
    document.body.classList.add('menu-open');
  }

  function closeMobileMenu(){
    menuToggle.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('menu-open');
  }

})();